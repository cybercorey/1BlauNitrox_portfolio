<?php
include_once 'functions.php';
sec_session_start();

$_SESSION = array();

$params = session_get_cookie_params();

setcookie(session_name(), 'null' , [
    'expires' => time() - 42000,
]);

session_destroy();
header('Location: ../index.php');

?>
