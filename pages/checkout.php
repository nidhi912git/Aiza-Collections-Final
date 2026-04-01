<?php
$page_id = "checkout-page";

include "../includes/config.php";
include "../includes/security.php";
include "../includes/header.php";

/* ===============================
   USER MUST BE LOGGED IN
================================ */

if (!isset($_SESSION['user'])) {
   header("Location: /aiza-collections-final/pages/login.php");
   exit;
}

/* ===============================
   GET CART
================================ */

$cart = $_SESSION['cart'] ?? [];

if (!$cart) {

   echo "
   <div style='text-align:center;margin-top:40px;'>

      <p>Your cart is empty.</p>

      <a href='/aiza-collections-final/pages/catalog.php' class='btn'>
         Browse Products
      </a>

   </div>";

   include "../includes/footer.php";
   exit;
}

$user_id = $_SESSION['user']['user_id'];
$total = 0;

/* ===============================
   CALCULATE TOTAL (SAFE)
================================ */

foreach ($cart as $key => $qty) {

   list($code, $size) = explode("_", $key);

   $stmt = mysqli_prepare($conn, "
   SELECT price
   FROM products
   WHERE product_code=?
   ");

   mysqli_stmt_bind_param($stmt, "s", $code);
   mysqli_stmt_execute($stmt);

   $res = mysqli_stmt_get_result($stmt);
   $p = mysqli_fetch_assoc($res);

   if ($p) {
      $total += $p['price'] * $qty;
   }
}

/* ===============================
   START TRANSACTION
================================ */

mysqli_begin_transaction($conn);

try {

   /* ===============================
   CREATE ORDER
================================ */

   $stmt = mysqli_prepare($conn, "
   INSERT INTO orders(user_id,order_total)
   VALUES(?,?)
   ");

   mysqli_stmt_bind_param($stmt, "id", $user_id, $total);
   mysqli_stmt_execute($stmt);

   $order_id = mysqli_insert_id($conn);

   /* ===============================
   INSERT ITEMS + STOCK UPDATE
================================ */

   foreach ($cart as $key => $qty) {

      list($code, $size) = explode("_", $key);

      /* GET PRODUCT PRICE */

      $stmt = mysqli_prepare($conn, "
      SELECT price
      FROM products
      WHERE product_code=?
      ");

      mysqli_stmt_bind_param($stmt, "s", $code);
      mysqli_stmt_execute($stmt);

      $res = mysqli_stmt_get_result($stmt);
      $p = mysqli_fetch_assoc($res);

      if (!$p) {
         throw new Exception("Product not found");
      }

      $price = $p['price'];

      /* CHECK STOCK */

      $stmt = mysqli_prepare($conn, "
      SELECT stock_qty
      FROM product_stock
      WHERE product_code=? AND size=?
      FOR UPDATE
      ");

      mysqli_stmt_bind_param($stmt, "ss", $code, $size);
      mysqli_stmt_execute($stmt);

      $res = mysqli_stmt_get_result($stmt);
      $stockRow = mysqli_fetch_assoc($res);

      if (!$stockRow) {
         throw new Exception("Stock entry missing for product.");
      }

      if ($stockRow['stock_qty'] < $qty) {
         throw new Exception("Not enough stock");
      }

      if ($stockRow['stock_qty'] <= 0) {
         $_SESSION['popup'] = "Out of stock. Check again in a few days.";
         mysqli_rollback($conn);
         header("Location: /aiza-collections-final/pages/cart.php");
         exit;
      }

      if ($stockRow['stock_qty'] < $qty) {
         $_SESSION['popup'] = "Only " . $stockRow['stock_qty'] . " items available for size " . $size . ".";
         mysqli_rollback($conn);
         header("Location: /aiza-collections-final/pages/cart.php");
         exit;
      }

      /* INSERT ORDER ITEM */

      $stmt = mysqli_prepare($conn, "
      INSERT INTO order_items
      (order_id,product_code,size,quantity,price)
      VALUES(?,?,?,?,?)
      ");

      mysqli_stmt_bind_param(
         $stmt,
         "issid",
         $order_id,
         $code,
         $size,
         $qty,
         $price
      );

      mysqli_stmt_execute($stmt);

      /* REDUCE STOCK */

      $stmt = mysqli_prepare($conn, "
      UPDATE product_stock
      SET stock_qty = stock_qty - ?
      WHERE product_code=? AND size=?
      ");

      mysqli_stmt_bind_param(
         $stmt,
         "iss",
         $qty,
         $code,
         $size
      );

      mysqli_stmt_execute($stmt);
   }

   /* ===============================
            COMMIT TRANSACTION
   ================================ */

   mysqli_commit($conn);

   /* CLEAR CART */

   unset($_SESSION['cart']);

   /* SUCCESS MESSAGE */

   $_SESSION['popup'] = "Order placed successfully!";

   /* REDIRECT */

   header("Location: /aiza-collections-final/pages/orders.php");
   exit;
} catch (Exception $e) {

   /* ===============================
         ROLLBACK IF ERROR
   ================================ */

   mysqli_rollback($conn);

   $_SESSION['popup'] = "Checkout failed. Please try again.";
   header("Location: /aiza-collections-final/pages/cart.php");
   exit;

   include "../includes/footer.php";
   exit;
}
