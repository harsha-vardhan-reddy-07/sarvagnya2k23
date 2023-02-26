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
    <title>Technical Events Sarvagnya2k23</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>

    body{
        margin: 0;
        padding: 0;
        
        /* background-image: url('./assets/images/events_bg.png');
        height: 100vh;
        background-position: center;
        background-size: cover;
        overflow-x: hidden;
        background-repeat: no-repeat;
        
        background-attachment: fixed;
        @media screen and (max-width: 800px){
            background-position: 80%;
        }
         */
    }
    /* Scroll bar */

    ::-webkit-scrollbar-thumb {
            background-color: #d97e7e;
            border-radius: 10px;
            border: 5px;
        }
        ::-webkit-scrollbar-track {
            background-color: transparent;
        }
        ::-webkit-scrollbar {
            width: 10px;
            background-color: #e8e8e800;
            display: none;
        }
    
    .techEve_bg_video{
        object-fit: cover;
        position: absolute;
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 1;
        filter:brightness(40%);
    }

    
    .container_techEve{
        background-color: transparent;
        z-index: 2;
        position: relative;
    }

    .btn-register-all{
        background-color: transparent;
        border: #61ee84 1px solid;
        color: #61ee84;
        border-radius: 0.5rem;
        align-items: center;
        opacity: 0.7;
        padding: 1% 2% 1% 2%;
        margin: 2%;
    }
    .btn-register-all:hover{
        background-color: rgb(141, 235, 165, 0.5);
        border: #95d8a6 1px solid;
        color: #ffffff;
    }
    .btn-register-accomodation{
        background-color: transparent;
        border: #62c4ed 1px solid;
        color: #62c4ed;
        border-radius: 0.5rem;
        align-items: center;
        opacity: 0.7;
        padding: 1% 2% 1% 2%;
        margin: 0 2% 0 2%;
    }
    .btn-register-accomodation:hover{
        background-color: rgba(149, 213, 252, 0.5);
        border: #95c0d6 1px solid;
        color: #ffffff;
    }
    @media only screen and (max-width: 530px) {
        .btn-register-accomodation, .btn-register-all{
            width: 250px;
        }
        .btn-register-all{
            margin-top: 5%;
        }
    }
    


    .title {
        font-family: "Ubuntu", sans-serif !important;
    }
    .title_tech_Eves{
        font-family: blackpast;
        color: #ffffff;
        text-align: center;
        font-size: 3rem;
        z-index: 2;
    }

    .card {
        border: 1px solid rgba(255, 255, 255, .25);
        border-radius: 1rem;
        background: rgba(113, 112, 112, 0.3);
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(10px);
        padding: 10px;
    }
    
    .card-body{
        padding: 0 5% 0 5%;
        font-family: 'Nunito', sans-serif;
        
        
    }
    .card-data{
        /* visibility: hidden; */
        height: 0;
        color: rgba(217, 218, 219, 0.7);
        transition: height 1s ease;
        overflow: hidden;
        /* transition: visibility 1s ease 2s; */
        
        /* transition:height 2s; */
        /* margin: 0 10% 0 10%; */

    }



    .card:hover .card-data{
        /* visibility: visible; */
        height: 350px;
        transition: height 1s ease;
        overflow: hidden;
        /* transition: visibility 1s ease 2s; */

    }

    
    
    .card-img-top{
        opacity: 0.9;
        border-radius: 0.7rem;
    }
    .card-title{
        text-align: center;
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.7);
        font-family: 'Nunito', sans-serif;
        font-weight: 400;
        margin-top: 0.5rem;
    }
    .register-btn-active{
        background-color: transparent;
        border: #59f07e 1px solid;
        color: #59f07e;
        border-radius: 0.5rem;
        /* padding: 3% 10% 3% 10%; */
        /* margin-right: 5%; */
        align-items: center;
        opacity: 0.7;
        
        padding: 3% 20% 3% 20%;
    }
    .cant-register-btn{
        background-color: transparent;
        border: #f44a4a 1px solid;
        color: #f44a4a;
        border-radius: 0.5rem;
        align-items: center;
        opacity: 0.7;
        padding: 3% 20% 3% 20%;
    }
    .register-btn-active-a{
        background-color: transparent;
        border: #59f07e 1px solid;
        color: #59f07e;
        border-radius: 0.5rem;
        /* padding: 3% 10% 3% 10%; */
        /* margin-right: 5%; */
        align-items: center;
        opacity: 0.7;
        width: 100%;
        margin: auto;
        padding: 2% 10% 2% 10%;
    }
    
    .register-btn-active:hover, .register-btn-active-a:hover{
        text-decoration: none;
        background-color: rgba(154, 245, 177, 0.5);
        color: #e8f8eb;
    }

    .view-more-btn{
        background-color: transparent;
        color: #7cabe1ce;
        border: none;
        opacity: 0.7;
        width: 60%;
        margin: 0 20% 0 20%;
        /* display: none; */
    }
    .view-more-btn:hover{
        border-radius: 0.5rem;
        background-color: rgba(181, 196, 212, 0.3);
        color: rgba(255, 255, 255);
    }


    /* .card:hover{
        box-shadow: 0 1px 3px rgba(107, 105, 105, 0.12), 0 1px 2px rgba(123, 121, 121, 0.24);
        background-color: rgba(243, 248, 251, 0.8);
    } */
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>
    

 
    <video autoplay muted loop class="techEve_bg_video">
        <source src="./assets/videos/techEventsBgVid.mp4" type="video/mp4" />
    </video>

    <br><br>


    
    
    <div class="container_techEve container">

        <hr>


        <?php
        if($auth)
            {
                $user_id = $_SESSION['id'];
                $query2 = "SELECT * FROM transactions where user_id = '$user_id' and event_type='all'";
                $query_run2 = mysqli_query($connection,$query2);
                $count3 = mysqli_num_rows($query_run2);
                
  
            }
?>
        <?php
if($auth){
if($count3 == 1){
    ?>
        <!-- Button trigger modal -->
        <!-- <a class="btn btn-outline-success font-weight-bold mt-2 disabled title" data-toggle="modal">
            <img src="assets/images/trending.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Registered
                For
                All
                Events</span>
        </a> -->

        <button disabled class="btn btn-register-all" data-toggle="modal"><img src="assets/images/trending.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Registered
            For
            All
            Events</span>
        </button>

        <?php
}
else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-register-all" data-toggle="modal"
            data-target="#exampleModal">
            <img src="assets/images/trending.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Register
                For
                All
                Events</span>
        </button>
        <?php
}
}else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-register-all" data-toggle="modal"
            data-target="#exampleModal" >
            <img src="assets/images/trending.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Register
                For
                All
                Events</span>
        </button>
        <?php
}
?>

        <?php
            

    
if($auth){
    $user_id = $_SESSION['id'];
    $query3 = "SELECT * FROM transactions where user_id = '$user_id' and event_type='accomodation'";
    $query_run3 = mysqli_query($connection,$query3);
    $count4 = mysqli_num_rows($query_run2);
if($count4 == 1){
    ?>
        <!-- Button trigger modal -->
        <button disabled type="button" class="btn btn-register-accomodation" data-toggle="modal"
        data-target="#exampleModalacc">
        <img src="assets/images/hostel.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Registered
            For
            Accomodation</span>
    </button>

        <?php
}
else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-register-accomodation" data-toggle="modal"
            data-target="#exampleModalacc">
            <img src="assets/images/hostel.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Register
                For
                Accomodation</span>
        </button>

        <?php
}
}else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-register-accomodation" data-toggle="modal"
            data-target="#exampleModalacc">
            <img src="assets/images/hostel.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Register
                For
                Accomodation</span>
        </button>

        <?php
}
?>






       


        <!-- Modal -->
        <div class="modal fade" data-backdrop="false" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="z-index: 999; position: relative;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body title">






                        <?php
            $query = "SELECT * FROM events where type='all'";
            $query_run = mysqli_query($connection,$query);


 

            ?>
                        <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>


                        <h4><?php echo $row['title'] ?></h4>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                        <div class="text-center mx-auto mb-2 d-flex justify-content-between">
                            <a href="<?php echo $row['pdf']; ?>" class="btn btn-info mr-2">View More</a>

                            <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>

                            <form action="razorpay/pay.php" method="POST">


                                <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">

                                <?php
                                            if($count > 0)
                                            {
                                                echo '<a class="btn btn-success pl-2 disabled">Registered</a>';
                                            }
                                            else if($count3 == 1)
                                            {
                                                echo "<a class='btn btn-secondary pl-2 disabled'>Can't Register</a>";
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn btn-success">Register</button>';
                                            }
                                            ?>

                            </form>
                                 
                            <?php
             
                                    }
                                    else{
                                        ?>
                            <a href="login-page" class="btn btn-success">Register</a>

                            <?php
                            
                                    }
                                    ?>

                        </div>
         <hr>  

                        <?php
                }

                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No All Event Results Found</h5>";
                }
                ?>


                    </div>

                </div>

            </div>

        </div>

    </div>


    <br>
    <br>

    <!-- Accomodation Modal -->
    <br>
    <div class="modal fade" data-backdrop="false" id="exampleModalacc" tabindex="1" role="dialog" aria-labelledby="exampleModalaccLabel"
        aria-hidden="true" 
        style="z-index: 999; margin-top: 10%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalaccLabel">Accomodation Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body title">






                    <?php
            $query = "SELECT * FROM events where type='accomodation'";
            $query_run = mysqli_query($connection,$query);


 

            ?>
                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>






                    <h4><?php echo $row['title'] ?></h4>
                    <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                    <div class="text-center mx-auto mb-2 d-flex justify-content-between">
                        <a href="<?php echo $row['pdf']; ?>" class="btn btn-info mr-2">View More</a>

                        <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>

                        <form action="razorpay/pay.php" method="POST">


                            <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                            <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                            <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">

                            <?php
                                            if($count > 0)
                                            {
                                                echo '<a class="btn btn-success pl-2 disabled">Registered</a>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn btn-success">Register</button>';
                                            }
                                            ?>
                        </form>

                        <?php
             
                                    }
                                    else{
                                        ?>
                        <a href="login-page" class="btn btn-success">Register</a>

                        <?php
                                    }
                                    ?>

                    </div>


                    <?php
                }

                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No Accomodation Results Found</h5>";
                }
                ?>


                </div>

            </div>

        </div>

    </div>

    </div>




    <div id="workshops-regi" class="container_techEve container">
        <div class="">
            <h2 class="title_tech_Eves">Workshops</h2>
            <br>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM events where type='workshop'";
            $query_run = mysqli_query($connection,$query);
            if($auth)
            {
                $user_id = $_SESSION['id'];
                $query2 = "SELECT * FROM transactions where user_id = '$user_id' and event_type='workshop'";
                $query_run2 = mysqli_query($connection,$query2);
                $count2 = mysqli_num_rows($query_run2);
                
            }
 
            

            ?>
            <?php

                if(mysqli_num_rows($query_run) > 0)
                {
     
                while($row = mysqli_fetch_assoc($query_run))
                {

            
        
                ?>


            <div class="col-md-4">


                <div class="card my-2">
                    <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" height="250px"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row['title'] ?></h4>
                        <div class="card-data">
                        <p style="text-align: center;"><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                                 
                        
                        <?php 
                        $incharge_id = $row['incharge'];
                          $query5 = "SELECT * FROM incharge where id = '$incharge_id' ";
                          $query_run5 = mysqli_query($connection,$query5);
                          $row5 = mysqli_fetch_assoc($query_run5);
                          
                          $mentor_id = $row['mentor'];
                          $query6 = "SELECT * FROM mentor where id = '$mentor_id' ";
                          $query_run6 = mysqli_query($connection,$query6);
                          $row6 = mysqli_fetch_assoc($query_run6);

                          ?>

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>

                        <a href="<?php echo $row['pdf']; ?>" class="btn btn-info view-more-btn">More Details!!</a>
                        <br>
                        <hr>
                        </div>
                        <div class="text-center  card-btn">


                            
                            <?php
                                    if($auth)
                                    {
                                     
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1);
                                        $row1 = mysqli_fetch_assoc($query_run1);
                                 

                                        
                                        ?>

                            <form action="razorpay/pay.php" method="POST">
                                <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                <?php
                                            if($count > 0)
                                            {
                                              echo '<button disabled class="btn register-btn-active">Registered!!</button>';
                                            }
                                            else if($count2 == 1)
                                            {
                                                echo '<button disabled class="btn cant-register-btn">Cannot Register</button>';
                                            }
                                            else if($count3 == 1)
                                            {
                                                echo '<button disabled class="btn cant-register-btn">Cannot Register</button>';
                                            }
                                            else if($count == 0){
                                                
                                                echo '<button type="submit" class="register-btn-active">Register Now!!</button>';
                                            
                                            }
                                            ?>
                            </form>
                            <?php
                                    }
                                    else{
                                        ?>
                            <a href="login-page" class="register-btn-active-a">Register Now!!</a>
                            <?php
                                    }
                                    ?>


                        </div>

                    </div>
                </div>
            </div>


            <?php

                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
            <hr>

        </div>
    </div>




    <br>






    <div class="container_techEve container">

        <hr>

        <div class="">
            <h2 class="title_tech_Eves">Tech Presentations</h2>
            <br>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM events where type='presentation'";
            $query_run = mysqli_query($connection,$query);

            ?>
            <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>


            <div class="col-md-4 " >


                <div class="card my-2">
                    <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" height="250px"
                        alt="Card image cap">
                    <div class="card-body title">
                        <h4 class="card-title"><?php echo $row['title'] ?></h4>
                        <div class="card-data">
                        <p style="text-align: center;"><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                        
                        <!-- <?php
                        if($row['id'] == '1842311082'){
                            echo "<p class='text-secondary'> <span class='text-danger'>*</span> Max 2 members per team , Team leader have to register</p>";
                            echo "<hr>";
                        }else{
                            echo "";
                        }
                        ?> -->
                        
                        <?php 
                        $incharge_id = $row['incharge'];
                          $query5 = "SELECT * FROM incharge where id = '$incharge_id' ";
                          $query_run5 = mysqli_query($connection,$query5);
                          $row5 = mysqli_fetch_assoc($query_run5);
                          
                          $mentor_id = $row['mentor'];
                          $query6 = "SELECT * FROM mentor where id = '$mentor_id' ";
                          $query_run6 = mysqli_query($connection,$query6);
                          $row6 = mysqli_fetch_assoc($query_run6);

                          ?>

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>
                        <a href="<?php echo $row['pdf']; ?>" class="btn btn-info view-more-btn">More Details!!</a>
                        <br>
                            <hr>
                        </div>
                        
                        <div class="text-center  card-btn">


                            
                            <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>

                            <form action="razorpay/pay.php" method="POST">
                                <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                <?php
                                            if($count > 0)
                                            {
                                                echo '<button type="submit" disabled class="btn register-btn-active">Registered!!</button>';
                                            }   
                                            else if($count3 == 1)
                                            {
                                                echo '<button type="submit" disabled class="btn register-btn-active">Registered!!</button>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="register-btn-active">Register Now!!</button>';
                                            }
                                            ?>
                            </form>
                            <?php
                                    }
                                    else{
                                        ?>
                            <a href="login-page" class="register-btn-active-a">Register Now!!</a>
                            <?php
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
            <hr>

        </div>
    </div>









    <br>

    <div id="technical-regi" class="container_techEve container">

        <hr>

        <div class="">
            <h2 class="title_tech_Eves">Technical Events</h2>
            <br>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM events where type='technical'";
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
                    <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" height="250px"
                        alt="Card image cap">
                    <div class="card-body title">
                        <h4 class="card-title"><?php echo $row['title'] ?></h4>
                        <div class="card-data">
                        <p style="text-align: center;"><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                        <?php 
                        $incharge_id = $row['incharge'];
                          $query5 = "SELECT * FROM incharge where id = '$incharge_id' ";
                          $query_run5 = mysqli_query($connection,$query5);
                          $row5 = mysqli_fetch_assoc($query_run5);
                          
                          $mentor_id = $row['mentor'];
                          $query6 = "SELECT * FROM mentor where id = '$mentor_id' ";
                          $query_run6 = mysqli_query($connection,$query6);
                          $row6 = mysqli_fetch_assoc($query_run6);

                          ?>

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none; color: #a1c9f7;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>

                                <a href="<?php echo $row['pdf']; ?>" class="btn btn-info view-more-btn">More Details!!</a>        
                        <br>
                                <hr>
                        </div>
                        <div class="text-center  card-btn">


                            
                            <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>

                            <form action="razorpay/pay.php" method="POST">
                                <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                <?php
                                            if($count > 0)
                                            {
                                                
                                                echo '<button type="submit" disabled class="btn register-btn-active">Registered!!</button>';
                                            }
                                            else if($count3 == 1)
                                            {
                                                echo '<button type="submit" disabled class="btn register-btn-active">Registered!!</button>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn register-btn-active">Register Now!!</button>';
                                            }
                                            ?>
                            </form>
                            <?php
                                    }
                                    else{
                                        ?>
                            <a href="login-page" class="register-btn-active-a">Register Now!!</a>
                            <?php
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
            <hr>

        </div>
    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>

</div>


<!-- navbar visibility -->

<script>
    const navbar = document.querySelector('#navbar');
    navbar.classList.add('visible');
</script>

</body>

</html>