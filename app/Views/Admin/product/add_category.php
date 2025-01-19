<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="w3-container w3-padding-32">
    <h2 class="w3-center">Category Form</h2>

    <!-- Display flash messages for success or error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-round">
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="w3-panel w3-red w3-round">
            <p><?= session()->getFlashdata('error') ?></p>
        </div>
    <?php endif; ?>

    <form class="w3-container w3-card-4 w3-light-grey w3-padding-16" method="post" action="<?= base_url('admin/category/store') ?>">
        <?= csrf_field() ?>
        <!-- Category Name -->
        <div class="w3-margin-bottom">
            <label class="w3-text-black" for="categoryName">Category Name</label>
            <input class="w3-input w3-border w3-round" type="text" name="categoryName" id="categoryName" 
                value="<?= isset($category['categoryName']) ? esc($category['categoryName']) : '' ?>" required>
        </div>

        <!-- Category Description -->
        <div class="w3-margin-bottom">
            <label class="w3-text-black" for="categoryDesc">Category Description</label>
            <textarea class="w3-input w3-border w3-round" name="categoryDesc" id="categoryDesc" rows="5" required><?= isset($category['categoryDesc']) ? esc($category['categoryDesc']) : '' ?></textarea>
        </div>

        <!-- Submit Button -->
        <div class="w3-margin-top">
            <button class="w3-button w3-blue w3-round w3-block" type="submit">
                <?= isset($category) ? 'Update Category' : 'Create Category' ?>
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
