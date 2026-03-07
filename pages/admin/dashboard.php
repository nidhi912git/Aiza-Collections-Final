<?php
session_start();
include "../../includes/config.php";
include "../../includes/header.php";

/* TOTAL PRODUCTS */
$q1=mysqli_query($conn,"SELECT COUNT(*) total FROM products");
$products=mysqli_fetch_assoc($q1)['total'];

/* TOTAL ORDERS */
$q2=mysqli_query($conn,"SELECT COUNT(*) total FROM orders");
$orders=mysqli_fetch_assoc($q2)['total'];

/* PENDING ORDERS */
$q3=mysqli_query($conn,"SELECT COUNT(*) total FROM orders WHERE order_status='Pending'");
$pending=mysqli_fetch_assoc($q3)['total'];
?>

<section>

<h2 class="section-title">Admin Dashboard</h2>

<div class="admin-stats">

<div class="stat-card">
<h3><?= $products ?></h3>
<p>Total Products</p>
</div>

<div class="stat-card">
<h3><?= $orders ?></h3>
<p>Total Orders</p>
</div>

<div class="stat-card">
<h3><?= $pending ?></h3>
<p>Pending Orders</p>
</div>

</div>

<div class="admin-links">

<a href="orders_panel.php" class="btn">View Orders</a>

<a href="stock_conflicts.php" class="btn">Stock Conflicts</a>

<a href="upload_product_image.php" class="btn">Upload Product Images</a>

</div>

</section>

<?php include "../../includes/footer.php"; ?>