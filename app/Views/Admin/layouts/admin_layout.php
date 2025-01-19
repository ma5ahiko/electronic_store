<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Corrected link to public CSS -->
    <link rel="stylesheet" href="<?= base_url('css/admin.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/w3.css'); ?>">
</head>

<body>
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

    <div class="content">
        <!-- This section will be replaced with specific content from individual views -->
        <?= $this->renderSection('content') ?>
    </div>

    <script>
        // JS for dropdown content
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
