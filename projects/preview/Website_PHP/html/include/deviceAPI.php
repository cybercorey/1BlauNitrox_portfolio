<?php

function getVerifiedDevicesForUser($userid, $mysqli) {
    $stmt = $mysqli->prepare("SELECT verifiedLoginDevice FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $userid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($verifiedDevice);
    $stmt->fetch();
  
    if ($stmt->num_rows == 1) {
        return $verifiedDevice;
    }
}

function verifyUserDevice($deviceid, $userid, $username, $mysqli) {
    $stmt = $mysqli->prepare("UPDATE users SET verifiedLoginDevice = ? WHERE id = ? AND username = ?");
    $stmt->bind_param('sis', $deviceid, $userid, $username);
    if($stmt->execute()) {
        if(mysqli_affected_rows($mysqli) > 0) {
            return true;
        }else {
            return false;
        }
    } else {
        return false;
    }
}

?>