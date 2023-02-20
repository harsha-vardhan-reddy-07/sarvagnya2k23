<?php
session_start();

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
				"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
				$_SERVER['REQUEST_URI'];


$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
require_once "components/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sarvagnya - Gallery 2013</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <style>
    .container.gallery-container {
        background-color: #fff;
        color: #35373a;
        min-height: 100vh;
        padding: 30px 50px;
    }

    .gallery-container h1 {
        text-align: center;
        margin-top: 50px;
        font-family: 'Droid Sans', sans-serif;
        font-weight: bold;
    }

    .gallery-container p.page-description {
        text-align: center;
        margin: 25px auto;
        font-size: 18px;
        color: #999;
    }

    .tz-gallery {
        padding: 40px;
    }

    /* Override bootstrap column paddings */
    .tz-gallery .row>div {
        padding: 2px;
    }

    .tz-gallery .lightbox img {
        width: 100%;
        border-radius: 0;
        position: relative;
    }

    .tz-gallery .lightbox:before {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -13px;
        margin-left: -13px;
        opacity: 0;
        color: #fff;
        font-size: 26px;
        font-family: 'Glyphicons Halflings';
        content: '\e003';
        pointer-events: none;
        z-index: 9000;
        transition: 0.4s;
    }


    .tz-gallery .lightbox:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: rgba(46, 132, 206, 0.7);
        content: '';
        transition: 0.4s;
    }

    .tz-gallery .lightbox:hover:after,
    .tz-gallery .lightbox:hover:before {
        opacity: 1;
    }

    .baguetteBox-button {
        background-color: transparent !important;
    }
    </style>

<body>


    <?php require_once 'components/navbar.php'; ?>


    <br><br>



    <div class="container gallery-container">

        <h1>Sarvagnya 2013 Gallery</h1>

        <div class="tz-gallery">

            <div class="row">

                <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_1.jpg">
                        <img src="assets\images\fest_images\3_1.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_7.jpg">
                        <img src="assets\images\fest_images\3_7.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_3.jpg">
                        <img src="assets\images\fest_images\3_3.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-12 col-md-8">
                    <a class="lightbox" href="assets\images\fest_images\3_4.jpg">
                        <img src="assets\images\fest_images\3_4.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_2.jpg">
                        <img src="assets\images\fest_images\3_2.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_6.jpg">
                        <img src="assets\images\fest_images\3_6.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_5.jpg">
                        <img src="assets\images\fest_images\3_5.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_8.jpg">
                        <img src="assets\images\fest_images\3_8.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_9.jpg">
                        <img src="assets\images\fest_images\3_9.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="assets\images\fest_images\3_10.jpg">
                        <img src="assets\images\fest_images\3_10.jpg" alt="Bridge">
                    </a>
                </div>
            </div>

        </div>

    </div>





    <br>
    <br>

    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
baguetteBox.run('.tz-gallery');
</script>