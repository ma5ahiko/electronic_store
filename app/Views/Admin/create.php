<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2>Add Category</h2>

<?php if (!empty(session()->getFlashdata('errors'))): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?= base_url('admin/category/store') ?>">
    <label for="categoryName">Category Name:</label><br>
    <input type="text" name="categoryName" id="categoryName" value="<?= old('categoryName') ?>"><br><br>

    <label for="categoryDesc">Description:</label><br>
    <textarea name="categoryDesc" id="categoryDesc"><?= old('categoryDesc') ?></textarea><br><br>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection() ?>
