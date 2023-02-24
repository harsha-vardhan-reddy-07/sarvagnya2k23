<nav class="navbar navbar-toggleable-sm bg-inverse navbar-inverse fixed-top shadow-sm  bg-white"
    style="background: linear-gradient(0deg, #0B021B, #0B021B) !important; color: #fff;">
    <div class="p-2 bd-highlight logo-box"><a href="<?php echo $base_url; ?>/index.php"
            style="text-decoration:none;"><img src="assets/images/logo2.png" width="40" height="40" alt="logo"><img
                src="assets/images/logo3.gif" width="250" height="50" alt="logo"></a></div>
    <div class="bd-highlight col-md-6 search-box text-center" style="color: #fff;">
        <a class="nav_link <?= (basename($_SERVER['PHP_SELF'])=="index.php")?"active":""; ?> mx-2" href="index.php">
            Home</a>
        <a class="nav_link <?= (basename($_SERVER['PHP_SELF'])=="events.php")?"active":""; ?> mx-2" href="events.php">
            Events</a>

        <?php
    if ($auth) {
        ?>
        <a class="nav_link <?= (basename($_SERVER['PHP_SELF'])=="registrations.php")?"active":""; ?> mx-2"
            href="registrations.php">
            Registrations</a>
        <?php
        } else {
        ?>
    <a class="nav_link <?= (basename($_SERVER['PHP_SELF'])=="contact_us.php")?"active":""; ?> mx-2"
        href="contact_us.php">
        Contact Us</a>
    </div>
    <?php
    }
    ?>

    </div>
    <?php
    if (!$auth) {
        echo '<div class="p-2 login-btn bd-highlight"><a href="login-page" class="btn btn-outline-secondary addcart-btn text-center  btn-block ">SignIn</a></div>';
    } else {
        echo '<div class="p-2  login-btn bd-highlight"><a href="profile" class="btn btn-outline-secondary addcart-btn text-center  btn-block">' . $_SESSION['name'] . '</a></div>';
    }
    ?>
</nav>