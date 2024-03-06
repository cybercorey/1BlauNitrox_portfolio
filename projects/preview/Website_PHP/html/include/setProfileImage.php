<?php
include_once 'functions.php';

if (isset($_POST['uuid'], $_POST['image'])) {
    $uuid = $_POST['uuid'];
    $image = $_POST['image'];

    $stmt = $mysqli->prepare("UPDATE users SET profileimage = ? WHERE uuid = ?");
    $stmt->bind_param("ss", $image, $uuid);
    $stmt->execute();
}
?>