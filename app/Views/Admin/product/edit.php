<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="main">
    <h2 style="text-align: center;">Edit Product</h2>

    <?php if (isset($validation)) : ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <div class="rowform">
        <form class="form-horizontal" action="<?= base_url('admin/product/update/' . $product['productID']) ?>" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name:</label>
            <input type="text" id="productName" name="productName" class="form-control" value="<?= $product['productName'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="productQty" class="form-label">Product Quantity:</label>
            <input type="number" id="productQty" name="productQty" class="form-control" value="<?= $product['productQty'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" min="0.01" step="0.01" class="form-control" value="<?= $product['productPrice'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="categoryID" class="form-label">Product Category:</label>
            <select id="categoryID" name="categoryID" class="form-control" required>
                <option value="">Select Category</option>
                <option value="1" <?= $product['categoryID'] == 1 ? 'selected' : '' ?>>Books</option>
                <option value="2" <?= $product['categoryID'] == 2 ? 'selected' : '' ?>>Coffee</option>
                <option value="3" <?= $product['categoryID'] == 3 ? 'selected' : '' ?>>Food</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="productImg" class="form-label">Product Image:</label>
            <?php if ($product['productImg']) : ?>
                <img src="<?= base_url('uploads/' . $product['productImg']) ?>" alt="Current Image" width="100"><br>
            <?php endif; ?>
            <input type="file" id="productImg" name="productImg" class="form-control" accept="image/*">
        </div>        
        
        <button type="submit" class="btn btn-primary w-100">Update Product</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>