<?php
session_start();
include "../includes/config.php"; // DB connection

$code = $_POST['product_code'] ?? null;
$size = $_POST['size'] ?? 'M';
$action = $_POST['action'] ?? null;

$key = $code . '_' . $size;

if (!$code) exit;

/* FUNCTION: CHECK STOCK */
function canAddToCart($conn, $code, $size, $current_qty) {
    $sql = "SELECT stock_qty FROM product_stock 
            WHERE product_code='$code' AND size='$size'";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $available = $row['stock_qty'] ?? 0;

    return $current_qty < $available;
}

/* ADD TO CART */
if ($action === 'add_cart') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    if (!canAddToCart($conn, $code, $size, $current_qty)) {
        echo "out_of_stock";
        exit;
    }

    $_SESSION['cart'][$key] = $current_qty + 1;

    echo "added_cart";
    exit;
}

/* ADD QUANTITY INCREASE */
if ($action === 'add') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    if (!canAddToCart($conn, $code, $size, $current_qty)) {
        $_SESSION['popup'] = "Out of stock. Please check again in a few days.";
        header("Location: cart.php");
        exit;
    }

    $_SESSION['cart'][$key] = $current_qty + 1;

    header("Location: cart.php");
    exit;
}

/* ADD QUANTITY DECREASE */
if ($action === 'decrease') {

    if (isset($_SESSION['cart'][$key])) {

        $_SESSION['cart'][$key]--;

        if ($_SESSION['cart'][$key] <= 0) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['popup'] = "Item removed from cart";
        }
    }

    header("Location: cart.php");
    exit;
}

/* ADD TO WISHLIST */
if ($action === 'add_wishlist') {
    $_SESSION['wishlist'][$key] = true;
    echo "added_wishlist";
    exit;
}

/* REMOVE FROM CART */
if ($action === 'remove_cart') {
    unset($_SESSION['cart'][$key]);
    $_SESSION['popup'] = "Item removed from cart";
    header("Location: cart.php");
    exit;
}

/* REMOVE FROM WISHLIST */
if ($action === 'remove_wishlist') {
    unset($_SESSION['wishlist'][$key]);
    $_SESSION['popup'] = "Item removed from wishlist";
    header("Location: wishlist.php");
    exit;
}

/* MOVE CART → WISHLIST */
if ($action === 'cart_to_wishlist') {
    unset($_SESSION['cart'][$key]);
    $_SESSION['wishlist'][$key] = true;
    $_SESSION['popup'] = "Moved to wishlist";
    header("Location: cart.php");
    exit;
}

/* MOVE WISHLIST → CART */
if ($action === 'wishlist_to_cart') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    if (!canAddToCart($conn, $code, $size, $current_qty)) {
        $_SESSION['popup'] = "Out of stock. Please check again in a few days.";
        header("Location: wishlist.php");
        exit;
    }

    unset($_SESSION['wishlist'][$key]);
    $_SESSION['cart'][$key] = 1;

    $_SESSION['popup'] = "Moved to cart";
    header("Location: wishlist.php");
    exit;
}