<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost","root","","aizacollections");

if(!$conn){
    die("Database connection failed: ".mysqli_connect_error());
}

/* charset AFTER connection */
function imgPath($path){

    if(!$path){
        return "/aiza-collections-final/assets/images/no-image.jpg";
    }

    if(str_starts_with($path,"assets/")){
        return "/aiza-collections-final/" . $path;
    }

    return "/aiza-collections-final/assets/images/" . $path;
}
?>