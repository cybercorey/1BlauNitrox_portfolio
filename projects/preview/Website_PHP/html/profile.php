<?php
include_once 'include/functions.php';

sec_session_start();

if(login_check($mysqli) == false) { 
    header("location: login.php?goal=profile.php");
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="images/icon.png">

        <title>Lyrotopia.net | Profil</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body onresize="checkResize()" style="background-image: linear-gradient(to right bottom, rgba(117, 211, 117, .8), rgba(117, 211, 117, .8)), url(images/bg.png);">

        <?php include_once 'include/navigation.php'; ?>

        <h2 style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Profil von <?php echo $_SESSION['username']; ?></h1>
        
        <img src="<?php echo $_SESSION['pb']; ?>" alt="Profilbild" style="border-radius: 100%; position: absolute;top: 30%;left: 50%;transform: translate(-50%, -50%); height: 200px;">
        <a href="include/logout_verarbeitung.php" style="margin-top: 574px; display: block;"><i class="fas fa-sign-out-alt"></i>Abmelden</a>
        <?php if($_SESSION['isVerified'] == 0) {
            echo "Dieser Account ist noch nicht verifiziert. Ohne die Verifizierung ist der Account nur unter Einschränkungen benutzbar. Solltest du keine Email erhalten haben, dann sender die hier eine Erneut: SENDE MAIL HIER";
        }
        ?>

        <?php include_once 'include/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/cookies.js"></script>
        <script src="scripts/scripts.js"></script>
        <script>
            document.getElementById('profile').classList.add('active');
        </script>
    </body>
</html>