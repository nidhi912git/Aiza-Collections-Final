<?php

include "../includes/config.php";

/* USER MUST BE LOGGED IN */

if (!isset($_SESSION['user'])) {
    header("Location: /aiza-collections-final/pages/login.php");
    exit;
}

/* GET ITEM ID */

$item_id = intval($_POST['item_id'] ?? 0);

if (!$item_id) {
    $_SESSION['popup'] = "Invalid order item.";
    header("Location: /aiza-collections-final/pages/orders.php");
    exit;
}

/* FETCH ORDER ITEM */

$q = mysqli_query($conn, "
SELECT *
FROM order_items
WHERE item_id='$item_id'
");

if (mysqli_num_rows($q) == 0) {

    $_SESSION['popup'] = "Order item not found.";
    header("Location: /aiza-collections-final/pages/orders.php");
    exit;
}

$item = mysqli_fetch_assoc($q);

/* PREVENT CANCELLING IF ALREADY SHIPPED / CANCELLED */

$status = $item['item_status'] ?? 'Placed';

if ($status != 'Placed') {

    $_SESSION['popup'] = "This item can no longer be cancelled.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

/* GET PRODUCT DATA */

$code = $item['product_code'];
$size = $item['size'];
$qty  = $item['quantity'];

/* RESTORE STOCK */

mysqli_query($conn, "
UPDATE product_stock
SET stock_qty = stock_qty + $qty
WHERE product_code='$code'
AND size='$size'
");

/* UPDATE ORDER ITEM STATUS */

mysqli_query($conn, "
UPDATE order_items
SET item_status='Cancelled'
WHERE item_id='$item_id'
");

/* GET ORDER ID */
$order_id = $item['order_id'];

/* CHECK IF ALL ITEMS ARE CANCELLED */
$check = mysqli_query($conn, "
SELECT 
  COUNT(*) AS total,
  SUM(item_status = 'Cancelled') AS cancelled
FROM order_items
WHERE order_id='$order_id'
");

$row = mysqli_fetch_assoc($check);

if ($row['total'] == $row['cancelled']) {

    /* UPDATE MAIN ORDER STATUS */
    mysqli_query($conn, "
    UPDATE orders
    SET order_status='Cancelled'
    WHERE order_id='$order_id'
    ");
}

/* SUCCESS POPUP */

$_SESSION['popup'] = "Order item cancelled successfully.";

/* REDIRECT BACK */

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
