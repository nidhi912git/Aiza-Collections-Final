<?php
$page_id = "product-page";
include "../includes/config.php";
include "../includes/header.php";

$code = mysqli_real_escape_string($conn, $_GET['code'] ?? '');

$pq = mysqli_query($conn,"
SELECT * FROM products WHERE product_code='$code'
");
$product = mysqli_fetch_assoc($pq);
if (!$product) {
  echo "<p>Product not found</p>";
  include "../includes/footer.php";
  exit;
}

$iq = mysqli_query($conn,"
SELECT image_path FROM product_images
WHERE product_code='$code'
");
$images = [];
while ($i = mysqli_fetch_assoc($iq)) {
  $images[] = "/aiza-collections/assets/" . $i['image_path'];
}

/* SIMILAR PRODUCTS */
if (ctype_digit(substr($code,0,1))) {
  $similarCond = "p.product_code REGEXP '^[0-9]+'";
} else {
  preg_match('/^[A-Za-z]+/', $code, $m);
  $prefix = $m[0];
  $similarCond = "p.product_code LIKE '$prefix%'";
}

$simQ = mysqli_query($conn,"
SELECT p.product_code,p.product_name,p.price,
       MIN(i.image_path) image_path
FROM products p
LEFT JOIN product_images i ON p.product_code=i.product_code
WHERE $similarCond AND p.product_code!='$code'
GROUP BY p.product_code
");
?>
<section>
<div class="product-layout">

<div class="product-image">
  <img id="prod-img" src="<?= $images[0] ?>">
</div>

<div class="product-details">

<h1><?= htmlspecialchars($product['product_name']) ?></h1>

<p class="product-price">₹<?= number_format($product['price']) ?></p>

<p class="product-description">
<?= nl2br(htmlspecialchars($product['description'])) ?>
</p>

<div class="product-row">
  <span class="label">Size:</span>
  <div class="sizes">
    <button>S</button><button>M</button><button>L</button>
    <button>XL</button><button>XXL</button>
  </div>
</div>

<div class="product-row">
  <span class="label">Quantity:</span>
  <div class="cart-qty">
    <button class="qty-btn" onclick="decreaseQty()">−</button>
    <span id="qty">1</span>
    <button class="qty-btn" onclick="increaseQty()">+</button>
  </div>
</div>

<button class="add-cart-btn"
        data-code="<?= $code ?>"
        onclick="addToCart(event,this)">
  Add to Cart
</button>

<button class="wishlist-btn"
        data-code="<?= $code ?>"
        onclick="addToWishlist(event,this)">
  ♡ Wishlist
</button>

</div>
</div>
</section>

<?php if (count($images) > 1): ?>
<section>
<h2 class="section-title">More Images</h2>
<div class="grid grid-3">
<?php foreach ($images as $img): ?>
  <img src="<?= $img ?>" onclick="setMainImage('<?= $img ?>')">
<?php endforeach; ?>
</div>
</section>
<?php endif; ?>

<section>
<h2 class="section-title">Similar Products</h2>
<div class="carousel-wrapper">
<button class="carousel-btn left" onclick="scrollSimilar(-1)">‹</button>
<div class="carousel">
<div class="carousel-track" id="similarTrack">
<?php while ($s = mysqli_fetch_assoc($simQ)): ?>
<div class="product-card"
     onclick="viewProduct('<?= $s['product_code'] ?>')">
<img src="/aiza-collections/assets/<?= $s['image_path'] ?>">
<h4><?= $s['product_name'] ?></h4>
<p>₹<?= $s['price'] ?></p>

<div class="actions horizontal-actions"
     onclick="event.stopPropagation();">
<button class="add-cart-btn"
        data-code="<?= $s['product_code'] ?>"
        onclick="addToCart(event,this)">Add to Cart</button>
<button class="wishlist-btn"
        data-code="<?= $s['product_code'] ?>"
        onclick="addToWishlist(event,this)">♡</button>
</div>
</div>
<?php endwhile; ?>
</div>
</div>
<button class="carousel-btn right" onclick="scrollSimilar(1)">›</button>
</div>
</section>

<div class="popup"></div>
<?php include "../includes/footer.php"; ?>