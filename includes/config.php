<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "aizacollections");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

/* REMEMBER ME AUTO LOGIN */

if (!isset($_SESSION['user']) && isset($_COOKIE['remember_token'])) {

    $token = $_COOKIE['remember_token'];

    $stmt = mysqli_prepare($conn, "
    SELECT user_id,name,role
    FROM users
    WHERE remember_token=?
    ");

    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($u = mysqli_fetch_assoc($result)) {
        $_SESSION['user'] = $u;
    }
}

/* IMAGE PATH HELPER */

function imgPath($path)
{
    if (!$path) {
        return "/aiza-collections-final/assets/images/no-image.jpg";
    }

    if (str_starts_with($path, "assets/")) {
        return "/aiza-collections-final/" . $path;
    }

    return "/aiza-collections-final/assets/images/" . $path;
}
