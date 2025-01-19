<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="main">
    <h2 style="text-align: center;">Create Product</h2>    

    <!-- Form for creating a product -->
    <div class="rowform">
        <form action="<?= base_url('admin/product/create') ?>" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name:</label>
            <input type="text" id="productName" name="productName" class="form-control" value="<?= old('productName') ?>" required>
            <?php if (isset($validation) && $validation->getError('productName')): ?>
                <div class="text-danger"><?= $validation->getError('productName') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="productQty" class="form-label">Product Quantity:</label>
            <input type="number" id="productQty" name="productQty" class="form-control" value="<?= old('productQty') ?>" required>
            <?php if (isset($validation) && $validation->getError('productQty')): ?>
                <div class="text-danger"><?= $validation->getError('productQty') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" class="form-control" value="<?= old('productPrice') ?>" required>
            <?php if (isset($validation) && $validation->getError('productPrice')): ?>
                <div class="text-danger"><?= $validation->getError('productPrice') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="categoryID" class="form-label">Product Category:</label>
            <select id="categoryID" name="categoryID" class="form-control" required>
                <option value="">Select Category</option>
                <option value="1" <?= old('categoryID') == 1 ? 'selected' : '' ?>>Books</option>
                <option value="2" <?= old('categoryID') == 2 ? 'selected' : '' ?>>Coffee</option>
                <option value="3" <?= old('categoryID') == 3 ? 'selected' : '' ?>>Food</option>
            </select>
            <?php if (isset($validation) && $validation->getError('categoryID')): ?>
                <div class="text-danger"><?= $validation->getError('categoryID') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="productImg" class="form-label">Product Image:</label>
            <input type="file" id="productImg" name="productImg" class="form-control" value="<?= old('productImg') ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

    </div>
</div>

<?= $this->endSection() ?>

