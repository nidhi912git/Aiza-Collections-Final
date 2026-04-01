<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* =====================================
   STOCK CONFLICTS (SIZE-WISE CORRECT)
===================================== */

$q = mysqli_query($conn, "
    SELECT 
        p.product_code,
        p.product_name,
        ps.size,
        ps.stock_qty
    FROM product_stock ps
    JOIN products p
    ON ps.product_code = p.product_code
    WHERE ps.stock_qty <= 5
    ORDER BY ps.stock_qty ASC
");
?>

<section>

    <div class="admin-header">

        <div></div>

        <h2 class="section-title">Stock Conflicts</h2>

        <div class="admin-actions">
            <a href="dashboard.php" class="btn">Dashboard</a>
        </div>

    </div>
    <div class ="card-box">

    <h3 style="margin-top:30px;">Stock Issues (Size-wise)</h3>

    <?php if (mysqli_num_rows($q) == 0): ?>

        <p>No stock issues 🎉</p>

    <?php else: ?>

        <table class="admin-table">

            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($q)): ?>

                <tr>

                    <td><?= htmlspecialchars($row['product_code']) ?></td>

                    <td><?= htmlspecialchars($row['product_name']) ?></td>

                    <td><?= $row['size'] ?></td>

                    <td style="
                        <?= $row['stock_qty'] == 0 
                            ? 'color:red;font-weight:bold;' 
                            : 'color:#e67e22;font-weight:bold;' ?>
                    ">
                        <?= $row['stock_qty'] == 0 
                            ? 'Out of Stock' 
                            : 'Low Stock (' . $row['stock_qty'] . ')' ?>
                    </td>

                </tr>

            <?php endwhile; ?>
            </div>
        </table>

    <?php endif; ?>

</section>

<?php include "../../includes/footer.php"; ?>