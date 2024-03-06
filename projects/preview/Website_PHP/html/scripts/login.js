/** Show Password */
let showPassSignup = false;
let showPassLogin = false;
let passwordSignup = document.getElementById('signupPassword');
let passwordLogin = document.getElementById('loginPassword');
let passwordStrength = document.getElementById('password-strength');

function myFunction(show) {
    show.classList.toggle('fa-eye-slash');
}
function toggleLogin() {
    if(showPassLogin) {
        passwordLogin.setAttribute("type", "password");
        showPassLogin = false;
    } else {
        passwordLogin.setAttribute("type", "text");
        showPassLogin = true;
    }
}
function toggleSignup() {
    if(showPassSignup) {
        passwordSignup.setAttribute("type", "password");
        showPassSignup = false;
    } else {
        passwordSignup.setAttribute("type", "text");
        showPassSignup = true;
    }
}

/** Password Strngth check */
function checkStrength(password) {
    let strength = 0;

    //if password contains lower and upper case character
    if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
    }

    //if password has a number
    if(password.match(/([0-9])/)) {
        strength += 1;
    }

    //if password has one special character
    if(password.match(/([!,%,&,@,#,$,^,*,?,_,~,+,-])/)) {
        strength += 1;
    }

    //if password is longer than 8
    if(password.length > 10) {
        strength += 1;
    }

    if(strength == 0) {
        passwordStrength.style = 'width: 0%';
    }else if(strength == 1) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style = 'width: 10%';
    }else if(strength == 2) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style = 'width: 20%';
    }else if(strength == 3) {
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-warning');
        passwordStrength.style = 'width: 60%';
    }else if(strength == 4) {
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.add('progress-bar-success');
        passwordStrength.style = 'width: 100%';
    }
}

/** Login  */
function formhash() {
    let error = false;
    const form = document.getElementById('loginForm');
    const email = form.email;
    const password = form.password

	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

    const spinner = document.getElementById('signinSpinner');

    if(emailValue === '') {
		setErrorFor(email);
        error = true;
	} else {
        re = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
        if (!re.test(email.value)) {
            setErrorFor(email);
            error = true;
        }else {
		    setSuccessFor(email);
        }
	}
	
	if(passwordValue === '') {
		setErrorFor(password);
        error = true;
	} else {
		setSuccessFor(password);
	}

    if(error) {
        return;
    }

    spinner.style = 'display: flex';

    var fd = new FormData;

    fd.append('email', email.value);
    fd.append('p', password.value);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('load', function (e) {
        if (this.responseText == "1") {
            email.value = "";
            password.value = "";
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const goal = urlParams.get('goal');
            if(goal != null) {
                location.href = "./" + goal;
            }else {
                location.href = "./index.php";
            }
        } else{
            swal("Anmeldung Fehlgeschlagen", this.responseText, "error");
            password.value = "";
            setErrorFor(email);
            setErrorFor(password);
        }
        spinner.style = 'display: none';
    });
    xhr.open('post', 'include/login_verarbeitung.php', true);
    xhr.send(fd);
}

/** Sign Up */

function regformhash() {
    let error = false;
    const form = document.getElementById('registerForm');
    const username = form.username;
    const email = form.email;
    const password = form.password

    const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

    const nutzungsbedingungen = document.getElementById('nutzungsbedingungen');
    const agbs = document.getElementById('agbs');

    const spinner = document.getElementById('signupSpinner');

    let re = "";

    if(usernameValue === '') {
		setErrorFor(username);
        error = true;
	} else {
        re = /^\w+$/;
        let userErr = false;
        if(username.value.length < 5) {
            setErrorFor(username);
            error = true;
            userErr = true;
        }

        if (!re.test(username.value)) {
            setErrorFor(username);
            error = true;
            userErr = true;
        }

        if(userErr == false){
		    setSuccessFor(username);
        }
	}

    if(emailValue === '') {
		setErrorFor(email);
        error = true;
	} else {
        re = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
        if (!re.test(email.value)) {
            setErrorFor(email);
            error = true;
        }else {
		    setSuccessFor(email);
        }
	}
	
	if(passwordValue === '') {
		setErrorFor(password);
        error = true;
	} else {
        re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        let passErr = false;
        if(password.value.length < 6) {
            setErrorFor(password);
            error = true;
            passErr = true;
        }

        if (!re.test(password.value)) {
            setErrorFor(password);
            error = true;
            passErr = true;
        }
        
        if(passErr == false){
            setSuccessFor(password);
        }
	}

    if(!nutzungsbedingungen.checked) {
        nutzungsbedingungen.classList.remove('checkbox-checked');
	    nutzungsbedingungen.classList.add('checkbox-unchecked');
        error = true;
    }else {
        nutzungsbedingungen.classList.remove('checkbox-unchecked');
        nutzungsbedingungen.classList.add('checkbox-checked');
    }

    if(!agbs.checked) {
        agbs.classList.remove('checkbox-checked');
	    agbs.classList.add('checkbox-unchecked');
        error = true;
    }else {
        agbs.classList.remove('checkbox-unchecked');
        agbs.classList.add('checkbox-checked');
    }

    if(error) {
        return;
    }

    spinner.style = 'display: flex';

    var fd = new FormData;

    fd.append('username', username.value);
    fd.append('email', email.value);
    fd.append('p', password.value);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('load', function (e) {
        if(this.responseText.charAt(0) == 1) {
            /**  Set Profile Image  **/
            let uuid = this.responseText.substring(1);
            let firstLetter = username.value.charAt(0);
            generateProfileImage(firstLetter, function(link) {
                var profileData = new FormData;
                    
                profileData.append('uuid', uuid);
                profileData.append('image', link);
                var xhrProfile = new XMLHttpRequest();
                xhrProfile.open('post', 'include/setProfileImage.php', true);
                xhrProfile.send(profileData);
            });

            /**  Clear Inputs  **/
            username.value = "";
            email.value = "";
            password.value = "";
            swal("Registrierung erfolgreich!", "Vielen Dank für deine Registrierung! Um die Registrierung abzuschließen, bitten wir dich deine Email zu verifizieren. Dafür haben wir dir eine Email geschickt, in der alle weiteren Schritte erklärt werden.", "success");
            setNeutralFor(username);
            setNeutralFor(email);
            setNeutralFor(password);
            agbs.checked = false;
            agbs.classList.remove('checkbox-unchecked');
            agbs.classList.remove('checkbox-checked');
            nutzungsbedingungen.checked = false;
            nutzungsbedingungen.classList.remove('checkbox-unchecked');
            nutzungsbedingungen.classList.remove('checkbox-checked');
            passwordStrength.style = 'width: 0%';
            passwordStrength.classList.remove('progress-bar-warning');
            passwordStrength.classList.remove('progress-bar-success');
            passwordStrength.classList.remove('progress-bar-danger');
        }else {
            const arr = this.responseText.split(":");
            const err = arr[1];
            let message = this.responseText;
            message = message.replace(/:.+/, "");
            if(err == "all") {
                setErrorFor(username);
                setErrorFor(email);
                setErrorFor(password);
            }else {
                setErrorFor(document.getElementById(err));
            }
            swal("Registrierung fehlgeschlagen!", message, "error");
        }
        spinner.style = 'display: none';
    });
    xhr.open('post', 'include/registrierung.inc.php', true);
    xhr.send(fd);
}

function checkInput(type, name) {
    const input = document.getElementById(name);
	const value = input.value.trim();

    let re = "";
    if(type == "username") {
        if(value === '') {
            setErrorFor(input);
        } else {
            re = /^\w+$/;
            if(input.value.length < 5) {
                setErrorFor(input);
                return;
            }
            if (!re.test(input.value)) {
                setErrorFor(input);
                return;
            }
            setSuccessFor(input);
        }
    }

    if(type == "email") {
        if(value === '') {
            setErrorFor(input);
        } else {
            re = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
            if (!re.test(input.value)) {
                setErrorFor(input);
            }else {
                setSuccessFor(input);
            }
        }
    }
	
    if(type == "password") {
        if(value === '') {
            setErrorFor(input);
        } else {
            re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            if(input.value.length < 6) {
                setErrorFor(input);
                return;
            }
            if (!re.test(input.value)) {
                setErrorFor(input);
                return
            }
            setSuccessFor(input);
        }
    }

}

function checkboxCheck(checkbox) {
    if(checkbox.checked) {
        checkbox.classList.remove('checkbox-unchecked');
        checkbox.classList.add('checkbox-checked');
    }else {
        checkbox.classList.remove('checkbox-checked');
	    checkbox.classList.add('checkbox-unchecked');
    }
}

function setErrorFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control error';
}

function setNeutralFor(input) {
    const formControl = input.parentElement;
	formControl.className = 'form-control';
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
