<!--<nav class="topnav" id="myTopnav">
    <a href="index.php">Home</a>
    <a href="portfolio.php">Portfolio</a>
    <a href="blog.php">Blog</a>
    <a href="review.php">Review</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i></a>
</nav>
-->
<nav class="topnav" id="myTopnav">
    <a href="<?= base_url(); ?>" class="<?= (current_url() == base_url() ? 'active' : '') ?>">Home</a>
    <a href="<?= base_url('portfolio'); ?>" class="<?= (current_url() == base_url('portfolio') ? 'active' : '') ?>">Portfolio</a>
    <a href="<?= base_url('blog'); ?>" class="<?= (current_url() == base_url('blog') ? 'active' : '') ?>">Blog</a>
    <a href="<?= base_url('review'); ?>" class="<?= (current_url() == base_url('review') ? 'active' : '') ?>">Review</a>
    <?php if (session()->get('isLoggedIn')): ?>
        <!-- Show Logout if logged in -->
        <a href="<?= base_url('logout'); ?>" class="<?= (current_url() == base_url('logout') ? 'active' : '') ?>">
            <i class="fa fa-sign-out" style="font-size: 12px;"></i> Logout
        </a>
    <?php else: ?>
        <!-- Show Login if not logged in -->
        <a href="<?= base_url('login'); ?>" class="<?= (current_url() == base_url('login') ? 'active' : '') ?>">
            <i class="fa fa-sign-in" style="font-size: 12px;"></i> Login
        </a>
    <?php endif; ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</nav>
