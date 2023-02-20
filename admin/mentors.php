<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Mentor Profile</title>
    <?php include 'includes/links.php'; ?>
    <script src="table2excel.js"></script>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between">
            <h3><i class="fa fa-user" aria-hidden=" true"></i>&nbsp; Mentors </h3>

            <button class="btn btn-outline-success" data-toggle="modal" data-target="#add_mentor">Add
                Mentor</button>
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



        <!-- Add Mentor Modal -->
        <div class="modal fade" id="add_mentor" tabindex="-1" role="dialog" aria-labelledby="add_mentorTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_mentorLongTitle">Add New Mentor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-left">


                        <form action="code.php" method="POST">

                            <div class="form-group">
                                <label class="font-weight-bold">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Profile Link</label>
                                <input type="text" name="image" class="form-control" placeholder="Place Profile Link Here"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Qualification</label>
                                <input type="text" name="qualification" class="form-control"
                                    placeholder="Enter Qualification" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Accomplishments</label>
                                <input type="text" name="accomplishments" class="form-control"
                                    placeholder="Enter Accomplishments" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Experience</label>
                                <input type="text" name="experience" class="form-control" placeholder="Enter Experience"
                                    required>
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
                        <button type="submit" name="add_mentor" class="btn btn-primary">Add Mentor</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <!--Update Mentor-->
        <div class="modal fade" id="update_mentor" tabindex="-1" role="dialog" aria-labelledby="update_mentorTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_mentorLongTitle">Update Mentor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="update_mentorid" id="update_mentorid">



                            <div class="form-group">
                                <label class="font-weight-bold">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Profile Link</label>
                                <input type="text" name="image" id="image" class="form-control"
                                    placeholder="Place Profile Link Here" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Qualification</label>
                                <input type="text" name="qualification" id="qualification" class="form-control"
                                    placeholder="Enter Qualification" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Accomplishments</label>
                                <input type="text" name="accomplishments" id="accomplishments" class="form-control"
                                    placeholder="Enter Accomplishments" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Experience</label>
                                <input type="text" name="experience" id="experience" class="form-control"
                                    placeholder="Enter Experience" required>
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
                        <button type="submit" name="update_mentor" class="btn btn-primary">Update
                            Mentor</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>






        <!-- Delete Mentor-->
        <div class="modal fade" id="delete_mentor" tabindex="-1" role="dialog"
            aria-labelledby="delete_mentorCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_mentorLongTitle">Delete Mentor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="delete_mentorid" id="delete_mentorid">

                            <h4>Do You Want to Delete this Mentor </h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                <button type="submit" name="delete_mentor" class="btn btn-primary">YES</button>
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

                            $query = "SELECT * FROM mentor";
                            $query_run = mysqli_query($connection,$query);

                    ?>

        <div class="table-responsive text-nowrap">
            <table id="example_table" class="table table-bordered table-striped text-center">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th class="d-none">Image link</th>
                        <th>Qualification</th>
                        <th>Accomplishments</th>
                        <th>Experience</th>
                        <th>Email</th>
                        <th>Mobile</th>
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
                        <td><?php echo $row['name'];?></td>
                        <td><a href="<?php echo $row['image'];?>"><?php echo $row['name'];?></a></td>
                        <td class="d-none"><?php echo $row['image'];?></td>
                        <td><?php echo $row['qualification'];?></td>
                        <td><?php echo $row['accomplishments'];?></td>
                        <td><?php echo $row['experience'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><button type="button" class="btn btn-info update_mentor">Edit</button></td>
                        <td><button type="button" class="btn btn-danger delete_mentor">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">No Mentors Found</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>


    </div>



    </div>


















    <!-- update mentor script -->
    <script>
    $(document).ready(function() {

        $('.update_mentor').on('click', function() {
            $('#update_mentor').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_mentorid').val(data[0]);
            $('#name').val(data[1]);
            $('#image').val(data[3]);
            $('#qualification').val(data[4]);
            $('#accomplishments').val(data[5]);
            $('#experience').val(data[6]);
            $('#email').val(data[7]);
            $('#mobile').val(data[8]);

        });
    });
    </script>
    <!-- delete mentor script -->
    <script>
    $(document).ready(function() {

        $('.delete_mentor').on('click', function() {
            $('#delete_mentor').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_mentorid').val(data[0]);
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