<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* TOTAL PRODUCTS */
$q1 = mysqli_query($conn,"SELECT COUNT(*) total FROM products");
$products = mysqli_fetch_assoc($q1)['total'];

/* TOTAL ORDERS */
$q2 = mysqli_query($conn,"SELECT COUNT(*) total FROM orders");
$orders = mysqli_fetch_assoc($q2)['total'];

/* PENDING ORDERS */
$q3 = mysqli_query($conn,"
SELECT COUNT(*) total
FROM orders
WHERE order_status='Pending'
");
$pending = mysqli_fetch_assoc($q3)['total'];

/* LOW STOCK PRODUCTS */
$lowStock = mysqli_query($conn,"
SELECT product_code, product_name, stock_qty
FROM products
WHERE stock_qty <= 5
LIMIT 5
");

/* RECENT ORDERS */
$recent = mysqli_query($conn,"
SELECT o.order_id,o.order_total,o.created_at,u.name
FROM orders o
LEFT JOIN users u
ON o.user_id=u.user_id
ORDER BY o.created_at DESC
LIMIT 5
");
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

<a href="products.php" class="btn">Manage Products</a>

<a href="orders_panel.php" class="btn">Orders Panel</a>

<a href="stock_conflicts.php" class="btn">Stock Conflicts</a>

<a href="upload_product_image.php" class="btn">Upload Images</a>

</div>


<!-- LOW STOCK -->

<h3 style="margin-top:40px;">Low Stock Alerts</h3>

<?php if(mysqli_num_rows($lowStock)==0): ?>

<p>No low stock items.</p>

<?php else: ?>

<table class="admin-table">

<tr>
<th>Product</th>
<th>Stock Left</th>
</tr>

<?php while($p=mysqli_fetch_assoc($lowStock)): ?>

<tr>
<td><?= $p['product_name'] ?></td>
<td style="color:#e67e22;font-weight:bold;">
<?= $p['stock_qty'] ?>
</td>
</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>


<!-- RECENT ORDERS -->

<h3 style="margin-top:40px;">Recent Orders</h3>

<table class="admin-table">

<tr>
<th>Order</th>
<th>Customer</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php while($o=mysqli_fetch_assoc($recent)): ?>

<tr>

<td>#<?= $o['order_id'] ?></td>

<td><?= htmlspecialchars($o['name']) ?></td>

<td>₹<?= number_format($o['order_total']) ?></td>

<td><?= date("d M Y",strtotime($o['created_at'])) ?></td>

</tr>

<?php endwhile; ?>

</table>

</section>

<?php include "../../includes/footer.php"; ?>