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
    <title>Sarvagnya - 2022 -  Registrations</title>

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
        <div class="">
            <h2 class=" title">Registrations</h2>
            <hr>
        </div>
        
        <?php
        if($auth){
        
        ?>
        <div class="row">
            <?php
            $user_id = $_SESSION['id'];
            $query = "SELECT * FROM transactions where user_id='$user_id'";
            $query_run = mysqli_query($connection,$query);

            ?>
            <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>


            <div class="col-md-4">


                <div class="card my-2">
                    <div class="card-body title">
                        <?php
                            $event_id = $row['event_id']; 
                            $query1 = "SELECT * FROM events where id='$event_id'";
                            $query_run1 = mysqli_query($connection,$query1);
                            $row1 = mysqli_fetch_assoc($query_run1)
                         ?>
                        <h4><?php echo $row1['title'] ?></h4>
                        <p><b><span class="text-dark">Payment Id : </span></b> <?php echo $row['payment_id']; ?></p>
                        <p><b><span class="text-success">Amount Paid : </span> </b><?php echo $row['amount']; ?> /-</p>
                        <p><b>Txn time : </b><?php echo $row['txn_time']; ?></p>
                    </div>
                </div>
            </div>


            <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No Registrations Found</h5>";
                }
                ?>
            <hr>

        </div>
        <?php
        }
        else{
            echo "<h5 class='alert alert-danger'>Login to Register</h5>";
        }
        ?>
    </div>






    <br>
    <br>



    <br>
    <br>




    <br>
    <br>




    <br>
    <br>










    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>