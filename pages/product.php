<?php
$page_id = "product-page";

include "../includes/config.php";
include "../includes/header.php";

$code = mysqli_real_escape_string($conn,$_GET['code'] ?? '');

$pq = mysqli_query($conn,"
SELECT *
FROM products
WHERE product_code='$code'
AND product_code NOT LIKE '%-%'
");

$product = mysqli_fetch_assoc($pq);

if(!$product){
echo "<p style='text-align:center;'>Product not found</p>";
include "../includes/footer.php";
exit;
}

/* GET PRODUCT IMAGES */

$iq = mysqli_query($conn,"
SELECT image_path
FROM product_images
WHERE product_code='$code'
OR product_code LIKE '$code-%'
ORDER BY LENGTH(image_path), image_path
");
$images = [];

while($i=mysqli_fetch_assoc($iq)){
$images[] = imgPath($i['image_path']);
}

/* make images available to JS slider */
echo "<script>
window.productImages = ".json_encode($images).";
</script>";

/* SIMILAR PRODUCTS */

$cat = $product['category_num'];

$simQ = mysqli_query($conn,"
SELECT
p.product_code,
p.product_name,
p.price,
p.stock_qty,
MIN(i.image_path) AS image_path
FROM products p
LEFT JOIN product_images i
ON p.product_code=i.product_code
WHERE p.category_num='$cat'
AND p.product_code!='$code'
AND p.product_code NOT LIKE '%-%'
GROUP BY p.product_code
LIMIT 10
");
?>

<section>

<div class="product-layout">

<!-- PRODUCT IMAGE SLIDER -->

<div class="product-image">

<button class="img-nav prev" onclick="changeImage(-1)">❮</button>

<img
id="prod-img"
src="<?= $images[0] ?? '/aiza-collections-final/assets/no-image.jpg' ?>"
alt="<?= htmlspecialchars($product['product_name']) ?>"
>

<button class="img-nav next" onclick="changeImage(1)">❯</button>

</div>


<!-- PRODUCT DETAILS -->

<div class="product-details">

<h1><?= htmlspecialchars($product['product_name']) ?></h1>

<p class="product-price">
₹<?= number_format($product['price']) ?>
</p>

<p class="product-description">
<?= nl2br(htmlspecialchars($product['description'])) ?>
</p>


<!-- SIZE -->

<div class="product-row size-row">

<span class="label">Size:</span>

<div class="sizes">

<button type="button">S</button>
<button type="button">M</button>
<button type="button">L</button>
<button type="button">XL</button>
<button type="button">XXL</button>

</div>

</div>


<!-- QUANTITY -->

<div class="product-row">

<span class="label">Quantity:</span>

<div class="cart-qty">

<button class="qty-btn" onclick="decreaseQty()">−</button>

<span id="qty">1</span>

<button class="qty-btn" onclick="increaseQty()">+</button>

</div>

</div>


<!-- ACTION BUTTONS -->

<div class="product-actions">

<button
class="add-cart-btn"
data-code="<?= $code ?>"
onclick="addCurrentProductToCart(this)"
<?= $product['stock_qty'] <= 0 ? "disabled" : "" ?>
>
Add to Cart
</button>

<button
class="wishlist-btn"
data-code="<?= $code ?>"
onclick="addCurrentProductToWishlist(this)"
>
♡
</button>

</div>


<?php if($product['stock_qty'] <= 0): ?>

<p class="stock out">
Out of Stock
</p>

<?php endif; ?>


<!-- SIZE CHART -->

<div class="size-chart">

<h4>Women’s Size Chart</h4>

<table>

<tr>
<th>Size</th>
<th>Bust</th>
<th>Waist</th>
<th>Hip</th>
</tr>

<tr>
<td>S</td>
<td>34</td>
<td>28</td>
<td>36</td>
</tr>

<tr>
<td>M</td>
<td>36</td>
<td>30</td>
<td>38</td>
</tr>

<tr>
<td>L</td>
<td>38</td>
<td>32</td>
<td>40</td>
</tr>

<tr>
<td>XL</td>
<td>40</td>
<td>34</td>
<td>42</td>
</tr>

<tr>
<td>XXL</td>
<td>42</td>
<td>36</td>
<td>44</td>
</tr>

</table>

</div>

</div>

</div>

</section>


<section>

<h2 class="section-title">Similar Products</h2>

<div class="carousel-wrapper">

<button class="carousel-btn left" onclick="scrollSimilar(-1)">‹</button>

<div class="carousel">

<div class="carousel-track" id="similarTrack">

<?php while($s=mysqli_fetch_assoc($simQ)): ?>

<div class="product-card"
onclick="viewProduct('<?= $s['product_code'] ?>')">

<img
src="<?= imgPath($s['image_path']) ?>"
alt="<?= htmlspecialchars($s['product_name']) ?>"
>

<h4><?= htmlspecialchars($s['product_name']) ?></h4>

<p>₹<?= number_format($s['price']) ?></p>

<div class="actions horizontal-actions"
onclick="event.stopPropagation();">

<button
class="add-cart-btn"
data-code="<?= $s['product_code'] ?>"
onclick="addToCart(event,this)"
<?= $s['stock_qty'] <= 0 ? "disabled" : "" ?>
>
Add to Cart
</button>

<button
class="wishlist-btn"
data-code="<?= $s['product_code'] ?>"
onclick="addToWishlist(event,this)"
>
♡
</button>

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