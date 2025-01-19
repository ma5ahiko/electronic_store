<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2>Manage Categories</h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<a href="<?= base_url('admin/category/create') ?>" class="btn btn-primary">Add New Category</a>

<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; margin-top: 20px;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= esc($category['categoryID']) ?></td>
                <td><?= esc($category['categoryName']) ?></td>
                <td><?= esc($category['categoryDesc']) ?></td>
                <td>
                    <a href="<?= base_url('admin/category/edit/' . $category['categoryID']) ?>">Edit</a> |
                    <a href="<?= base_url('admin/category/delete/' . $category['categoryID']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No categories found.</td>
        </tr>
    <?php endif; ?>
</table>

<?= $this->endSection() ?>
