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
        <link rel="stylesheet" href="css/team.css">
        <link rel="icon" href="images/icon.png">

        <title>Lyrotopia.net | Team</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body onresize="checkResize()" onload="load()" style="background-image: linear-gradient(to right bottom, rgba(117, 211, 117, .8), rgba(117, 211, 117, .8)), url(images/bg.png);">

        <?php include_once 'include/navigation.php'; ?>
        <div class="team">
            <div class="slide">
                <div class="tab" id="1" onclick="activate('1')">
                    <div class="logo-team">
                        <ion-icon name="school-outline"></ion-icon>
                    </div>
                </div>
                <div class="tab" id="2" onclick="activate('2')">
                    <div class="logo-team">
                        <ion-icon name="code-outline"></ion-icon>
                    </div>
                </div>
                <div class="tab" id="3" onclick="activate('3')">
                    <div class="logo-team">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                    </div>
                </div>
                <div class="tab" id="4" onclick="activate('4')">
                    <div class="logo-team">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                    </div>
                </div>
                <div class="tab" id="5" onclick="activate('5')">
                    <div class="logo-team">
                        <ion-icon name="build-outline"></ion-icon>
                    </div>
                </div>
                <div class="tab" id="6" onclick="activate('6')">
                    <div class="logo-team">
                        <ion-icon name="print-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="cards">
                <div id="11" class="card" onclick="activate('1')">
                    <h1 class="headline">Leitung</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/953a811d-c57e-4fc0-b345-f7dcd1294742">
                            <h2 class="name">BenePoedel</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Inhaber</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/1cbd05c2-6ddf-4998-8326-5e4fdd23e223">
                            <h2 class="name">Base2Code</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Admin</h4>
                        </div>
                        <div class="item item-3">
                            <img class="img-team" src="https://crafatar.com/avatars/5af0b6dd-802f-4eba-be74-5314edc800a1">
                            <h2 class="name">Badeschnitzel</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Admin</h4>
                        </div>
                        <div class="item item-4">
                            <img class="img-team" src="https://crafatar.com/avatars/2142957e-de06-4687-a099-852f10c95f5e">
                            <h2 class="name">Christbaum</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Admin</h4>
                        </div>
                        <div class="item item-5">
                            <img class="img-team" src="https://crafatar.com/avatars/d25e3dd4-ea1e-42c7-83e2-2c6a518ca4f1">
                            <h2 class="name">ne0x</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Admin</h4>
                        </div>
                    </div>
                </div>
                <div id="22" class="card" onclick="activate('2')">
                    <h1 class="headline">Entwicklung</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/37bb2c2c-e170-469c-a08e-6a22e7d083cd">
                            <h2 class="name">1BlauNitrox</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Developer</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/33c15f96-046e-4638-bc6d-68c71c1fab0d">
                            <h2 class="name">JxstJonas</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Developer</h4>
                        </div>
                        <div class="item item-3">
                            <img class="img-team" src="https://crafatar.com/avatars/4608f084-2726-4cca-a9fa-ce6cc091d2ce">
                            <h2 class="name">SpaceAI</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Developer</h4>
                        </div>
                        <div class="item item-4">
                            <img class="img-team" src="https://crafatar.com/avatars/21e6014c-82ee-4a0e-a48e-8d32b4522cc6">
                            <h2 class="name">Twoflash20</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Developer</h4>
                        </div>
                    </div>
                </div>
                <div id="33" class="card" onclick="activate('3')">
                    <h1 class="headline">Moderatoren</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/504db0fc-7f0e-4d78-b704-0365e0acf516">
                            <h2 class="name">GodCarriesMe</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Moderator</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/127c9316-6487-486c-a814-555f2c8cd3ea">
                            <h2 class="name">NearlyReal</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Moderator</h4>
                        </div>
                    </div>
                </div>
                <div id="44" class="card" onclick="activate('4')">
                    <h1 class="headline">Supporter</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/6cf11d67-3a7d-4592-9fe5-25d75c7c32b0">
                            <h2 class="name">Kuna002</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/d5467176-4c34-438c-bdf9-3c9538a58f8c">
                            <h2 class="name">russianwings</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                        <div class="item item-3">
                            <img class="img-team" src="https://crafatar.com/avatars/324cd108-c9e6-4f49-93ee-fd2531c407a1">
                            <h2 class="name">Max_Tlw</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                        <div class="item item-4">
                            <img class="img-team" src="https://crafatar.com/avatars/fa796d85-bac2-46fd-a874-fb9734f37ff0">
                            <h2 class="name">Block4Crafter</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                        <div class="item item-5">
                            <img class="img-team" src="https://crafatar.com/avatars/c0dcd6c5-2038-41f6-a009-af60d2140c28">
                            <h2 class="name">DasNoodle</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                        <div class="item item-6">
                            <img class="img-team" src="https://crafatar.com/avatars/c671100c-5136-4d52-82a0-32c5aefb2b80">
                            <h2 class="name">7ycn</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Supporter</h4>
                        </div>
                    </div>
                </div>
                <div id="55" class="card" onclick="activate('5')">
                    <h1 class="headline">Builder</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/c96cefb9-d21a-4e39-8bcb-15f6cbb4f6e4">
                            <h2 class="name">majster</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Builder</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/c9bc60c8-bca0-4346-84f4-b718ca81f40f">
                            <h2 class="name">GeneralDerKekse</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Builder</h4>
                        </div>
                        <div class="item item-3">
                            <img class="img-team" src="https://crafatar.com/avatars/7985aee5-1841-4c5e-b4ab-23319df4869d">
                            <h2 class="name">SilbernesGold</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Builder</h4>
                        </div>
                    </div>
                </div>
                <div id="66" class="card" onclick="activate('6')">
                    <h1 class="headline">Contents</h1>
                    <div class="items">
                        <div class="item item-1">
                            <img class="img-team" src="https://crafatar.com/avatars/358ddf89-10f1-4337-bfb6-ec0d2e62103c">
                            <h2 class="name">EwigeWelle</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Content</h4>
                        </div>
                        <div class="item item-2">
                            <img class="img-team" src="https://crafatar.com/avatars/026bb211-8486-4ab1-aa73-f886f48fac26">
                            <h2 class="name">xByNilzz</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Content</h4>
                        </div>
                        <div class="item item-3">
                            <img class="img-team" src="https://crafatar.com/avatars/26a578ae-11f4-43fa-91f8-ae44e11f9d7d">
                            <h2 class="name">Nyrion</h2>
                            <div class="social-media">
                                <a href="">
                                    <ion-icon name="logo-discord"></ion-icon>
                                </a>
                            </div>
                            <h4 class="rank">Content</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include_once 'include/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/cookies.js"></script>
        <script src="scripts/team.js"></script>
        <script src="scripts/scripts.js"></script>
        <script>
            document.getElementById('team').classList.add('active');
        </script>
    </body>
</html>