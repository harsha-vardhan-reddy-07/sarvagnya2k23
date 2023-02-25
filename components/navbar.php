

<style>
        #navbar {
            position: fixed;
            top: -400px;
            transition: top 0.3s;
            width: 100%;
            z-index: 999;
            background-color: #0B021B;
            min-height: 10vh;
        }
        .active{
            border: none !important;
        }

        #navbar.visible {
            top: 0;
        }

        #navbar .navbar-brand{
            font-family: researcher;
            font-size: 1.3rem;   
        }
        .nav-links ul{
            display: flex;
            /* float: right; */
            flex-wrap: nowrap;
            font-size: 1.2rem;
        }
        @media screen and (max-width: 987px){
            .ml-auto {
                margin-left: 0 !important;
                position: relative;
                left: 0;
            }
        }

</style>


    
    <!-- Navbar -->

    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">SARVAGNYA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-links" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])=="index.php")?"active":""; ?>">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])=="events.php")?"active":""; ?>">
                <a class="nav-link" href="events.php">Events</a>
            </li>









            <?php
    if ($auth) {
        ?>

            <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])=="registrations.php")?"active":""; ?>">
                <a class="nav-link" href="registrations.php">Registrations</a>
            </li>
        
        <?php
        } else {
        ?>
    
        <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])=="contact_us.php")?"active":""; ?>">
                <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>


    <?php
    }
    ?>


    <?php
    if (!$auth) {
        // echo '<div class="p-2 login-btn bd-highlight"><a href="login-page" class="btn btn-outline-secondary addcart-btn text-center  btn-block ">SignIn</a></div>';
        echo '<li class="nav-item"><a class="nav-link" href="login-page" style="border: 1px solid #484648b8; width:max-content; border-radius: 0.4rem; padding: 5px 15px 5px 15px !important;;" >Login</a></li>';
    } else {
        // echo '<div class="p-2  login-btn bd-highlight"><a href="profile" class="btn btn-outline-secondary addcart-btn text-center  btn-block">' . $_SESSION['name'] . '</a></div>';
        echo '<li class="nav-item"><a class="nav-link" href="profile" style="border: 1px solid #484648b8; width:max-content; border-radius: 0.4rem; padding: 5px 15px 5px 15px !important;;" >' . $_SESSION['name'] . '</a></li>';
     }
    ?>


        </div>
    </nav>