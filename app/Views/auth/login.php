<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/newstyle.css'); ?>">
    
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <h2>Login</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="useremail">Email</label>
                    <input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
            <p style="text-align:center;"><a href="<?=base_url()?>">Back to Homepage</a></p>            
        </div>
    </div>
</body>
</html>
