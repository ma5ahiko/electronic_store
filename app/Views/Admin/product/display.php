<!-- app/Views/admin/product/display.php -->

<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="main">
    <h2>Entered Product Information</h2>

    <!-- Display entered values -->
    <p><strong>Product Name:</strong> <?= esc($product['productName']) ?></p>
    <p><strong>Product Quantity:</strong> <?= esc($product['productQty']) ?></p>
    <p><strong>Product Price:</strong> <?= esc($product['productPrice']) ?></p>
    <p><strong>Product Category:</strong> <?= esc($product['categoryID']) ?></p>
    <p><strong>Product Image:</strong> <?= esc($product['productImg']) ?></p>

    <a href="<?= base_url('admin/product/create') ?>">Go back and edit</a>
</div>

<?= $this->endSection() ?>
