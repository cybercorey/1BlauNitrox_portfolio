<?php 
include_once '../functions.php';
if(isset($_COOKIE['allowed'])) {
    echo "true";
}else {
    echo "false";
}
?>