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
    <title>Sarvagnya - 2022</title>

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

        <h2 class="text-dark text-center title">REFUND POLICY</h2>
        <br>
        <p>These Terms and Conditions out line the rules and regulations for the use of Sarvagnya Website , Located at
            <a href="https://sarvagnya2k22.in">https://sarvagnya2k22.in</a>
        </p>
        <p>By accessing this website we assume you accept these terms and conditions. Don't continue to use Sarvagnya if
            don't agree to take all of the terms and condition stated on this page.</p>
        <p>Our goal at Sarvagnya is to conduct Workshops , Challenges and Competitions on Different Technologies.These
            are our terms and conditions of service (T&C's). Users Who don't compile with the t&n's Will face
            consequences as hereinafter described.</p>


        <h3 class="text-dark  title">Refund And Return Policy</h3>
        <p>We must have to do transaction inorder to partcipate in our services.Once Payment is successful you will have
            the opportunity to partcipate in respective service . It is important to recognize that once you commit and
            registered for Challenge or Competition whatever the amount you paid become non-refundable</p>
        <p>In the event if you have any transaction issues you may contact us at sarvagnya2k22cse@gmail.com. We will
            respond and request that you provide certain details inorder to confirm your request once confirmed we will
            return your funds based on your requests within 48 hours less than adimistrative fee. To cover our costs as
            well as any fees we incur in connection with your refund</p>

        <h3 class="text-dark  title">Contact Us</h3>
        <p>If you have any questions or comments regarding these Terms or our Privacy Policy, you can contact us at:
            sarvganya2k22cse@gmail.com</p>
    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>