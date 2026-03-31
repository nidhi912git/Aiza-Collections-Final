<?php
session_start();
include "../includes/config.php"; // DB connection

$code = $_POST['product_code'] ?? null;
$size = $_POST['size'] ?? 'M'; // make sure frontend sends correct size
$action = $_POST['action'] ?? null;

$key = $code . '_' . $size;

if (!$code) exit;


/* =====================================
   FUNCTION: CHECK STOCK (PER SIZE)
===================================== */
function canAddToCart($conn, $code, $size, $current_qty, &$message = "")
{

    $stmt = mysqli_prepare($conn, "
        SELECT stock_qty 
        FROM product_stock 
        WHERE product_code=? AND size=?
    ");

    mysqli_stmt_bind_param($stmt, "ss", $code, $size);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $available = intval($row['stock_qty'] ?? 0);

    // ❌ completely out of stock
    if ($available <= 0) {
        $message = "Out of stock. Check again in a few days.";
        return false;
    }

    // ❌ reached max available stock
    if ($current_qty >= $available) {
        $message = "Only $available items available for this size.";
        return false;
    }

    return true;
}


/* =====================================
   ADD TO CART (AJAX)
===================================== */
if ($action === 'add_cart') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    $message = "";

    if (!canAddToCart($conn, $code, $size, $current_qty, $message)) {
        echo $message; // send exact reason back to JS
        exit;
    }

    $qty = intval($_POST['qty'] ?? 1);

    for ($i = 0; $i < $qty; $i++) {

        $current_qty = $_SESSION['cart'][$key] ?? 0;

        $message = "";

        if (!canAddToCart($conn, $code, $size, $current_qty, $message)) {
            echo $message;
            exit;
        }

        $_SESSION['cart'][$key] = $current_qty + 1;
    }

    echo "added_cart";
    exit;
}


/* =====================================
   INCREASE QUANTITY (CART PAGE)
===================================== */
if ($action === 'add') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    $message = "";

    if (!canAddToCart($conn, $code, $size, $current_qty, $message)) {
        $_SESSION['popup'] = $message;
        header("Location: cart.php");
        exit;
    }

    $_SESSION['cart'][$key] = $current_qty + 1;

    header("Location: cart.php");
    exit;
}


/* =====================================
   DECREASE QUANTITY
===================================== */
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


/* =====================================
   ADD TO WISHLIST
===================================== */
if ($action === 'add_wishlist') {
    $_SESSION['wishlist'][$key] = true;
    echo "added_wishlist";
    exit;
}


/* =====================================
   REMOVE FROM CART
===================================== */
if ($action === 'remove_cart') {
    unset($_SESSION['cart'][$key]);
    $_SESSION['popup'] = "Item removed from cart";
    header("Location: cart.php");
    exit;
}


/* =====================================
   REMOVE FROM WISHLIST
===================================== */
if ($action === 'remove_wishlist') {
    unset($_SESSION['wishlist'][$key]);
    $_SESSION['popup'] = "Item removed from wishlist";
    header("Location: wishlist.php");
    exit;
}


/* =====================================
   MOVE CART → WISHLIST
===================================== */
if ($action === 'cart_to_wishlist') {
    unset($_SESSION['cart'][$key]);
    $_SESSION['wishlist'][$key] = true;
    $_SESSION['popup'] = "Moved to wishlist";
    header("Location: cart.php");
    exit;
}


/* =====================================
   MOVE WISHLIST → CART
===================================== */
if ($action === 'wishlist_to_cart') {

    $current_qty = $_SESSION['cart'][$key] ?? 0;

    $message = "";

    if (!canAddToCart($conn, $code, $size, $current_qty, $message)) {
        $_SESSION['popup'] = $message;
        header("Location: wishlist.php");
        exit;
    }

    unset($_SESSION['wishlist'][$key]);
    $_SESSION['cart'][$key] = 1;

    $_SESSION['popup'] = "Moved to cart";
    header("Location: wishlist.php");
    exit;
}
