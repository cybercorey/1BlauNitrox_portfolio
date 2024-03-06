<?php
include_once 'include/functions.php';

sec_session_start();

if(login_check($mysqli) == true) { 
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="css/global.css" />
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="css/login.css" />

        <title>Lyrotopia.net | Login</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <?php include_once 'include/navigation.php'; ?>
        <div class="container">
            <div class="blueBg">
                <div class="box signin">
                    <h2>Bereits einen Account?</h2>
                    <button class="signinBtn">Anmelden</button>
                </div>
                <div class="box signup">
                    <h2>Noch keinen Account?</h2>
                    <button class="signupBtn">Registrieren</button>
                </div>
            </div>
            <div class="formBx">
                <div class="form signinForm">
                    <form onsubmit="return false" method="post" name="login_form" id="loginForm">
                        <h3>Anmelden</h3>

                        <div class="form-control">
                            <input type="text" name="email" id="loginEmail" onchange="checkInput('email', 'loginEmail')" onkeyup="checkInput('email', 'loginEmail')" required />
                            <label for="email" class="label-name">
                                <span class="content-name">Email</span>
                            </label>
                        </div>

                        <div class="form-control">
                            <input type="password" name="password" id="loginPassword" required />
                            <label for="password" class="label-name">
                                <span class="content-name">Passwort</span>
                            </label>
                            <span class="show-pass" onclick="toggleLogin()">
                                <i class="far fa-eye" onclick="myFunction(this)"></i>
                            </span>
                        </div>

                        <a class="submit" onclick="formhash();"><span class="loginSpinner" id="signinSpinner"></span>Anmelden</a>
                        <a href="#" class="forgot">Passwort vergessen?</a>
                    </form>
                </div>

                <div class="form signupForm">
                    <form onsubmit="return false" method="post" name="registration_form" id="registerForm">
                        <h3>Registrieren</h3>
                        <div class="form-control">
                            <input type="text" name="username" id="signupUsername" onchange="checkInput('username', 'signupUsername')" onkeyup="checkInput('username', 'signupUsername')" required />
                            <label for="username" class="label-name">
                                <span class="content-name">Username</span>
                            </label>
                        </div>
                        <div class="form-control">
                            <input type="text" name="email" id="signupEmail" onchange="checkInput('email', 'signupEmail')" onkeyup="checkInput('email', 'signupEmail')" required />
                            <label for="email" class="label-name">
                                <span class="content-name">Email</span>
                            </label>
                        </div>
                        
                        <div class="form-control">
                            <input type="password" name="password" id="signupPassword" onchange="checkStrength(this.value); checkInput('password', 'signupPassword')" onkeyup="checkStrength(this.value); checkInput('password', 'signupPassword')" required />
                            <label for="password" class="label-name">
                                <span class="content-name">Passwort</span>
                            </label>
            
                            <span class="show-pass" onclick="toggleSignup()">
                                <i class="far fa-eye" onclick="myFunction(this)"></i>
                            </span>
                        </div>

                        <div class="popover-password">
                            <p><span id="result"></span></p>
                            <div class="progress">
                                <div id="password-strength" class="progress-bar" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <p>
                                <input type="checkbox" id="nutzungsbedingungen" class="checkbox" onclick="checkboxCheck(this)" />
                                <label for="nutzungsbedingungen" id="checkbox-label">Datenschutz zustimmen</label>
                            </p>
                        </div>
                        <div class="checkbox-container">
                            <p>                          
                                <input type="checkbox" id="agbs" class="checkbox" onclick="checkboxCheck(this)" />                   
                                <label for="agbs" id="checkbox-label">AGBs zustimmen</label>
                            </p>
                        </div>
                        <a class="submit" onclick="regformhash();"><span class="loginSpinner" id="signupSpinner"></span>Registrieren</a>
                    </form>

                </div>
            </div>
        </div>

        <?php include_once 'include/footer.php'; ?>

        <script>
            document.getElementById('login').classList.add('active');

            const signinBtn = document.querySelector('.signinBtn');
            const signupBtn = document.querySelector('.signupBtn');
            const formBx = document.querySelector('.formBx');

            signupBtn.onclick = function() {
                formBx.classList.add('active');
            }

            signinBtn.onclick = function() {
                formBx.classList.remove('active');
            }
        </script>


        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/cookies.js"></script>
        <script src="scripts/scripts.js"></script>
        <script src="scripts/login.js"></script>
    </body>
</html>