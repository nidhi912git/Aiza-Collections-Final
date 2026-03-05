<?php
$page_id="cart-page";
include "../includes/config.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $code=$_POST['product_code']??null;
  $action=$_POST['action']??null;
  if ($code) {
    if ($action==='add') $_SESSION['cart'][$code]=($_SESSION['cart'][$code]??0)+1;
    if ($action==='decrease') {
      $_SESSION['cart'][$code]--;
      if ($_SESSION['cart'][$code]<=0) unset($_SESSION['cart'][$code]);
    }
    if ($action==='remove') unset($_SESSION['cart'][$code]);
  }
}

$cart=$_SESSION['cart']??[];
$total=0;
?>
<section>
<h2 class="section-title">Your Cart</h2>

<?php if(!$cart): ?>
<p style="text-align:center;">Your cart is empty</p>
<?php else: ?>
<div class="grid grid-4">
<?php foreach($cart as $code=>$qty):
$q=mysqli_query($conn,"
SELECT p.product_name,p.price,MIN(i.image_path) image_path
FROM products p
LEFT JOIN product_images i ON p.product_code=i.product_code
WHERE p.product_code='$code'
GROUP BY p.product_code");
$p = mysqli_fetch_assoc($q);
if (!$p) {
  unset($_SESSION['cart'][$code]);
  continue;
}
$sub=$p['price']*$qty;
$total+=$sub;
?>
<div class="product-card">
<img src="/aiza-collections/assets/<?= $p['image_path'] ?>">
<h4><?= $p['product_name'] ?></h4>
<p>₹<?= $p['price'] ?></p>

<div class="cart-qty">
<form method="post"><input type="hidden" name="product_code" value="<?= $code ?>"><input type="hidden" name="action" value="decrease"><button class="qty-btn">−</button></form>
<span><?= $qty ?></span>
<form method="post"><input type="hidden" name="product_code" value="<?= $code ?>"><input type="hidden" name="action" value="add"><button class="qty-btn">+</button></form>
</div>

<p>Subtotal ₹<?= $sub ?></p>
</div>
<?php endforeach; ?>
</div>
<h3 style="text-align:center;">Total ₹<?= $total ?></h3>
<?php endif; ?>
</section>

<div class="popup"></div>
<?php include "../includes/footer.php"; ?>