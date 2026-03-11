<?php
include_once __DIR__ . "/security.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aiza Collections</title>

<link rel="stylesheet" href="/aiza-collections-final/css/style.css?v=<?= time() ?>">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;400;500;600&display=swap" rel="stylesheet">
<script src="/aiza-collections-final/js/script.js?v=<?= time() ?>" defer></script>
</head>
<body id="<?= $page_id ?? '' ?>" 
class="<?= $page_id ?? '' ?> <?= (isset($page_id) && strpos($page_id,'admin')===0)?'admin-page':'' ?>">

<header class="site-header">

<!-- LOGO -->
<a href="#">
<img src="/aiza-collections-final/assets/logo.jpeg" class="logo" alt="Aiza Collections">
</a>

<!-- SHOP NAME -->
<span class="shop-name">AIZA COLLECTIONS</span>

<!-- SEARCH (DESKTOP) -->
<form class="header-search desktop-only" action="/aiza-collections-final/pages/catalog.php" method="get">
<input type="search" name="q" placeholder="Search products...">
</form>

<!-- MENU TOGGLE (MOBILE) -->
<div class="menu-toggle" id="mobile-menu">
<span></span>
<span></span>
<span></span>
</div>

<!-- NAV LINKS (SLIDE-IN PANE ON MOBILE) -->
<nav class="main-nav" id="main-nav">

  <!-- SEARCH (MOBILE INSIDE PANE) -->
  <form class="mobile-search mobile-only" action="/aiza-collections-final/pages/catalog.php" method="get">
    <input type="search" name="q" placeholder="Search products...">
  </form>

  <a href="/aiza-collections-final/pages/home.php">Home</a>
  <a href="/aiza-collections-final/pages/catalog.php">Catalog</a>
  <a href="/aiza-collections-final/pages/about.php">About</a>
  <a href="/aiza-collections-final/pages/contact.php">Contact</a>

  <!-- ACCOUNT LINKS (MOBILE INSIDE PANE) -->
  <div class="mobile-account-links mobile-only">
    <hr>
    <?php if (!is_logged_in()): ?>
      <a href="/aiza-collections-final/pages/login.php">Login</a>
      <a href="/aiza-collections-final/pages/register.php">Register</a>
    <?php else: ?>
      <span class="account-name-mobile" style="padding: 15px 10px; display:block; font-weight:bold;">
        Hello, <?= htmlspecialchars($_SESSION['user']['name']) ?>
      </span>
      <?php
      $cartCount = 0;
      if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $qty){
      $cartCount += $qty;
      }
      }
      ?>
      <a href="/aiza-collections-final/pages/cart.php">Cart (<span data-cart-count><?= $cartCount ?></span>)</a>
      <a href="/aiza-collections-final/pages/wishlist.php">Wishlist</a>
      <a href="/aiza-collections-final/pages/orders.php">My Orders</a>
      <?php if (is_admin()): ?>
        <a href="/aiza-collections-final/pages/admin/products.php">Admin Panel</a>
      <?php endif; ?>
      <a href="/aiza-collections-final/pages/logout.php" style="color:var(--primary);">Logout</a>
    <?php endif; ?>
  </div>

</nav>

<!-- ACCOUNT MENU (DESKTOP) -->
<div class="account-menu desktop-only" id="accountMenu">

<img src="/aiza-collections-final/assets/icons/user.png" class="account-icon" id="accountIcon">

<div class="account-dropdown">

<?php if (!is_logged_in()): ?>

<a href="/aiza-collections-final/pages/login.php">Login</a>
<a href="/aiza-collections-final/pages/register.php">Register</a>

<?php else: ?>

<span class="account-name">
Hello, <?= htmlspecialchars($_SESSION['user']['name']) ?>
</span>

<?php
$cartCount = 0;
if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $qty){
$cartCount += $qty;
}
}
?>

<a href="/aiza-collections-final/pages/cart.php">
Cart (<?= $cartCount ?>)
</a>

<a href="/aiza-collections-final/pages/wishlist.php">
Wishlist
</a>

<a href="/aiza-collections-final/pages/orders.php">
My Orders
</a>

<?php if (is_admin()): ?>

<a href="/aiza-collections-final/pages/admin/dashboard.php">
Manager Panel
</a>

<span style="color:#d4a017;font-size:12px;">(Manager)</span>

<?php endif; ?>
<?php if (is_staff()): ?>

<a href="/aiza-collections-final/pages/staff/dashboard.php">
Staff Panel
</a>

<span style="color:#d4a017;font-size:12px;">(Staff)</span>

<?php endif; ?>

<a href="/aiza-collections-final/pages/logout.php">
Logout
</a>
<?php endif; ?>

</div>
</div>

</header>