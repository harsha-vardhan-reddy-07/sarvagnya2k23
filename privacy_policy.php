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

        <h2 class="text-dark text-center title">PRIVACY POLICY</h2>
        <br>
        <p>Welcome and thank you for visiting the Sarvagnya . This page will informs you of our policies regarding the
            collection,use of your data when you use our service.
        </p>
        <p>By Accessing and using our servies you access without limitation of qualification, this privacy policy so
            please take the time to read the policies and understand how we use your data . If you Don't accept these
            privacy policies you may not use our services.</p>
        <p>We maintain the right to change the privacy policies at any time. It is important that you check this privacy
            policies peroidcally for updates. The time of the last update will be listed at the bottom of this privacy
            policy page.</p>
        <p>We use your data to provide anf improve our service. Terms used in this privacy policy have the terms and
            conditions accessable from https://sarvagnya2k23.in</p>

        <h3 class="text-dark  title">Information collection</h3>
        <p>We Collect serveal different types of information for various purposes to provide and improve our services to
            you.</p>
        <h3 class="text-dark  title">Types of Data Collected</h3>
        <p>Your Email, Name , Profile image, Gender are collected from your google account after successful login to the
            sarvganya.</p>
        <p>The Personal information we collect when using our services or registering for the Sarvgnya , You may be
            asked to provide certain personally identifiable information about yourself , personally identifiable
            information may include</p>

        <ul>
            <li>College Name</li>
            <li>Branch</li>
            <li>Year</li>
            <li>Mobile</li>
            <li>Github Link</li>
            <li>Linkedin Link</li>
        </ul>

        <h3 class="text-dark  title">How We Use Your Personal Information</h3>
        <p>The information we receive will be used in such a way that is consistent with our privacy policy.Information
            collected is used for specific purposes, usually in tandem with the reasoning for the information to be
            collected. For Example: Infomation collected during registration for Sarvagnya is used to identify you and
            allow to use our services.If you join in Sarvagnya sending you the confirmation mail or to send you email
            notification regarding upcoming challenges (includes upcoming challenges links , time , duration ..etc ). If
            you want us to stop the personal informaiton you provided in these ways please send any email to
            sarvganya2k22cse@gmail.com</p>


        <h3 class="text-dark  title">Usage Data</h3>
        <p>We may also collect the information of transactions done during the challenge registration to track your
            transactions and provide a better service.</p>
        <p>Use Of Data</p>
        <ul>
            <li>To provide and maintain the services</li>
            <li>To notify you about the upcoming workshops and services</li>
            <li>To provide customer care and support</li>
            <li>To the usage of the service</li>
            <li>To detect, prevent and address the techincal issues</li>
        </ul>

        <h3 class="text-dark  title">Disclosure Of Data</h3>
        <p>Legal Requirements</p>
        <ul>
            <li>To comply with a legal obligation</li>
            <li>To protect and defend the rights or property of Sarvagnya</li>
            <li>To protect the personal safety of users of the Service or the public</li>
            <li>To protect against legal liability</li>
            <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
        </ul>

        <p>Security Of Data</p>
        <p>The Security of your data is important to us. But remember that no method of transmission over the interent
            or method od electronic storage is 100% Secure. While we strive to use commerically acceptable means to
            protect your personal data . we can't guarantee the absoulte security.</p>

        <h3 class="text-dark  title">Changes To This Privacy Policy</h3>
        <p>Because our business needs may change over time, we reverse the right, at our discretion, to change ,
            modifiy, add or remove portions from this privacy policies at any time. Such changes , modifications,
            additons or deletions will be effective and immedialty upon notice , which may be given by means including ,
            but not limited to , posting on the website , or by electronic or convenational mail, or by any other means
            by which you option notice thereof. Any use of the services by you after notice will be deemed to constitute
            your acceptance of such changes , modification , additions or deletions.If any modifications , additions or
            change to these terms and conditions are not acceptable to you , your only recourse is to refrain from using
            and accessing the services.</p>
        <h3 class="text-dark  title">Contact Us</h3>
        <p>If You have any questions about the privacy policy,please Contact Us:</p>
        <p>By Email: sarvganya2k23cse@gmail.com</p>
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