<?php
include_once 'db_connect.php';
include_once 'mailer.php';
include_once 'deviceAPI.php';

$teamRoles = array("Moderator", "Developer", "Lead", "Admin");

function sec_session_start()
{
    $session_name = 'sec_session_id';
    $secure = getenv("secure") == "true";

    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Konnte keine sichere Session starten (ini_set)");
        exit();
    }

    $cookieParams = session_get_cookie_params();
    $properties = array(
        'lifetime' => 31500000, //1 Year
        'path' => '/;SameSite=none',
        'domain' => $cookieParams["domain"],
        'secure' => $secure,
        'httponly' => true,
        'samesite' => 'Strict'
    );

    session_set_cookie_params($properties);

    session_name($session_name);
    session_start();
    session_regenerate_id();

    if(!isset($_COOKIE['deviceid'])) {
        $device = openssl_random_pseudo_bytes(16);
        $device = bin2hex($device);
        setcookie('deviceid', $device, [
            'expires' => strtotime( '+20 years' ),
            'path' => '/',
            'domain' => getenv("domain"),
            'secure' => getenv("secure"),
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
    }
}

function login($email, $password, $mysqli, $mailer)
{
    if ($stmt = $mysqli->prepare("SELECT id,username,email,password,creationdate,isVerified,profileimage,role,verifiedLoginDevice FROM users WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $email, $db_password, $creationdate, $isVerified, $profileimage, $role, $verifiedLoginDevice);
        $stmt->fetch();

        if(checkbrute($user_id, $mysqli)) {
            return "Dieser Account ist vorrübergehend gesperrt, da in der letzten Zeit zu viele fehlerhafte Anmeldeversuche getätigt wurden.";
        }

        $password = md5($password);
        
        if ($stmt->num_rows == 1) {
            if ($db_password == $password) {
                if(!isset($_COOKIE['deviceid'])) {
                    return "Bei der Anmelung ist ein Fehler aufgetreten. Bitte versuche es erneut. Sollte der Fehler weiterhin bestehen, dann melde dich bitte bei unserem Supportteam.";
                }

                if($_COOKIE['deviceid'] != $verifiedLoginDevice) {
                    sendMail($mailer, $email, "Ungewöhnliche Anmeldeaktivität", "Hallo " . $username . ",\nauf deinem Account gab es eine Anmeldung von einem neuen Gerät. Solltest du das gewesen sein, dann ignoriere diese Email. Ansonsten solltest du dein Passwort schnellsten ändern.");
                    verifyUserDevice($_COOKIE['deviceid'], $user_id, $username, $mysqli);
                }

                $user_browser = $_SERVER['HTTP_USER_AGENT'];
                $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['creationdate'] = $creationdate;
                $_SESSION['isVerified'] = $isVerified;
                $_SESSION['pb'] = $profileimage;
                $_SESSION['role'] = $role;
                $_SESSION['login_string'] = md5($password . $user_browser);
                return "1";
            } else {
                addBruteForce($user_id, $mysqli);
                if(getBruteTries($user_id, $mysqli) >= 3) {
                    sendMail($mailer, $email, "Sicherheits Warnung", "Hallo " . $username . ",\nin den letzten Minuten gab es einige fehlerhafte Anmeldeversuche auf deinem Account. Deshalb wurde dieser für 10 minuten gesperrt, damit das Risiko, dass dein Account gehackt wird, minimiert wird.");
                    return "Dieser Account wird für die nächsten Minuten gesperrt, da innerhalb kurzer Zeit zu viele fehlerhafte Anmeldeversuche getätigt wurden.";
                }
                return "Die angegebene Email oder das angegebene Passwort ist falsch.";
            }
        } else {
            return "Die angegebene Email oder das angegebene Passwort ist falsch.";
        }
    }
    return "Ein Fehler ist entstanden! Probiers erneut (1)";
}

function addBruteForce($user_id, $mysqli) {
    $time = strtotime("now");
    if ($stmt = $mysqli->prepare("INSERT INTO login_fails (user_id, time) VALUES (?,?)")) {
        $stmt->bind_param('ii', $user_id, $time);
        $stmt->execute();
    }
}
function getBruteTries($user_id, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT * FROM login_fails WHERE user_id = ?")) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }
}
function checkbrute($user_id, $mysqli)
{
    $now = time();
    $valid_attempts = $now - (2 * 60 * 60);
    if ($stmt = $mysqli->prepare("SELECT time FROM login_fails WHERE user_id = ? AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows >= 3) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}


function login_check($mysqli)
{
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        if ($stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ? LIMIT 1")) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = md5($password . $user_browser);
                if ($login_check == $login_string) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function esc_url($url)
{
    if ('' == $url) {
        return $url;
    }
    
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string)$url;

    $count = 1;
    while ($count) {
        str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);
    $url = htmlentities($url, ENT_QUOTES);

    if ($url[0] !== '/') {
        return '';
    } else {
        return $url;
    }
}

function getName() {
    if($_SESSION['isVerified'] == 1) {
        return "<div style='display: flex; flex-direction: row; align-items: center;'>" . $_SESSION['username'] . "<i class='fas fa-check-circle' style='margin-left: 3px'></i></div>";
    } else {
        return $_SESSION['username'];
    }
}

?>