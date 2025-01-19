<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2>Edit Category</h2>

<?php if (!empty(session()->getFlashdata('errors'))): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?= base_url('admin/category/update/' . $category['categoryID']) ?>">
    <label for="categoryName">Category Name:</label><br>
    <input type="text" name="categoryName" id="categoryName" value="<?= esc($category['categoryName']) ?>"><br><br>

    <label for="categoryDesc">Description:</label><br>
    <textarea name="categoryDesc" id="categoryDesc"><?= esc($category['categoryDesc']) ?></textarea><br><br>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>
