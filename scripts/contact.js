const paperPlane = document.getElementById("paperplane");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("message");

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
        alert("error");
        return false;
    }

    return true;
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