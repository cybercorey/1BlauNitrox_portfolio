function editNavLinks(loggedIn) {
    document.getElementById("icon").src = "../../images/icon.png";
    document.getElementById("home").firstChild.setAttribute("href", "../../index.php");
    document.getElementById("games").firstChild.setAttribute("href", "../../spiele.php");
    document.getElementById("statistics").firstChild.setAttribute("href", "../../statistics.php");
    document.getElementById("status").firstChild.setAttribute("href", "../../status.php");
    document.getElementById("team").firstChild.setAttribute("href", "../../team.php");
    document.getElementById("support").firstChild.setAttribute("href", "../index/support.php");
    if(loggedIn) {
        document.getElementById("profile").firstChild.setAttribute("href", "../../profile.php");
        document.getElementById("logout").firstChild.setAttribute("href", "../../include/logout_verarbeitung.php");
    } else {
        document.getElementById("login").firstChild.setAttribute("href", "../../login.php");
    }


    //Footer Links change
}


function editFooterLinks() {

}