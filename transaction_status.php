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



        <?php
 if(isset($_GET['status']))
 {
    $status = $_GET['status'];
 
if($status == 'success')
{
    echo'<div class="alert alert-primary text-center font-weight-bold" role="alert" >Transaction successful Event Added to Registration</div>';
   ?>
        <div class="text-center">
            <img src="<?php echo $base_url ?>/assets/images/loading.gif" class="img-fluid" alt="">
            <p class="font-weight-bold text-secondary"> Redirecting to Registration Page</p>
        </div>
        <script>
        setTimeout(function() {
            window.location.href = 'https://localhost/sarva/registrations.php';
        }, 3000);
        </script>
        <?php
}
else if($status == 'fail')
{
    echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">Transaction Failed please try again</div>';

?>
        <div class="text-center">
            <img src="<?php echo $base_url ?>/assets/images/loading.gif" class="img-fluid" alt="">
            <p class="font-weight-bold text-secondary"> Redirecting Back to Event Page</p>
        </div>
        <script>
        setTimeout(function() {
            window.location.href = 'https://sarvagnya2k22.in/events.php';
        }, 3000);
        </script>
        <?php
}
 }
 else{
    echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">403 Error You are Redirecting to Home Page</div>';
    ?>
        <script>
        setTimeout(function() {
            window.location.href = 'https://sarvagnya2k22.in/index.php';
        }, 1000);
        </script>
        <?php
 }
?>


    </div>






    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>