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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="icon" href="images/icon.png">

    <title>Lyrotopia.net | Home</title>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body onresize="checkResize()">
    <?php include_once 'include/navigation.php'; ?>

    <div class="content">

        <div class="header">
            <div class="header-box">
                <div class="header-heading">
                    <span class="header-heading-main">Willkommen auf</span>
                    <span class="header-heading-sub">Lyrotopia.net</span>
                    <button class="header-button">
                        <h2>Los geht's</h2>
                    <div class="arrow">
                        <div class="arrow-line"></div>
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </div>
                </button>
                </div>
                <!-- <a href="#about-us-anchor" id="header-button" class="header-button"></a> -->
            </div>
        </div>

        <div id="about-us-anchor"></div>

        <div class="about-us" id="about-us">
            <h2 class="about-us-heading heading-secondary" id="about-us-heading">Erfahre mehr über uns</h2>
            <div class="about-us-box">
                <div class="about-us-text-box">
                    <h3 class="about-us-sub-heading heading-tertiary">Unsere Idee</h3>
                    <p class="about-us-sub">Seitdem wir LyroTopia am 12.03.2021 gegründet haben war es uns immer besonders wichtig ein hochwertiges und einzigartiges Spielerlebnis zu bieten.
                        Damit das möglich ist braucht es viel Arbeit, enorme Geduld und Ideen.
                        Dank unserem kreativen Team ist es uns gelungen das alles umzusetzen - probiere es doch aus und joine auf LyroTopia.net
                    </p>

                    <h3 class="about-us-sub-heading heading-tertiary">Unsere Spiele</h3>
                    <p class="about-us-sub">Neben einer großzügigen Auswahl an bekannten Minigames wie FFA bieten wir auch einzigartige Spielmodi wie UnCoup oder Prison.
                        Um mehr über den jeweiligen Modus zu erfahren klicke auf den Link unten.</p>

                    <a href="Spiele.php" class="about-us-button underlined-button underlined-button-green">Mehr dazu</a>
                </div>
                <div class="about-us-image">
                    <img src="images/icon.png" alt="Bild">
                </div>
            </div>
        </div>


        <div class="community" id="community">
            <div class="community-box">
                <div class="community-heading heading-secondary" id="community-heading">Unsere Community</div>
                <div class="community-item-box">
                    <div class="community-item">
                        <img src="images/teamspeak.png" alt="Teamspeak" id="community-image">
                        <h3 class="community-item-heading">Teamspeak</h3>
                        <p class="communit-text">Besuche unseren Teamspeak, um dich mit unserer Community zu unterhalten.</p>
                        <a href="ts3server://lyrotopia.net" class="community-button underlined-button underlined-button-green">Verbinden</a>
                    </div>
                    <div class="community-item">
                        <img src="images/discord.png" alt="Discord" id="community-image">
                        <h3 class="community-item-heading">Discord</h3>
                        <p class="communit-text">Joine auf unseren Discord, um immer auf dem aktuellsten Stand des Servers zu sein.</p>
                        <a href="https://discord.gg/lyrotopia" class="community-button underlined-button underlined-button-green" target="_blank">Beitreten</a>
                    </div>
                    <div class="community-item">
                        <img src="images/icon.png" alt="Forum" id="community-image">
                        <h3 class="community-item-heading">Forum</h3>
                        <p class="communit-text">Schaue in unser Forum, um dich mit unserer Community zu unterhalten.</p>
                        <a href="https://forum.lyrotopia.net" class="community-button underlined-button underlined-button-green">Besuchen</a>
                    </div>
                </div>
            </div>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/cookies.js"></script>
    <script src="scripts/scripts.js"></script>
    <script>
        document.getElementById('home').classList.add('active');

        document.getElementById('header-button').addEventListener("click", smoothScroll);
    </script>
</body>

</html>