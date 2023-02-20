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






            <div class=" col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="font-weight-bold">Manual Transactions</h5>

                    <?php 

                        $query = "SELECT * FROM transactions WHERE a_m = 'manual'";
                        $query_run = mysqli_query($connection,$query);
                        $count =  mysqli_num_rows($query_run);

                        ?>
                    <h4 class="text-dark font-weight-bold"><?php echo $count; ?></h4>
                </div>
            </div>


        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


</body>

</html>