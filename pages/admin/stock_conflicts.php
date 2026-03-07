<?php
session_start();
include "../../includes/config.php";
include "../../includes/header.php";

/* OUT OF STOCK */
$out_query = mysqli_query($conn,"
SELECT product_code, product_name, stock
FROM products
WHERE stock = 0
");

/* LOW STOCK */
$low_query = mysqli_query($conn,"
SELECT product_code, product_name, stock
FROM products
WHERE stock > 0 AND stock <= 5
");
?>

<section>

<h2 class="section-title">Stock Conflicts</h2>

<!-- OUT OF STOCK -->

<h3 style="margin-top:30px;">Out of Stock</h3>

<?php if(mysqli_num_rows($out_query)==0): ?>

<p>No products are out of stock.</p>

<?php else: ?>

<table class="admin-table">

<tr>
<th>Product Code</th>
<th>Product Name</th>
<th>Stock</th>
</tr>

<?php while($row=mysqli_fetch_assoc($out_query)): ?>

<tr>

<td><?= $row['product_code'] ?></td>

<td><?= $row['product_name'] ?></td>

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

<td><?= $row['product_code'] ?></td>

<td><?= $row['product_name'] ?></td>

<td style="color:#e67e22;font-weight:bold;">
<?= $row['stock'] ?>
</td>

</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>

</section>

<?php include "../../includes/footer.php"; ?>