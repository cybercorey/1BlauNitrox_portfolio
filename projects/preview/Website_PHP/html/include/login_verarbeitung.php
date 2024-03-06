<?php
include_once 'functions.php';
include_once 'mailer.php';

sec_session_start();

if(isset($_POST['email'], $_POST['p'])){
    $username = $_POST['email'];
    $password = $_POST['p'];

    echo login($username, $password, $mysqli, $mailer);
}else {
    echo "Ein Fehler ist entstanden! Probiers erneut (2)";
}
?>
