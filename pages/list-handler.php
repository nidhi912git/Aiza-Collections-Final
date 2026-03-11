<?php
session_start();

$code = $_POST['product_code'] ?? null;
$size = $_POST['size'] ?? 'M';
$action = $_POST['action'] ?? null;

$key = $code . '_' . $size;

if (!$code) exit;

/* ADD TO CART */
if ($action === 'add_cart') {
    $_SESSION['cart'][$key] = ($_SESSION['cart'][$key] ?? 0) + 1;
    echo "added_cart";
    exit;
}

/* ADD QUANTITY INCREASE */
if ($action === 'add') {
    $_SESSION['cart'][$key] = ($_SESSION['cart'][$key] ?? 0) + 1;
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
    unset($_SESSION['wishlist'][$key]);
    $_SESSION['cart'][$key] = 1;
    $_SESSION['popup'] = "Moved to cart";
    header("Location: wishlist.php");
    exit;
}
