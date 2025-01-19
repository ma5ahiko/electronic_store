<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Store - Index</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <h1>Electronics Store</h1>
        <p>Welcome to the best electronics shop online!</p>
    </header>

    <nav class="navbar">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('products') ?>">Products</a>
        <a href="<?= base_url('cart') ?>">Cart</a>
        <a href="<?= base_url('login') ?>">Login</a>
    </nav>

    <div class="main-container">
        <h2>About Us</h2>
        <p>Your ultimate destination for top-notch electronics!</p>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Electronics Store. All rights reserved.</p>
    </footer>
</body>
</html>
