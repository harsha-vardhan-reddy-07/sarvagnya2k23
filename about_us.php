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
    <title>Sarvagnya - 2023 - About Us</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
    .title {
        font-family: "Ubuntu", sans-serif !important;
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


    <br><br><br><br>



    <div class="container">

        <h2 class="text-dark text-center title">ABOUT US</h2>
        <br>
        <p>Sarvagnya Techfest is a Three Day National Level Technical Symposium organized by the Department of Computer
            Science and Engineering in JNTUA college of Engineering Pulivendula everyyear. This fest contains Workshops,
            Paper Presentations, poster presentations,
            Project Presentations, Hackathons, various events and new events are being added every year.
        </p>
        <p>Students From Any college can participate in all events by paying entry fee for respective Events.</p>
        <p>Services Provided in Sarvagnya 2k23 are :</p>
        <ul>
            <li>Data Science Workshop</li>
            <li>Mern Full Stack Workshop</li>
            <li>Ethical Hacking Workshop</li>
            <li>Paper Presentation</li>
            <li>Poster Presentation</li>
            <li>Technical Quiz and many more...</li>
        </ul>


        <p>Students Can Register for above events by paying entry fee through online using razorpay payment gateway.</p>

    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>
    

    <!-- navbar visibility -->

<script>
    const navbar = document.querySelector('#navbar-sarvagnya');
    navbar.classList.add('visible');
</script>


</body>

</html>