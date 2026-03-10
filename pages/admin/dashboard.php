<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* TOTAL PRODUCTS */

$q1=mysqli_query($conn,"SELECT COUNT(*) total FROM products");
$products=mysqli_fetch_assoc($q1)['total'];

/* TOTAL ORDERS */

$q2=mysqli_query($conn,"SELECT COUNT(*) total FROM orders");
$orders=mysqli_fetch_assoc($q2)['total'];

/* PENDING ORDERS */

$q3=mysqli_query($conn,"
SELECT COUNT(*) total
FROM orders
WHERE order_status='Placed'
");

$pending=mysqli_fetch_assoc($q3)['total'];

/* LOW STOCK (SIZE BASED) */

$lowStock=mysqli_query($conn,"
SELECT 
p.product_code,
p.product_name,
SUM(ps.stock_qty) total_stock
FROM products p
LEFT JOIN product_stock ps
ON p.product_code=ps.product_code
GROUP BY p.product_code
HAVING total_stock <=5
LIMIT 5
");

/* RECENT ORDERS */

$recent=mysqli_query($conn,"
SELECT o.order_id,o.order_total,o.created_at,u.name
FROM orders o
LEFT JOIN users u
ON o.user_id=u.user_id
ORDER BY o.created_at DESC
LIMIT 5
");
?>

<section>

<h2 class="section-title">Store Operations Dashboard</h2>

<div class="dashboard-layout">

<div class="dashboard-stats">

<div class="dash-item">
<span>Total Products</span>
<h3><?= $products ?></h3>
</div>

<div class="dash-item">
<span>Total Orders</span>
<h3><?= $orders ?></h3>
</div>

<div class="dash-item">
<span>Pending Orders</span>
<h3><?= $pending ?></h3>
</div>

</div>

<div class="dashboard-actions">

<a href="products.php" class="btn">Manage Products</a>

<a href="orders_panel.php" class="btn">Orders Panel</a>

<a href="stock_conflicts.php" class="btn">Stock Conflicts</a>

<a href="upload_product_image.php" class="btn">Upload Images</a>

</div>

</div>

<h3 class="dashboard-subtitle">Low Stock Alerts</h3>

<table class="admin-table">

<tr>
<th>Product</th>
<th>Stock</th>
</tr>

<?php while($p=mysqli_fetch_assoc($lowStock)): ?>

<tr>
<td><?= $p['product_name'] ?></td>
<td><?= $p['total_stock'] ?></td>
</tr>

<?php endwhile; ?>

</table>

</section>

<?php include "../../includes/footer.php"; ?>