<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya- Colleges</title>
    <?php include 'includes/links.php'; ?>
    <script src="table2excel.js"></script>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between">
            <h3><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Colleges </h3>

            <button class="btn btn-outline-success" data-toggle="modal" data-target="#add_college">Add
                College</button>
        </div>
        <br>
        <div class="col-md-8">

            <button id="downloadexcel" class="btn btn-secondary">Export to Excel</button>
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



        <!-- Add college Modal -->
        <div class="modal fade" id="add_college" tabindex="-1" role="dialog" aria-labelledby="add_collegeTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_collegeLongTitle">Add New College</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-left">


                        <form action="code.php" method="POST">

                            <div class="form-group">
                                <label class="font-weight-bold">College Name</label>
                                <input type="text" name="college_name" class="form-control"
                                    placeholder="Enter College Name" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Principal Name</label>
                                <input type="text" name="principal_name" class="form-control"
                                    placeholder="Enter Principal Name" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile"
                                    required>
                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_college" class="btn btn-primary">Add College</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <!--Update College-->
        <div class="modal fade" id="update_college" tabindex="-1" role="dialog" aria-labelledby="update_collegeTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_collegeLongTitle">Update College</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="update_collegeid" id="update_collegeid">


                            <div class="form-group">
                                <label class="font-weight-bold">College Name</label>
                                <input type="text" name="college_name" id="college_name" class="form-control"
                                    placeholder="Enter College Name" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Principal Name</label>
                                <input type="text" name="principal_name" id="principal_name" class="form-control"
                                    placeholder="Enter Principal Name" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control"
                                    placeholder="Enter Mobile" required>
                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_college" class="btn btn-primary">Update
                            College</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>






        <!-- Delete College-->
        <div class="modal fade" id="delete_college" tabindex="-1" role="dialog"
            aria-labelledby="delete_collegeCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_collegeLongTitle">Delete College</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="delete_collegeid" id="delete_collegeid">

                            <h4>Do You Want to Delete this College </h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                <button type="submit" name="delete_college" class="btn btn-primary">YES</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>













        <br>
        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d-m-Y');

                            $query = "SELECT * FROM colleges";
                            $query_run = mysqli_query($connection,$query);

                    ?>

        <div class="table-responsive text-nowrap">
            <table id="example_table" class="table table-bordered table-striped text-center">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>ID</th>
                        <th>College Name</th>
                        <th>Principal Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Created At</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if(mysqli_num_rows($query_run) > 0)
                    {
                    while($row = mysqli_fetch_assoc($query_run))
                    {

                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['college_name'];?></td>
                        <td><?php echo $row['principal_name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><?php echo $row['created_at'];?></td>
                        <td><button type="button" class="btn btn-info update_college">Edit</button></td>
                        <td><button type="button" class="btn btn-danger delete_college">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">No Colleges Found</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>


    </div>



    </div>


















    <!-- update college script -->
    <script>
    $(document).ready(function() {

        $('.update_college').on('click', function() {
            $('#update_college').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_collegeid').val(data[0]);
            $('#college_name').val(data[1]);
            $('#principal_name').val(data[2]);
            $('#email').val(data[3]);
            $('#mobile').val(data[4]);

        });
    });
    </script>
    <!-- delete college script -->
    <script>
    $(document).ready(function() {

        $('.delete_college').on('click', function() {
            $('#delete_college').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_collegeid').val(data[0]);
        });
    });
    </script>





    <?php include 'includes/footer.php'; ?>





</body>

</html>

<script>
document.getElementById('downloadexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#example_table"));
});
</script>