<?php 
include_once '../functions.php';

echo getenv("domain");

if(!isset($_COOKIE['allowed'])) {
    setcookie('allowed', 'true', [
        'expires' => strtotime( '+20 years' ),
        'path' => '/',
        'domain' => getenv("domain"),
        'secure' => getenv("secure"),
        'httponly' => true,
        'samesite' => 'Strict',
    ]); 
}
?>