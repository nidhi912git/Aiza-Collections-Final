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

<body id="<?= $page_id ?? '' ?>">

<header>

<img src="/aiza-collections/assets/logo.jpeg" class="logo">

<form class="header-search" action="/aiza-collections/pages/catalog.php" method="get">
<input type="search" name="q" placeholder="Search products">
</form>

<nav>

<a href="/aiza-collections/pages/home.php">Home</a>
<a href="/aiza-collections/pages/catalog.php">Catalog</a>
<a href="/aiza-collections/pages/about.php">About</a>
<a href="/aiza-collections/pages/contact.php">Contact</a>

<?php if (!is_logged_in()): ?>

<a href="/aiza-collections/pages/login.php">Login</a>
<a href="/aiza-collections/pages/register.php">Register</a>

<?php else: ?>

<span class="nav-user">
Hello, <?= htmlspecialchars($_SESSION['user']['name']) ?>
</span>

<a href="/aiza-collections/pages/cart.php">Cart</a>
<a href="/aiza-collections/pages/wishlist.php">Wishlist</a>
<a href="/aiza-collections/pages/logout.php">Logout</a>

<?php if (is_admin()): ?>
<a href="/aiza-collections/pages/admin/products.php" class="admin-link">Admin</a>
<?php endif; ?>

<?php endif; ?>

</nav>
</header>