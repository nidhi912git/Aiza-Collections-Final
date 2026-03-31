<?php
$page_id = "wishlist-page";

include "../includes/config.php";
include "../includes/header.php";

$wishlist = $_SESSION['wishlist'] ?? [];
?>

<section>

    <h2 class="section-title">Your Wishlist</h2>

    <p style="text-align:center;margin-bottom:20px;">
        Explore more styles you’ll love
        <a href="/aiza-collections-final/pages/catalog.php" class="btn" style="margin-left:10px;">
            Go to Catalog
        </a>
    </p>

    <?php if (!$wishlist): ?>

        <p style="text-align:center;">🛒 Your Wishlist empty</p>

    <?php else: ?>

        <div class="list-container">

            <?php foreach ($wishlist as $key => $_):

                list($code, $size) = explode("_", $key);

                $q = mysqli_query($conn, "
                SELECT
                p.product_name,
                p.price,
                MIN(i.image_path) image_path
                FROM products p
                LEFT JOIN product_images i
                ON p.product_code=i.product_code
                WHERE p.product_code='$code'
                GROUP BY p.product_code
                ");

                $p = mysqli_fetch_assoc($q);

                if (!$p) continue;

            ?>

                <div class="list-card"
                    onclick="window.location.href='/aiza-collections-final/pages/product.php?code=<?= $code ?>'">

                    <img class="list-img"
                       src="<?= imgPath($p['image_path'] ?? '') ?>"
                       alt="<?= htmlspecialchars($p['product_name']) ?>">
                    <div class="list-info">

                        <h4><?= htmlspecialchars($p['product_name']) ?></h4>

                        <div class="list-meta">

                            <span class="price">
                                ₹<?= number_format($p['price']) ?>
                            </span>

                            <span class="item-size">
                                Size: <?= htmlspecialchars($size) ?>
                            </span>

                        </div>

                        <p class="list-subtotal">
                            Total ₹<?= number_format($p['price']) ?>
                        </p>

                    </div>

                    <div class="list-actions" onclick="event.stopPropagation();">

                        <form method="post"
                            action="list-handler.php"
                            onsubmit="event.preventDefault(); confirmAction('Remove this item?', this);">

                            <input type="hidden" name="product_code" value="<?= $code ?>">
                            <input type="hidden" name="size" value="<?= $size ?>">
                            <input type="hidden" name="action" value="remove_wishlist">

                            <button type="submit" class="action-btn remove-btn">
                                Remove
                            </button>

                        </form>

                        <form method="post"
                            action="list-handler.php"
                            onsubmit="event.preventDefault(); confirmAction('Move this item to cart?', this);">

                            <input type="hidden" name="product_code" value="<?= $code ?>">
                            <input type="hidden" name="size" value="<?= $size ?>">
                            <input type="hidden" name="action" value="wishlist_to_cart">

                            <button type="submit" class="action-btn move-btn">
                                Move to Cart
                            </button>

                        </form>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</section>

<div class="popup"></div>

<?php if (isset($_SESSION['popup'])): ?>

    <script>
        window.addEventListener("DOMContentLoaded", function() {

            showPopup("<?= $_SESSION['popup'] ?>");

        });
    </script>

<?php unset($_SESSION['popup']);
endif; ?>

<?php include "../includes/footer.php"; ?>