
const nav = document.getElementById('navigation');
window.onscroll = function() {navScroll()};

const menuOpen = document.getElementById('menu-open');
const menuClose = document.getElementById('menu-close');
const collapsedNav = document.getElementById('navigation-collapsed');

function toggle() {
    if(menu.classList.contains("active")) {
        collapsedNav.classList.remove("active");
        menu.classList.remove("active");
        setTimeout(() => {
            menuOpen.style.display = 'block';
            menuClose.style.display = 'none';
        }, 350);
    }else {
        collapsedNav.classList.add("active");
        menu.classList.add("active");
        setTimeout(() => {
            menuOpen.style.display = 'none';
            menuClose.style.display = 'block';
        }, 350);
    }
}

function navScroll() {
    if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
        nav.classList.add('scroll');
    } else {
        nav.classList.remove('scroll');
    }
}

function checkResize() {
    var w = window.innerWidth;
    if(w > 900) {
        collapsedNav.classList.remove("active");
        menu.classList.remove("active");
        menuOpen.style.display = 'block';
        menuClose.style.display = 'none';
    } 
    
    if(w <= 1100) {
        document.getElementById("survey-image").src = "../../img/survey2.png"
    } else if(w > 1100) {
        document.getElementById("survey-image").src = "../../img/survey.png"
    }
}
  

function login() {
    password = document.getElementById("password").value;
    if(password === '') {
        return;
    }

    var fd = new FormData;

    fd.append('p', password);
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('load', function (e) {
        if (this.responseText == "1") {
            location.href = "./index.php";
        } else{
            document.getElementById("error-text").innerText = this.responseText;
        }
    });
    xhr.open('post', '../../include/login_verarbeitung.php', true);
    xhr.send(fd);
}