<?php 
include_once 'include/functions.php';

sec_session_start();

$error = false;

if (isset($_GET['email'], $_GET['username'], $_GET['token'])) {
    $email = $_GET['email'];
    $username = $_GET['username'];
    $token = $_GET['token'];
    $state = 0;
    $newState = 1;

    if($stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND username = ? AND verifyToken = ? AND isVerified = ?")) {
        $stmt->bind_param('sssi', $email, $username, $token, $state);
        if($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $newToken = NULL;
                $stmt = $mysqli->prepare("UPDATE users SET isVerified = ?, verifyToken = ? WHERE email = ? AND username = ? AND verifyToken = ? AND isVerified = ?");
                $stmt->bind_param('issssi', $newState, $newToken, $email, $username, $token, $state);
                if($stmt->execute()) {
                    $error = false;
                }else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        }else {
            $error = true;
        }
    }
}else {
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/utilities.css">
        <link rel="stylesheet" href="css/subpages/email-verify.css">
        <link rel="icon" href="images/icon.png">

        <title>Lyrotopia.net | Profil</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body onresize="checkResize()">

        <?php include_once 'include/navigation.php'; ?>

        <div class="result">
            <?php if($error == false) { ?>


                <div class="result-icon" id="success">
                    <i class="fas fa-check"></i>
                </div>

                <div class="result-heading">
                    <h4>Erfolg</h4>
                </div>

                <div class="result-body">
                    <p>Die Verifizierung deiner Email war erfolgreich. Du kannst auf unserer Webseite nun den Support Bereich und unser Forum ohne Einschränkungen benutzen. Solltest du weitere Fragen haben, dann melde dich bitte im Support.</p>
                </div>
        
            <?php } else { ?>

                <div class="result-icon" id="fail">
                    <i class="fas fa-times"></i>
                </div>

                <div class="result-heading">
                    <h4>Fehler</h4>
                </div>

                <div class="result-body">
                    <p>Bei der Verifizierung deiner Email ist ein Fehler aufgetreten. Dies könnte daran liegen, dass die Email bereits verifiziert ist oder ein technisches Problem vorliegt. Solltest du weitere Fragen haben, dann melde dich bitte im Teamspeak-Support.</p>
                </div>

            <?php } ?>

                <div class="result-support result-btn">
                    <a href="ts3server://lyrotopia.net" class="underlined-button underlined-button-red">Support</a>
                </div>

                <div class="result-back result-btn">
                    <a href="index.php" class="underlined-button underlined-button-green">Zurück</a>
                </div>
        </div>


        <?php include_once 'include/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/cookies.js"></script>
        <script src="scripts/scripts.js"></script>
    </body>
</html>