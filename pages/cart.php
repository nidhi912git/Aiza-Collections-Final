<?php
$page_id="cart-page";

include "../includes/config.php";
include "../includes/header.php";

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<section>

<h2 class="section-title">Your Cart</h2>

<p class="cart-subtext" style="text-align:center;margin-bottom:20px;">
Looking for more styles?
<a href="/aiza-collections-final/pages/catalog.php" class="btn" style="margin-left:10px;">
Browse Catalog
</a>
</p>

<?php if(!$cart): ?>

<p style="text-align:center;">Your cart is empty</p>

<?php else: ?>

<div class="list-container">

<?php foreach($cart as $key=>$qty):

list($code,$size) = explode("_",$key);

$q = mysqli_query($conn,"
SELECT
p.product_name,
p.price,
p.stock_qty,
MIN(i.image_path) image_path
FROM products p
LEFT JOIN product_images i
ON p.product_code=i.product_code
WHERE p.product_code='$code'
GROUP BY p.product_code
");

$p = mysqli_fetch_assoc($q);

if(!$p) continue;

$sub = $p['price'] * $qty;
$total += $sub;

?>

<div class="list-card"
onclick="window.location.href='/aiza-collections-final/pages/product.php?code=<?= $code ?>'">

<img class="list-img"
src="<?= imgPath($p['image_path']) ?>"
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


<div class="list-qty" onclick="event.stopPropagation();">

<form method="post"
action="list-handler.php"
onsubmit="event.preventDefault(); confirmDecrease(<?= $qty ?>, this);">

<input type="hidden" name="product_code" value="<?= $code ?>">
<input type="hidden" name="size" value="<?= $size ?>">
<input type="hidden" name="action" value="decrease">

<button class="qty-btn">−</button>

</form>


<span class="qty-value">
<?= $qty ?>
</span>


<form method="post" action="list-handler.php">

<input type="hidden" name="product_code" value="<?= $code ?>">
<input type="hidden" name="size" value="<?= $size ?>">
<input type="hidden" name="action" value="add">

<button class="qty-btn">+</button>

</form>

</div>

<p class="list-subtotal">
Subtotal ₹<?= number_format($sub) ?>
</p>

</div>



<div class="list-actions" onclick="event.stopPropagation();">


<form method="post"
action="list-handler.php"
onsubmit="event.preventDefault(); confirmAction('Remove this item?', this);">

<input type="hidden" name="product_code" value="<?= $code ?>">
<input type="hidden" name="size" value="<?= $size ?>">
<input type="hidden" name="action" value="remove_cart">

<button type="submit" class="action-btn remove-btn">
Remove
</button>

</form>



<form method="post"
action="list-handler.php"
onsubmit="event.preventDefault(); confirmAction('Move this item to wishlist?', this);">

<input type="hidden" name="product_code" value="<?= $code ?>">
<input type="hidden" name="size" value="<?= $size ?>">
<input type="hidden" name="action" value="cart_to_wishlist">

<button type="submit" class="action-btn move-btn">
♡ Move to Wishlist
</button>

</form>


</div>

</div>

<?php endforeach; ?>

</div>


<h3 id="cart-total" style="text-align:center;margin-top:2rem;">
Total ₹<?= number_format($total) ?>
</h3>


<div style="text-align:center;margin-top:20px;">

<a href="/aiza-collections-final/pages/checkout.php" class="btn">
Proceed to Checkout
</a>

</div>

<?php endif; ?>

</section>



<?php if(isset($_SESSION['popup'])): ?>

<script>

window.addEventListener("DOMContentLoaded",function(){
showPopup("<?= $_SESSION['popup'] ?>");
});

</script>

<?php unset($_SESSION['popup']); endif; ?>


<div class="popup"></div>


<script>

function confirmDecrease(qty,form){

if(qty==1){

confirmAction(
"This will remove the product from your cart. Continue?",
form
);

}else{

form.submit();

}

}

</script>


<?php include "../includes/footer.php"; ?>