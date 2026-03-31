<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "aizacollections_v2");

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

function imgPath($path) {

    if (empty($path)) {
        return "/aiza-collections-final/assets/no-image.jpg";
    }

    // if already full path (old images)
    if (strpos($path, 'assets/') !== false) {
        return "/aiza-collections-final/" . $path;
    }

    // if already contains uploads
    if (strpos($path, 'uploads/') !== false) {
        return "/aiza-collections-final/assets/" . $path;
    }

    // default (new uploads)
    return "/aiza-collections-final/assets/uploads/" . $path;
}
function getStock($conn, $code, $size) {
    $stmt = mysqli_prepare($conn, "
        SELECT stock_qty 
        FROM product_stock 
        WHERE product_code=? AND size=?
    ");
    mysqli_stmt_bind_param($stmt, "ss", $code, $size);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);

    return $row ? (int)$row['stock_qty'] : 0;
}