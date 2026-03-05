<?php
$page_id="wishlist-page";
include "../includes/config.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $code=$_POST['product_code']??null;
  if ($code) $_SESSION['wishlist'][$code]=true;
}

$wishlist=$_SESSION['wishlist']??[];
?>
<section>
<h2 class="section-title">Your Wishlist</h2>

<?php if(!$wishlist): ?>
<p style="text-align:center;">Wishlist empty</p>
<?php else: ?>
<div class="grid grid-4">
<?php foreach($wishlist as $code=>$_):
$q=mysqli_query($conn,"
SELECT p.product_name,p.price,MIN(i.image_path) image_path
FROM products p
LEFT JOIN product_images i ON p.product_code=i.product_code
WHERE p.product_code='$code'
GROUP BY p.product_code");
$p = mysqli_fetch_assoc($q);
if (!$p) {
  unset($_SESSION['wishlist'][$code]);
  continue;
}
?>
<div class="product-card wishlist-card">
<img src="/aiza-collections/assets/<?= $p['image_path'] ?>">
<h4><?= $p['product_name'] ?></h4>
<p>₹<?= $p['price'] ?></p>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
</section>

<div class="popup"></div>
<?php include "../includes/footer.php"; ?>