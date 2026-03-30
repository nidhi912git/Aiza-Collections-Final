<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* TOTAL INVENTORY VALUE */

$q1 = mysqli_query($conn, "
SELECT SUM(p.price * ps.stock_qty) AS total_value
FROM products p
JOIN product_stock ps
ON p.product_code = ps.product_code
");

$total_value = mysqli_fetch_assoc($q1)['total_value'] ?? 0;


/* TOTAL ITEMS IN STOCK */

$q2 = mysqli_query($conn, "
SELECT SUM(stock_qty) AS total_units
FROM product_stock
");

$total_units = mysqli_fetch_assoc($q2)['total_units'] ?? 0;

/* TOP STOCKED PRODUCTS */

$top = mysqli_query($conn, "
SELECT
p.product_code,
p.product_name,
SUM(ps.stock_qty) AS stock
FROM products p
LEFT JOIN product_stock ps
ON p.product_code = ps.product_code
GROUP BY p.product_code,p.product_name
ORDER BY stock DESC
LIMIT 5
");

?>

<section>

    <h2 class="section-title">Inventory Overview</h2>

    <div class="admin-stats">

        <div class="stat-card">
            <h3><?= number_format($total_units) ?></h3>
            <p>Total Units in Stock</p>
        </div>

        <div class="stat-card">
            <h3>₹<?= number_format($total_value) ?></h3>
            <p>Total Inventory Value</p>
        </div>

    </div>


    <h3 style="margin-top:40px;">Top Stocked Products</h3>

    <table class="admin-table">

        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Stock</th>
        </tr>

        <?php while ($p = mysqli_fetch_assoc($top)): ?>

            <tr>

                <td><?= htmlspecialchars($p['product_code']) ?></td>

                <td><?= htmlspecialchars($p['product_name']) ?></td>

                <td><?= $p['stock'] ?></td>

            </tr>

        <?php endwhile; ?>

    </table>

</section>

<?php include "../../includes/footer.php"; ?>