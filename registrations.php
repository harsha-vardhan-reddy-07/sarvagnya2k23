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
    body{
        background: rgb(70,5,48);
        background: linear-gradient(-45deg, rgba(70,5,48,1) 0%, rgba(0,0,0,1) 38%, rgba(17,32,72,1) 99%);
        
    }
    .registrations-body{
        min-height: 60vh;
    }
    .registration-title{
        font-family: "Ubuntu", sans-serif !important; 
        color: rgb(211, 205, 209);
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
    .registrations-card{
        background: rgba(255, 255, 255, 0.119);
        backdrop-filter: blur(10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 1;
        transform: 0.5s;
        color: #fff;
        
    }
    .registrations-card .card-body{
        color: #e6e3e3ca;
    }
    
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


    <br><br><br><br>


    <div class="container registrations-body">
        <div class="">
            <h2 class="title registration-title">Registrations</h2>
            <hr style="border-color: rgb(80, 81, 81);">
        </div>
        
        <?php
        if($auth){
        
        ?>
        <div class="row ">
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


                <div class="card registrations-card my-2">
                    <div class="card-body title">
                        <?php
                            $event_id = $row['event_id']; 
                            $query1 = "SELECT * FROM events where id='$event_id'";
                            $query_run1 = mysqli_query($connection,$query1);
                            $row1 = mysqli_fetch_assoc($query_run1)
                         ?>
                        <h4><?php echo $row1['title'] ?></h4>
                        <p><b><span class="text-success">Payment Id : </span></b> <?php echo $row['payment_id']; ?></p>
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

    <!-- navbar visibility -->
<script>
    const navbar = document.querySelector('#navbar');
    navbar.classList.add('visible');
</script>

</body>

</html>