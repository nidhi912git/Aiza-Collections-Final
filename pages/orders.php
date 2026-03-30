<?php
$page_id = "orders-page";

include "../includes/config.php";
include "../includes/header.php";

/* USER MUST BE LOGGED IN */

if (!isset($_SESSION['user'])) {
    header("Location: /aiza-collections-final/pages/login.php");
    exit;
}

$user_id = $_SESSION['user']['user_id'];

/* GET USER ORDERS */

$orders = mysqli_query($conn, "
SELECT *
FROM orders
WHERE user_id='$user_id'
ORDER BY created_at DESC
");

?>

<section>

    <h2 class="section-title">My Orders</h2>

    <?php if (mysqli_num_rows($orders) == 0): ?>

        <div style="text-align:center;margin-top:40px;">

            <p>You haven't placed any orders yet.</p>

            <a href="/aiza-collections-final/pages/catalog.php" class="btn">
                Browse Products
            </a>

        </div>

    <?php else: ?>

        <div class="list-container">

            <?php while ($order = mysqli_fetch_assoc($orders)):

                $order_id = $order['order_id'];
                /* CALCULATE UPDATED TOTAL */
                $totalQ = mysqli_query($conn, "
                SELECT 
                SUM(
                    CASE 
                        WHEN item_status != 'Cancelled' 
                        THEN price * quantity 
                        ELSE 0 
                    END
                ) AS updated_total
                FROM order_items
                WHERE order_id='$order_id'
                ");

                $totalRow = mysqli_fetch_assoc($totalQ);
                $updated_total = $totalRow['updated_total'] ?? 0;

                /* GET ONE IMAGE FOR PREVIEW */

                $preview = mysqli_query($conn, "
                SELECT
                p.product_name,
                MIN(i.image_path) image_path
                FROM order_items oi
                LEFT JOIN products p
                ON oi.product_code=p.product_code
                LEFT JOIN product_images i
                ON p.product_code=i.product_code
                WHERE oi.order_id='$order_id'
                GROUP BY oi.product_code
                LIMIT 1
                ");

                $img = mysqli_fetch_assoc($preview);

            ?>

                <div class="list-card">

                    <img
                        src="<?= imgPath($img['image_path'] ?? 'no-image.jpg') ?>"
                        class="list-img">

                    <div class="list-info">

                        <div class="list-main">

                            <h4>Order #<?= $order_id ?></h4>

                        </div>

                        <div class="list-meta">

                            <span class="price">
                                ₹<?= number_format($updated_total) ?>

                                <?php if ($updated_total != $order['order_total']): ?>
                                    <span style="text-decoration:line-through;opacity:0.6;">
                                        ₹<?= number_format($order['order_total']) ?>
                                    </span>
                                <?php endif; ?>
                            </span>

                            <span>
                                <?= date("d M Y", strtotime($order['created_at'])) ?>
                            </span>

                            <span>
                                <?= htmlspecialchars($order['order_status']) ?>
                            </span>

                        </div>

                    </div>

                    <div class="list-actions">

                        <a
                            href="/aiza-collections-final/pages/order_details.php?id=<?= $order_id ?>"
                            class="action-btn">
                            View Details
                        </a>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</section>

<div class="popup"></div>

<?php include "../includes/footer.php"; ?>