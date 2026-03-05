
<?php
// Show all PHP errors (VERY important for XAMPP)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session (for cart, wishlist later)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "aizacollections");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}