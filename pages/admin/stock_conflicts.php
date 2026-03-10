<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* OUT OF STOCK PRODUCTS */

$out_query = mysqli_query($conn,"
SELECT 
p.product_code,
p.product_name,
SUM(ps.stock_qty) stock
FROM products p
LEFT JOIN product_stock ps
ON p.product_code=ps.product_code
GROUP BY p.product_code
HAVING stock <=5
");

/* LOW STOCK PRODUCTS */

$low_query = mysqli_query($conn,"
SELECT 
p.product_code,
p.product_name,
SUM(ps.stock_qty) stock
FROM products p
LEFT JOIN product_stock ps
ON p.product_code=ps.product_code
GROUP BY p.product_code
HAVING stock <=5
");
?>

<section>

<h2 class="section-title">Stock Conflicts</h2>


<!-- OUT OF STOCK -->

<h3 style="margin-top:30px;">Out of Stock</h3>

<?php if(mysqli_num_rows($out_query)==0): ?>

<p>No products are currently out of stock.</p>

<?php else: ?>

<table class="admin-table">

<tr>
<th>Product Code</th>
<th>Product Name</th>
<th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($out_query)): ?>

<tr>

<td><?= htmlspecialchars($row['product_code']) ?></td>

<td><?= htmlspecialchars($row['product_name']) ?></td>

<td style="color:red;font-weight:bold;">
Out of Stock
</td>

</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>


<!-- LOW STOCK -->

<h3 style="margin-top:40px;">Low Stock (≤ 5)</h3>

<?php if(mysqli_num_rows($low_query)==0): ?>

<p>No low stock products.</p>

<?php else: ?>

<table class="admin-table">

<tr>
<th>Product Code</th>
<th>Product Name</th>
<th>Stock Left</th>
</tr>

<?php while($row=mysqli_fetch_assoc($low_query)): ?>

<tr>

<td><?= htmlspecialchars($row['product_code']) ?></td>

<td><?= htmlspecialchars($row['product_name']) ?></td>

<td style="color:#e67e22;font-weight:bold;">
<?= $row['stock_qty'] ?>
</td>

</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>

</section>

<?php include "../../includes/footer.php"; ?>