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
    <title>Sarvagnya - 2022 - Events</title>

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
        <a class="btn btn-outline-success font-weight-bold mt-2 disabled title" data-toggle="modal">
            <img src="assets/images/trending.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Registered
                For
                All
                Events</span>
        </a>

        <?php
}
else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success font-weight-bold mt-2 title" data-toggle="modal"
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
        <button type="button" class="btn btn-outline-success font-weight-bold mt-2 title" data-toggle="modal"
            data-target="#exampleModal">
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
        <a class="btn btn-outline-info font-weight-bold ml-2 mt-2 disabled title" data-toggle="modal"
            data-target="#exampleModalacc">
            <img src="assets/images/hostel.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Registered
                For
                Accomodation</span>
        </a>

        <?php
}
else{
    ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-info font-weight-bold ml-2 mt-2 title" data-toggle="modal"
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
        <button type="button" class="btn btn-outline-info font-weight-bold ml-2 mt-2 title" data-toggle="modal"
            data-target="#exampleModalacc">
            <img src="assets/images/hostel.gif" width="30" height="30" alt=""> <span class="pt-2 mt-2">Register
                For
                Accomodation</span>
        </button>

        <?php
}
?>





        <br>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
    <div class="modal fade" id="exampleModalacc" tabindex="-1" role="dialog" aria-labelledby="exampleModalaccLabel"
        aria-hidden="true">
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




    <div class="container">
        <div class="">
            <h2 class=" title">Workshops Events</h2>
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
                    <div class="card-body title">
                        <h4><?php echo $row['title'] ?></h4>
                        <p><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                                 <h6 class="text-muted"><span class="text-danger">*</span>Students have to carry
                            their own laptops , If possible </h6>
                        <hr>
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

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>

                        <hr>
                        <div class="text-center mx-auto mb-2 d-flex justify-content-between">


                            <a href="<?php echo $row['pdf']; ?>" class="btn btn-info">View More</a>
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
                                              
                                                echo '<a class="btn btn-success pl-2 disabled">Registered</a>';
                                            }
                                            else if($count2 == 1)
                                            {
                                                echo "<a class='btn btn-secondary pl-2 disabled'>Can't Register</a>";
                                            }
                                            else if($count3 == 1)
                                            {
                                                echo "<a class='btn btn-secondary pl-2 disabled'>Can't Register</a>";
                                            }
                                            else if($count == 0){
                                                
                                                // if($row['id'] == 8021211728)
                                                // {
                                                //     echo '<a class="btn disabled btn-danger">No Slots Avaliable</a>';
                                                // }
                                                // else{
                                                    echo '<button type="submit" class="btn btn-success">Register</button>';
                                                // }
                                               
                                                
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










    <div class="container">

        <hr>

        <div class="">
            <h2 class=" title">Presentation Events</h2>
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


            <div class="col-md-4">


                <div class="card my-2">
                    <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" height="250px"
                        alt="Card image cap">
                    <div class="card-body title">
                        <h4><?php echo $row['title'] ?></h4>
                        <p><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                        <hr>
                        <?php
                        if($row['id'] == '1842311082'){
                            echo "<p class='text-secondary'> <span class='text-danger'>*</span> Max 2 members per team , Team leader have to register</p>";
                            echo "<hr>";
                        }else{
                            echo "";
                        }
                        ?>
                        
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

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>

                        <hr>
                        <div class="text-center mx-auto mb-2 d-flex justify-content-between">


                            <a href="<?php echo $row['pdf']; ?>" class="btn btn-info">View More</a>
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











    <div class="container">

        <hr>

        <div class="">
            <h2 class="title">Technical Events</h2>
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
                    <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" height="150px"
                        alt="Card image cap">
                    <div class="card-body title">
                        <h4><?php echo $row['title'] ?></h4>
                        <p><?php echo $row['description']; ?></p>
                        <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                        <p><b>Amount : </b><?php echo $row['price']; ?> /-</p>
                        <hr>
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

                        <p><b>Incharge : </b><a target="_blank" style="text-decoration:none;"
                                href="<?php echo $row5['image']; ?>"><?php echo $row5['name']; ?></a>,
                            <?php echo $row5['qualification']; ?></p>
                        <p><b>Mentor : </b><a style="text-decoration:none;"
                                href="<?php echo $row6['image']; ?>"><?php echo $row6['name']; ?></a>, <?php echo $row6['qualification']; ?></p>

                        <hr>
                        <div class="text-center mx-auto mb-2 d-flex justify-content-between">


                            <a href="<?php echo $row['pdf']; ?>" class="btn btn-info">View More</a>
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
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>