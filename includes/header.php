<?php
include_once __DIR__ . "/security.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aiza Collections</title>

<link rel="stylesheet" href="/aiza-collections/css/style.css">
<script src="/aiza-collections/js/script.js" defer></script>
</head>
<body id="<?= $page_id ?? '' ?>" class="<?= $page_id ?? '' ?> <?= strpos($page_id,'admin')===0?'admin-page':'' ?>">

<header class="site-header">

<!-- LOGO -->
<a href="/aiza-collections/pages/home.php">
<img src="/aiza-collections/assets/logo.jpeg" class="logo" alt="Aiza Collections">
</a>

<!-- SEARCH -->
<form class="header-search" action="/aiza-collections/pages/catalog.php" method="get">
<input type="search" name="q" placeholder="Search products...">
</form>

<!-- NAV LINKS -->
<nav class="main-nav">

<a href="/aiza-collections/pages/home.php">Home</a>
<a href="/aiza-collections/pages/catalog.php">Catalog</a>
<a href="/aiza-collections/pages/about.php">About</a>
<a href="/aiza-collections/pages/contact.php">Contact</a>

</nav>

<!-- ACCOUNT MENU -->
<div class="account-menu" id="accountMenu">

<img src="/aiza-collections/assets/icons/user.png" class="account-icon" id="accountIcon">

<div class="account-dropdown">

<?php if (!is_logged_in()): ?>

<a href="/aiza-collections/pages/login.php">Login</a>
<a href="/aiza-collections/pages/register.php">Register</a>

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

<a href="/aiza-collections/pages/cart.php">
Cart (<?= $cartCount ?>)
</a>

<a href="/aiza-collections/pages/wishlist.php">
Wishlist
</a>
<?php if (is_admin()): ?>

<a href="/aiza-collections/pages/admin/products.php">
Admin Panel
</a>

<span style="color:#d4a017;font-size:12px;">(Admin)</span>

<?php endif; ?>

<a href="/aiza-collections/pages/logout.php">
Logout
</a>
<?php endif; ?>

</div>
</div>

</header>