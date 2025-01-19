<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Store - Products</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <h1>Welcome to Our Electronics Store</h1>
        <p>Find the best electronics here!</p>
    </header>

    <nav class="navbar">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('products') ?>">Products</a>
        <a href="<?= base_url('cart') ?>">Cart</a>
        <a href="<?= base_url('login') ?>">Login</a>
    </nav>

    <h1>Our Products</h1>
    <div class="products-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?= base_url('uploads/' . $product['productImg']) ?>" alt="<?= esc($product['productName']) ?>">
                <h3><?= esc($product['productName']) ?></h3>
                <p>Price: $<?= esc($product['productPrice']) ?></p>
                <a class="button" href="#">Add to Cart</a>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2025 Electronics Store</p>
    </footer>
</body>
</html>
