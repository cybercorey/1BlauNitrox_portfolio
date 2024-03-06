function activate(number) {
    document.querySelector(".active-team").classList.remove("active-team")
    document.getElementById(number).classList.add("active-team")
    document.querySelector(".visible").classList.remove("visible")
    document.getElementById(number + number).classList.add("visible")
    localStorage.setItem("active-tab", number);
}

function load() {

    tab = localStorage.getItem("active-tab");
    if (tab === null) {
        localStorage.setItem("active-tab", 1);
        document.getElementById("1").classList.add("active-team")
        document.getElementById("11").classList.add("visible")
    } else {
        document.getElementById(tab).classList.add("active-team")
        document.getElementById(tab + tab).classList.add("visible")
    }
}