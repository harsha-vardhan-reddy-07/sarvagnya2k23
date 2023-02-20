<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Dashboard</title>
    <?php include 'includes/links.php'; ?>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="text-dark font-weight-bold">Users</h5>
                    <?php 

                        $query = "SELECT * FROM users";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);
                       
                    ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>



            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Incharge</h5>

                    <?php 

                        $query = "SELECT * FROM incharge";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>



            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Mentor</h5>

                    <?php 

                        $query = "SELECT * FROM mentor";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>



            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Events</h5>

                    <?php 

                        $query = "SELECT * FROM events";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>


            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Transactions</h5>

                    <?php 

                        $query = "SELECT * FROM transactions";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>
            
            
            
            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Online Workshop Registrations</h5>

                    <?php 

                        $query = "SELECT * FROM transactions WHERE event_type='workshop'";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>


        <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Online Overview</h5>

                    <?php 

                        $query1 = "SELECT * FROM transactions WHERE event_id='2028373142' ";
                        $query_run1 = mysqli_query($connection,$query1);
                        $count1 =  mysqli_num_rows($query_run1);

            

                        $query2 = "SELECT * FROM transactions WHERE event_id='8021211728' ";
                        $query_run2 = mysqli_query($connection,$query2);
                        $count2 =  mysqli_num_rows($query_run2);

                     

                        $query3 = "SELECT * FROM transactions WHERE event_id='0231211822' ";
                        $query_run3 = mysqli_query($connection,$query3);
                        $count3 =  mysqli_num_rows($query_run3);
                        
                        
                        
                        $query4 = "SELECT * FROM transactions WHERE event_id='1842311082' ";
                        $query_run4 = mysqli_query($connection,$query4);
                        $count4 =  mysqli_num_rows($query_run4);




                        $query5 = "SELECT * FROM transactions WHERE event_id='2430240202' ";
                        $query_run5 = mysqli_query($connection,$query5);
                        $count5 =  mysqli_num_rows($query_run5);




                        $query6 = "SELECT * FROM transactions WHERE event_id='4224120203' ";
                        $query_run6 = mysqli_query($connection,$query6);
                        $count6 =  mysqli_num_rows($query_run6);




                        $query7 = "SELECT * FROM transactions WHERE event_id='2221171123' ";
                        $query_run7 = mysqli_query($connection,$query7);
                        $count7 =  mysqli_num_rows($query_run7);


                        $query8 = "SELECT * FROM transactions WHERE event_id='2700122118' ";
                        $query_run8 = mysqli_query($connection,$query8);
                        $count8 =  mysqli_num_rows($query_run8);


                        $query9 = "SELECT * FROM transactions WHERE event_id='0223122124' ";
                        $query_run9 = mysqli_query($connection,$query9);
                        $count9 =  mysqli_num_rows($query_run9);
                        
                        
                        $query10 = "SELECT * FROM transactions WHERE event_id='4332300410' ";
                        $query_run10 = mysqli_query($connection,$query10);
                        $count10 =  mysqli_num_rows($query_run10);


                        ?>
                    <h4 class="text-dark font-weight-bold">Data science - <?php echo $count1; ?></h4>
                     <h4 class="text-dark font-weight-bold">Mern Stack  - <?php echo $count2; ?></h4>
                      <h4 class="text-dark font-weight-bold">RPA Tool - <?php echo $count3; ?></h4>
                      <h4 class="text-dark font-weight-bold">Paper Presentation - <?php echo $count4; ?></h4>
                      <h4 class="text-dark font-weight-bold">Poster Presentation - <?php echo $count5; ?></h4>
                       <h4 class="text-dark font-weight-bold">General Quiz - <?php echo $count6; ?></h4>
                        <h4 class="text-dark font-weight-bold">Technical Quiz - <?php echo $count7; ?></h4>
                         <h4 class="text-dark font-weight-bold">Encoding & Decoding - <?php echo $count8; ?></h4>
                          <h4 class="text-dark font-weight-bold">Capture The Flag - <?php echo $count9; ?></h4>
                          <h4 class="text-dark font-weight-bold">Coding Challenge - <?php echo $count10; ?></h4>
                </div>
            </div>





        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


</body>

</html>