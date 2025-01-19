<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Store - Portfolio</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <h1>Electronics Store - Portfolio</h1>
        <p>Explore our products by category!</p>
    </header>

    <nav class="navbar">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('products') ?>">Products</a>
        <a href="<?= base_url('cart') ?>">Cart</a>
        <a href="<?= base_url('login') ?>">Login</a>
    </nav>

    <div class="main-container">
        <h2>Product Categories</h2>
        <div class="category-menu">
            <a href="<?= base_url('portfolio?cat=0') ?>" <?= isset($categoryID) && $categoryID == 0 ? 'class="active"' : '' ?>>All</a>
            <a href="<?= base_url('portfolio?cat=1') ?>" <?= isset($categoryID) && $categoryID == 1 ? 'class="active"' : '' ?>>Laptops</a>
            <a href="<?= base_url('portfolio?cat=2') ?>" <?= isset($categoryID) && $categoryID == 2 ? 'class="active"' : '' ?>>Phones</a>
            <a href="<?= base_url('portfolio?cat=3') ?>" <?= isset($categoryID) && $categoryID == 3 ? 'class="active"' : '' ?>>Accessories</a>
        </div>

        <div class="products-grid">
            <?php if ($rowcount > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?= base_url('uploads/' . $product['productImg']) ?>" alt="<?= esc($product['productName']) ?>">
                        <h3><?= esc($product['productName']) ?></h3>
                        <p>Price: $<?= esc($product['productPrice']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found in this category.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Electronics Store. All rights reserved.</p>
    </footer>
</body>
</html>
