<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

    <div class="topNav">
        <img src="<?= base_url('img/icon.png'); ?>" alt="Logo">
        <?php if (session()->get('isLoggedIn')): ?>
        <!-- Logout link if admin is logged in -->
        <a href="<?= base_url('logout'); ?>">
            <i class="fa fa-sign-out" style="font-size: 12px;"></i> Logout
        </a>
        <?php else: ?>
            <!-- Login link if admin is not logged in -->
            <a href="<?= base_url('login'); ?>">
                <i class="fa fa-sign-in" style="font-size: 12px;"></i> Login
            </a>
        <?php endif; ?>
    </div>

    <!-- Include Side Navigation -->
    <?= view('admin/includes/sideNav'); ?>

    <div class="main">
        <h2>Admin Panel Dashboard</h2>
        Welcome, Admin&nbsp;
        <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
    </div>

<?= $this->endSection() ?>
