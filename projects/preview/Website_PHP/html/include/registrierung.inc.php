<?php
include_once 'functions.php';

if(!isset($_COOKIE['deviceid'])) {
    echo "Ein Fehler ist aufgetreten. Bitte lade die Seite neu und versuche es erneut!:all";
    exit();
}

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $password = md5($password);

    if (strlen($password) != 32) {
        echo "Ein Fehler ist aufgetreten. Bitte wähle ein anderes Passwort!:signupPassword";
        exit();
    }

    $prep_stmt = "SELECT username FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            echo "Dieser Username wurde bereits registriert! Wähle einen anderen!:signupUsername";
            exit();
        }
    } else {
        echo "Ein Fehler ist aufgetreten. Probiers nochmal (1):all";
        exit();
    }

    $prep_stmt = "SELECT email FROM users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            echo "Diese E-Mail wurde bereits registriert! Wähle eine andere!:signupEmail";
            exit();
        }
    } else {
        echo "Ein Fehler ist aufgetreten. Probiers nochmal (2):all";
        exit();
    }

    $erstellungsdatum = strtotime("now");
    $profileimage = "";    

    $verifyToken = openssl_random_pseudo_bytes(16);
    $verifyToken = bin2hex($verifyToken);
    $device = $_COOKIE['deviceid'];

    $uuid = openssl_random_pseudo_bytes(32);
    $uuid = bin2hex($uuid);

    if ($insert_stmt = $mysqli->prepare("INSERT INTO users (uuid, username, email, password, verifyToken, verifiedLoginDevice, profileimage, creationdate) VALUES (?,?,?,?,?,?,?,?)")) {
        $insert_stmt->bind_param('sssssssi', $uuid, $username, $email, $password, $verifyToken, $device, $profileimage, $erstellungsdatum);
        if (!$insert_stmt->execute()) {
            echo "Ein Fehler ist aufgetreten. Probiers nochmal (3):all";
            exit();
        } else {
            echo "1" . $uuid;
            sendMail($mailer, $email, "Aktivieren Sie ihren Account", "Hallo " . $username .",\nvielen Dank für deine Registrierung auf unserem Netzwerk Lyrotopia.net.\n\nDamit dein Account einwandfrei genutzt werden kann, bitten wir dich diesen innerhalb von einer Stunde zu aktivieren.\n\nFolge dem Link zum aktivieren deines Accounts: https://" . getenv("DOMAIN") . "/verify_email_address.php?email=" . $email . "&username=" . $username . "&token=" . $verifyToken . "\n\nSollte der Account nicht innerhalb von einer Stunden aktiviert worden sein, dann wird dieser gelöscht und du musst dich neu registrieren.");
            exit();
        }
    }
} else {
    echo "Ein Fehler ist aufgetreten. Probiers nochmal (4):all";
}
?>
