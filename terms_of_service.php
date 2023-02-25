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
    <title>Sarvagnya - 2023</title>

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

        <h2 class="text-dark text-center title">TERMS AND CONDITIONS</h2>
        <br>
        <p>These Terms and Conditions out line the rules and regulations for the use of Sarvagnya Website , Located at
            <a href="https://sarvagnya2k23.in">https://sarvagnya2k23.in</a>
        </p>
        <p>By accessing this website we assume you accept these terms and conditions. Don't continue to use Sarvagnya if
            don't agree to take all of the terms and condition stated on this page.</p>
        <p>Our goal at Sarvagnya is to conduct Workshops , Challenges and Competitions on Different Technologies.These
            are our terms and conditions of service (T&C's). Users Who don't compile with the t&n's Will face
            consequences as hereinafter described.</p>


        <h3 class="text-dark  title">Transactions</h3>
        <p>Every Time you have registered for the Workshop ,challenges or competitions the entry fee will have to be pay
      
        <h3 class="text-dark  title">License</h3>
        <p>Unless otherwise stated, Sarvagnya and /or its licensors own intellectual property rights for all materials
            on Sarvagnya.All intellectual property rights are reserved.You may access these from Sarvagnya for your own
            personal use subjected to restrictions set in these terms and conditions</p>
        <p>You must not:</p>
        <ul>
            <li>Republish the materails from Sarvagnya</li>
            <li>sell, rent or sub-license material from Sarvagnya</li>
            <li>Reproduce, duplicate or copy material from Sarvagnya</li>
            <li>Redistribute contents from Sarvagnya</li>
        </ul>
        <p>This Agreement shall begin on the data hereof.</p>
        <p>Sarvagnya reserves the rights to monitor all partcipants and to remove any participants which can be
            considered inappropriate, affensive or causes brech of these terms and conditions.</p>
        <p>You here by grant Sarvagnya a non-exclusive license to use, reproduce , edit and authorize others to use any
            of your registrations in any and all forms.</p>
        <h3 class="text-dark  title">Modifications</h3>
        <p>We reserve the right to make changes to these Terms at any time by updating this page with any such changes
            and indicating the effective date of those changes. You acknowledge and agree that it is your responsibility
            to review these Terms periodically to familiarize yourself with any modifications. By continuing to access
            and use our web site after those changes become effective, you consent and agree to be bound by the revised
            Terms</p>
        <h3 class="text-dark  title">Contact Us</h3>
        <p>If you have any questions or comments regarding these Terms or our Privacy Policy, you can contact us at:
            sarvganya2k23cse@gmail.com</p>
    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>


    <!-- navbar visibility -->

<script>
    const navbar = document.querySelector('#navbar');
    navbar.classList.add('visible');
</script>


</body>

</html>