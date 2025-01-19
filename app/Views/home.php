<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Store - Home</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header class="header">
        <h1>Welcome to Our Electronics Store</h1>
        <p>Find the best electronics here!</p>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">Home</a></li>
                <li><a href="<?= base_url('products') ?>">Products</a></li>
                <li><a href="<?= base_url('cart') ?>">Cart</a></li>
                <li><a href="<?= base_url('login') ?>">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section class="best-sellers">
            <h2>Best Sellers</h2>
            <div class="product-grid">
                <!-- Example of one product card -->
                <?php foreach ($bestSellers as $product): ?>
                    <div class="product-card">
                        <img src="<?= base_url('uploads/' . $product['productImg']) ?>" alt="<?= esc($product['productName']) ?>">
                        <h3><?= esc($product['productName']) ?></h3>
                        <p>Price: $<?= esc($product['productPrice']) ?></p>
                        <a href="<?= base_url('products') ?>" class="button">Buy Now</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="news">
            <h2>What's New in Gaming?</h2>
            <article>
                <h3>PlayStation Portable Returns</h3>
                <p>Sony announced its latest handheld gaming device, the PlayStation Portal, for portable gaming enthusiasts.</p>
                <a href="#" class="button">Pre-Order Now</a>
            </article>
            <article>
                <h3>Nintendo Switch 2 Incoming</h3>
                <p>Nintendo is rumored to release its next-gen Switch console in 2025, with upgraded hardware for 4K gaming.</p>
                <a href="#" class="button">Learn More</a>
            </article>
            <article>
                <h3>Lenovo Legion Go</h3>
                <p>Lenovo's Legion Go, a new portable PC gaming console, is ready to challenge the Steam Deck.</p>
                <a href="#" class="button">Buy Now</a>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Electronics Store. All rights reserved.</p>
    </footer>
</body>
</html>
