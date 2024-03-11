const paperPlane = document.getElementById("paperplane");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("message");
const formResponse = document.getElementById("form-response");

function formhash() {
    let error = false;

    if(!validateValue(nameInput, "name")) {
        error = true;
    }

    if(!validateValue(emailInput, "email")) {
        error = true;
    }

    if(!validateValue(messageInput, "message")) {
        error = true;
    }

    if(error) {
        return false;
    }

    paperPlane.classList.add("paperplane-flying");
    setTimeout(function() {
        paperPlane.classList.remove("paperplane-flying");
    }, 500);
    sendMail(nameInput.value.trim(), emailInput.value.trim(), messageInput.value.trim());
}

function validateValue(element, identifier) {
    value = element.value.trim();

    let regex;
    let min;
    switch(identifier) {
        case "name":
            regex = /[A-Za-z]/;
            min = 3;
            break;
        case "email":
            regex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
            min = 0;
            break;
        case "message":
            regex = /.*/;
            min = 20;
            break;
    }

    if(value === "" || !regex.test(value) || value.length < min) {
        element.parentNode.classList.add("error");
        return false;
    } else {
        element.parentNode.classList.remove("error");
        return true; 
    }
    
    
}

function sendMail(name, email, content) {
    const formData = new FormData();
    
    formData.append('name', name);
    formData.append('email', email);
    formData.append('content', content);

    const url = 'api/mailer.php';

    const options = {
        method: 'POST',
        body: formData
    };

    // Send the POST request to the backend
    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                formResponse.innerText = "Email could not be send"
                formResponse.classList.remove("form-response-success");
                formResponse.classList.add("form-response-error");
                console.log(response);
                throw new Error('Network response was not ok');
            }
            formResponse.innerText = "Email send successfully"
            formResponse.classList.add("form-response-success");
            formResponse.classList.remove("form-response-error");
            nameInput.value = "";
            emailInput.value = "";
            messageInput.value = "";
            return response;
        })
        .then(data => {
            console.log('Response from backend:', data);
        })
        .catch(error => {
            console.error('Error sending data to backend:', error);
        });
}

function copyDiscord() {
    navigator.clipboard.writeText('1blaunitr0x');
    let tooltip = document.getElementById('tooltip-text');
    tooltip.innerText = "Copied!"
    setTimeout(function() {
        tooltip.innerText = "Copy Tag";
    }, 1500);
}