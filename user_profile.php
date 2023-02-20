<?php
session_start();
require_once 'components/database.php';
$user_id = $_GET['id'];

$query3 = "SELECT * FROM users WHERE id='$user_id'";
$query_run3 = mysqli_query($connection,$query3);
$count3 = mysqli_num_rows($query_run3);

if($user_id == '' || $count3 == 0){
    header('Location: error.php');
}



?>
<!DOCTYPE html>
<html>



<head>
    <title>Sarvagyna - User Profile Details</title>
    <?php require_once 'components/links.php' ?>
    <!-- Icons and Font-Family Google API CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <style>
    .title {
        font-family: "Ubuntu" !important;
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-toggleable-sm bg-inverse navbar-inverse fixed-top shadow-sm  bg-white"
        style="background-color:#ffffff !important;border-bottom: 1px red dotted;">
        <div class="p-2 bd-highlight logo-box"><a href="<?php echo $base_url; ?>/index.php"
                style="text-decoration:none;"><img src="assets/images/logo2.png" width="40" height="40" alt="logo"><img
                    src="assets/images/logo3.gif" width="250" height="50" alt="logo"></a></div>
        <div class="p-2 bd-highlight col-md-6 search-box">

        </div>

    </nav>

    <br>
    <br>
    <br>
    <br>
    <?php
                  $query = "SELECT * FROM users WHERE id='$user_id'";
               $query_run = mysqli_query($connection,$query);
               $row = mysqli_fetch_assoc($query_run);

               $query1 = "SELECT * FROM user_details WHERE id='$user_id'";
               $query_run1 = mysqli_query($connection,$query1);
               $row1 = mysqli_fetch_assoc($query_run1);


                            ?>
    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col-md-6 text-center">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded title">
                    <h5 class="text-dark font-weight-bold">User Details</h5>
                    <hr>
                    <img src="<?php echo $row['image']; ?>" width="150" height="150" alt=""
                        style="margin-left:auto;margin-right:auto;">
                    <br>
                    <h6 class="text-dark font-weight-bold">Name : <?php echo $row['name']; ?></h6>
                    <h6 class="text-dark font-weight-bold">Email : <?php echo $row['email']; ?></h6>

                    <?php 
            
            if(mysqli_num_rows($query_run1) > 0){
                ?>

                    <h6 class="text-dark font-weight-bold">Mobile : <?php echo $row1['mobile']; ?></h6>
                    <?php
                
            }else{
                ?>

                    <?php
            }
            ?>
                </div>
            </div>
            <?php 
            
            if(mysqli_num_rows($query_run1) > 0){
                ?>
            <div class="col-md-6 text-center title">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <h5 class="text-dark font-weight-bold">College Details</h5>
                    <hr>
                    <h5 class="text-dark font-weight-bold">College : <?php echo $row1['college_name']; ?></h5>
                    <h5 class="text-dark font-weight-bold">Branch : <?php echo $row1['branch']; ?></h5>
                    <h5 class="text-dark font-weight-bold">Year : <?php echo $row1['year']; ?> </h5>
                    <h5 class="text-dark font-weight-bold">Address : <?php echo $row1['address']; ?></h5>
                </div>
            </div>

            <?php
                
            }else{
                ?>
            <div class="col-md-6 text-center title">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <h5 class="text-dark font-weight-bold">College Details</h5>
                    <div class="alert alert-danger" role="alert">
                        No Details Found
                    </div>
                </div>
            </div>

            <?php
            }
            ?>




            <div class="col-md-6 text-center title">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <h5 class="text-dark font-weight-bold">Event Registrations</h5>
                    <hr>

                    <?php
                        $query = "SELECT * FROM transactions where user_id='$user_id'";
                        $query_run = mysqli_query($connection,$query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                        $event_id = $row['event_id'];

                        $query2 = "SELECT * FROM events where id='$event_id'";
                        $query_run2 = mysqli_query($connection,$query2);
                        $row2 = mysqli_fetch_assoc($query_run2);

                     
                        ?>

                    <h5><b><?php echo $row2['title'] ?></b> - <span class="text-success">Paid</span></h5>

                    <?php
                        }
                         }
                    else{
                        ?>
                    <div class="alert alert-danger" role="alert">
                        No Registrations Yet
                    </div>
                    <?php
                        }
                     ?>

                </div>
            </div>

        </div>
    </div>


    <?php require_once 'components/footer.php'; ?>
    <!-------- categories End-------->




</body>

</html>