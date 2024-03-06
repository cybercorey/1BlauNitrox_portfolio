<?php
include_once 'config.php';

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if (!$mysqli) {
    echo "<p>Die Datenbank Verbindung konnte nicht herrgestellt werden.</p>";
}

createTables($mysqli);
clearLoginFails($mysqli);
clearUnregisterdAccounts($mysqli);

function createTables($mysqli)
{
    $stmt = $mysqli->prepare("CREATE TABLE IF NOT EXISTS `users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `uuid` VARCHAR(128) NOT NULL , `username` VARCHAR(36) NOT NULL , `email` VARCHAR(40) NOT NULL , `password` VARCHAR(128) NOT NULL , `token` TEXT , minecraftUUID CHAR(36) , discordUUID VARCHAR(256) , isVerified TINYINT(2) NOT NULL DEFAULT '0', verifyToken TEXT , verifiedLoginDevice VARCHAR(32) NOT NULL , profileimage VARCHAR(256) NOT NULL, role VARCHAR(20) NOT NULL DEFAULT 'Spieler' , creationdate BIGINT(8) NOT NULL , PRIMARY KEY (`id`) , UNIQUE(`uuid`) , UNIQUE(`username`) , UNIQUE(`email`) , UNIQUE(`minecraftUUID`) , UNIQUE(`discordUUID`))");
    $stmt->execute();

    $stmt = $mysqli->prepare("CREATE TABLE IF NOT EXISTS `login_fails` ( `user_id` INT(11) NOT NULL , `time` BIGINT(8) NOT NULL)");
    $stmt->execute();
}

function clearLoginFails($mysqli) {
    $time = time();
    $time = strtotime('-10 minutes');
    $stmt = $mysqli->prepare("DELETE FROM `login_fails` WHERE time < ?");
    $stmt->bind_param('i', $time);
    $stmt->execute();
}

function clearUnregisterdAccounts($mysqli) {
    $time = time();
    $time = strtotime('-60 minutes');
    $state = 0;
    $stmt = $mysqli->prepare("DELETE FROM `users` WHERE creationdate < ? AND isVerified = ?");
    $stmt->bind_param('ii', $time, $state);
    $stmt->execute();
}

?>