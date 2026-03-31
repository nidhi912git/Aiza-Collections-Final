<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "aizacollections_v2";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
