<?php
function valid_data($data) {
    //$data = trim($data, "\n\r\t\v\x00");
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_NOQUOTES);
    return $data;
}

function selected(){
    return true;
}