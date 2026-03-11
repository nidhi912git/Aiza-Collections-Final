<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* TOTAL PRODUCTS (unique products only) */

$q1 = mysqli_query($conn, "
SELECT COUNT(*) AS total
FROM products
WHERE product_code NOT LIKE '%-%'
");

$products = mysqli_fetch_assoc($q1)['total'] ?? 0;

/* TOTAL ORDERS */

$q2 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders");
$orders = mysqli_fetch_assoc($q2)['total'] ?? 0;

/* PENDING ORDERS */

$q3 = mysqli_query($conn, "
SELECT COUNT(*) AS total
FROM orders
WHERE order_status IN ('Placed','Processing')
");

$pending = mysqli_fetch_assoc($q3)['total'] ?? 0;

/* CANCELLED ORDERS */

$q4 = mysqli_query($conn, "
SELECT COUNT(*) AS total
FROM orders
WHERE order_status='Cancelled'
");

$cancelled = mysqli_fetch_assoc($q4)['total'] ?? 0;

/* LOW STOCK */

$lowStock = mysqli_query($conn, "
SELECT
p.product_code,
p.product_name,
IFNULL(SUM(ps.stock_qty),0) AS total_stock
FROM products p
LEFT JOIN product_stock ps
ON p.product_code = ps.product_code
WHERE p.product_code NOT REGEXP '-[0-9]+$'
GROUP BY p.product_code
HAVING total_stock <= 5
ORDER BY total_stock ASC
LIMIT 5
");

/* RECENT ORDERS */

$recent = mysqli_query($conn, "
SELECT
o.order_id,
o.order_total,
o.created_at,
u.name
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

            <div class="dash-item">
                <span>Cancelled Orders</span>
                <h3><?= $cancelled ?></h3>
            </div>

        </div>

        <div class="dashboard-actions">

            <a href="products.php" class="btn">Manage Products</a>

            <a href="orders_panel.php" class="btn">Orders Panel</a>

            <a href="inventory_overview.php" class="btn">Inventory Overview</a>

            <a href="stock_conflicts.php" class="btn">Stock Conflicts</a>

            <a href="manage_staff.php" class="btn">Manage Staff</a>

        </div>

    </div>

    <h3 class="dashboard-subtitle">Low Stock Alerts</h3>

    <?php if (mysqli_num_rows($lowStock) == 0): ?>

        <p style="text-align:center;">No low stock products.</p>

    <?php else: ?>

        <table class="admin-table">

            <tr>
                <th>Product</th>
                <th>Stock Left</th>
            </tr>

            <?php while ($p = mysqli_fetch_assoc($lowStock)): ?>

                <tr>
                    <td><?= htmlspecialchars($p['product_name']) ?></td>

                    <td style="color:#e67e22;font-weight:bold;">
                        <?= $p['total_stock'] ?>
                    </td>

                </tr>

            <?php endwhile; ?>

        </table>

    <?php endif; ?>

    <h3 class="dashboard-subtitle">Recent Orders</h3>

    <?php if (mysqli_num_rows($recent) == 0): ?>

        <p style="text-align:center;">No recent orders.</p>

    <?php else: ?>

        <table class="admin-table">

            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
            </tr>

            <?php while ($o = mysqli_fetch_assoc($recent)): ?>

                <tr>

                    <td>#<?= $o['order_id'] ?></td>

                    <td><?= htmlspecialchars($o['name']) ?></td>

                    <td>₹<?= number_format($o['order_total']) ?></td>

                    <td><?= date("d M Y", strtotime($o['created_at'])) ?></td>

                </tr>

            <?php endwhile; ?>

        </table>

    <?php endif; ?>

</section>

<?php include "../../includes/footer.php"; ?>