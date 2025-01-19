<?= $this->extend('admin/layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="main">
    <h2 style="text-align: center; color: #0047ab;">Manage Products</h2> 
    
    <?php if (isset($success)): ?>
        <div class="alert alert-success" style="width: 95%; margin: 0 auto; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px;">
            <?= esc($success) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="alert alert-warning" style="width: 95%; margin: 0 auto; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; padding: 10px; border-radius: 5px;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" style="width: 95%; margin: 0 auto; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-warning" style="width: 95%; margin: 0 auto; background-color: #fff3cd; color: #856404; 
