$( document ).ready(function() {
    var url = window.location.href;
    url = url.split("/");
    var lenght = url.length - 4;
    var append = "";

    for(let i = 0; i < lenght; i++) {
        append += "../";
    }

    checkCookies(append);
});

function acceptCookies(url) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url + "include/cookies/setCookiesAllowed.php");
    xhr.send();
}

function checkCookies(url) {
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('load', function (e) {
        if(this.responseText == "false") {
            swal({
                title: "Wir verwenden Cookies",
                text: "Um unsere Webseite einwandfrei nutzen zu können, bitten wir dich die Cookies unserer Webseite zu akzeptieren",
                icon: "info",
                button: "Akzeptieren",
              })
              .then(() => {
                acceptCookies(url);
              });
        }
    });
    xhr.open("GET", url + "include/cookies/checkCookiesAllowed.php");
    xhr.send();
}
