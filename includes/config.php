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
mysqli_set_charset($conn,"utf8mb4");

?>