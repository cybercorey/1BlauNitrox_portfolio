<?php

function pseudoHash($value) {
    $value = str_replace("1", "x", $value);
    $value = str_replace("2", "o", $value);
    $value = str_replace("4", "g", $value);
    $value = str_replace("6", "r", $value);
    $value = str_replace("9", "z", $value);

    return $value;
}


function undoPseudoHash($value) {
    $value = str_replace("x", "1", $value);
    $value = str_replace("o", "2", $value);
    $value = str_replace("g", "4", $value);
    $value = str_replace("r", "6", $value);
    $value = str_replace("z", "9", $value);

    return $value;
}

?>