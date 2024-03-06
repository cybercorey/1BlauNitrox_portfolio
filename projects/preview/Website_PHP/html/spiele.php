<?php
include_once 'include/functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/spiele.css">
        <link rel="icon" href="images/icon.png">

        <title>Lyrotopia.net | Spiele</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body onresize="checkResize()" style="background-image: linear-gradient(to right bottom, rgba(117, 211, 117, .8), rgba(117, 211, 117, .8)), url(images/bg.png);">

        <?php include_once 'include/navigation.php'; ?>

        <h2 style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Spiele</h2>
        

        <?php include_once 'include/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/cookies.js"></script>
        <script src="scripts/scripts.js"></script>
        <script>
            document.getElementById('games').classList.add('active');
        </script>
    </body>
</html>