<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Users Profile</title>
    <?php include 'includes/links.php'; ?>
    <script src="table2excel.js"></script>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between">
            <h3><i class="fa fa-user" aria-hidden=" true"></i>&nbsp; Users </h3>

        </div>
        <br>
        <div class="row">
            <div class="col-md-6">

                <button id="downloadexcel" class="btn btn-secondary">Export to Excel</button>
            </div>

            <div class="col-md-6">
                <input id="search" type="text" class="form-control col-md-4" placeholder="Search Users">

            </div>

        </div>

        <br>



        <?php

if(isset($_SESSION['success']) && $_SESSION['success']!='')
{
    echo'<div class="alert alert-primary text-center font-weight-bold" role="alert">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['status']) && $_SESSION['status']!='')
{
    echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status'].'</div>';
    unset($_SESSION['status']);
}

?>








        <br>
        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d-m-Y');

                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($connection,$query);

                    ?>

        <div class="table-responsive text-nowrap">
            <table id="example_table" class="table table-bordered table-striped text-center">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th class="d-none">Image link</th>
                        <!-- <th>Gender</th> -->
                        <th>College Name</th>
                        <th>Branch</th>
                        <th>Year</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Github</th>
                        <th>Linkedin</th>
                    </tr>
                </thead>
                <tbody id="searchdata">
                    <?php

                    if(mysqli_num_rows($query_run) > 0)
                    {
                    while($row = mysqli_fetch_assoc($query_run))
                    {

                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><img src="<?php echo $row['image'];?>" width="50" height="50"
                                alt="<?php echo $row['name'];?> Image"></td>
                        <td class="d-none"><?php echo $row['image'];?></td>
                        <?php 
                        
                        $user_id = $row['id'];

                        $query1 = "SELECT * FROM user_details WHERE id='$user_id'";
                        $query_run1 = mysqli_query($connection,$query1);
                        $row1 = mysqli_fetch_assoc($query_run1);
                        
                        ?>
                        <td><?php echo $row1['college_name'];?></td>
                        <td><?php echo $row1['branch'];?></td>
                        <td><?php echo $row1['year'];?></td>
                        <td><?php echo $row1['address'];?></td>
                        <td><?php echo $row1['mobile'];?></td>
                        <td><?php echo $row1['github'];?></td>
                        <td><?php echo $row1['linkedin'];?></td>

                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">No Users Found</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>


    </div>



    </div>

















    <?php include 'includes/footer.php'; ?>





</body>

</html>
<script>
$(document).ready(function() {
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#searchdata tr").filter(function() {
            $(this).toggle($(this).text()
                .toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
<script>
document.getElementById('downloadexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#example_table"));
});
</script>