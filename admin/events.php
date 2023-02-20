<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Events</title>
    <?php include 'includes/links.php'; ?>
    <script src="table2excel.js"></script>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between">
            <h3><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Events </h3>

            <button class="btn btn-outline-success" data-toggle="modal" data-target="#add_event">Add
                Event</button>
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



        <!-- Add Event Modal -->
        <div class="modal fade" id="add_event" tabindex="-1" role="dialog" aria-labelledby="add_eventTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_eventLongTitle">Add New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-left">


                        <form action="code.php" method="POST">



                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_id"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Event Type</label>
                                </div>

                                <select class="custom-select" name="type">
                                    <option selected>Choose</option>
                                    <option value="all">All-Events</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="presentation">presentation</option>
                                    <option value="technical">technical</option>
                                    <option value="accomodation">accomodation</option>
                                </select>
                            </div>


                            <br>
                            <div class="form-group">
                                <label class="font-weight-bold">Event Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Event Title"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Event Description</label>
                                <input type="text" name="description" class="form-control"
                                    placeholder="Enter Event Description" required>
                            </div>




                            <div class="form-group">
                                <label class="font-weight-bold">Image</label>
                                <input type="text" name="image" class="form-control" placeholder="Place Image Link Here"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Duration</label>
                                <input type="text" name="duration" class="form-control"
                                    placeholder="Enter event Duration" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Location</label>
                                <input type="text" name="location" class="form-control"
                                    placeholder="Enter Location Link" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Details</label>
                                <input type="text" name="pdf" class="form-control" placeholder="Place Details Pdf Link"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">price</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Events Price"
                                    required>
                            </div>


                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Incharge</label>
                                </div>

                                <select class="custom-select" name="incharge">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM incharge";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">N0 Incharge Found</div>';
            }

        ?>

                                </select>
                            </div>






                            <br>


                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Mentor</label>
                                </div>

                                <select class="custom-select" name="mentor">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM mentor";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">No Mentor Found</div>';
            }

        ?>

                                </select>
                            </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_event" class="btn btn-primary">Add Event</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <!--Update Event-->
        <div class="modal fade" id="update_event" tabindex="-1" role="dialog" aria-labelledby="update_eventTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_eventLongTitle">Update College</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="update_eventid" id="update_eventid">



                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_id"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Event Type</label>
                                </div>

                                <select class="custom-select" name="type" id="type">
                                    <option selected>Choose</option>
                                    <option value="all">All-Events</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="presentation">presentation</option>
                                    <option value="technical">technical</option>
                                    <option value="accomodation">accomodation</option>
                                </select>
                            </div>


                            <br>
                            <div class="form-group">
                                <label class="font-weight-bold">Event Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Event Title" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Event Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Enter Event Description" required>
                            </div>




                            <div class="form-group">
                                <label class="font-weight-bold">Image</label>
                                <input type="text" name="image" id="image" class="form-control"
                                    placeholder="Place Image Link Here" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control"
                                    placeholder="Enter event Duration" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Enter Location Link" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Details</label>
                                <input type="text" name="pdf" id="pdf" class="form-control"
                                    placeholder="Place Details Pdf Link" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">price</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    placeholder="Enter Events Price" required>
                            </div>


                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Incharge</label>
                                </div>

                                <select class="custom-select" name="incharge" id="incharge">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM incharge";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">N0 Incharge Found</div>';
            }

        ?>

                                </select>
                            </div>






                            <br>


                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Mentor</label>
                                </div>

                                <select class="custom-select" name="mentor" id="mentor">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM mentor";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">No Mentor Found</div>';
            }

        ?>

                                </select>
                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_event" class=" btn btn-primary">Update
                            Event</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>






        <!-- Delete Event-->
        <div class="modal fade" id="delete_event" tabindex="-1" role="dialog" aria-labelledby="delete_eventCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_eventLongTitle">Delete Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="delete_eventid" id="delete_eventid">

                            <h4>Do You Want to Delete this Event </h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                <button type="submit" name="delete_event" class="btn btn-primary">YES</button>
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

                            $query = "SELECT * FROM events";
                            $query_run = mysqli_query($connection,$query);

                    ?>

        <div class="table-responsive text-nowrap">
            <table id="example_table" class="table table-bordered table-striped text-center">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th class='d-none'>Image Link</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <th>Details Link</th>
                        <th>Price</th>
                        <th class='d-none'>Incharge Id</th>
                        <th class='d-none'>Mnetor Id</th>
                        <th>Incharge</th>
                        <th>Mentor</th>
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
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><img src="<?php echo $row['image'];?>" width="50" height="50"
                                alt="<?php echo $row['name'];?> Image"></td>
                        <td class="d-none"><?php echo $row['image'];?></td>
                        <td><?php echo $row['duration'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td><?php echo $row['pdf'];?></td>
                        <td><?php echo $row['price'];?></td>
                        <td class="d-none"><?php echo $row['incharge'];?></td>
                        <td class="d-none"><?php echo $row['mentor'];?></td>
                        <td><?php 
                        
                        $incharge = $row['incharge'];

                        $query1 = "SELECT * FROM incharge WHERE id='$incharge'";
                        $query_run1 = mysqli_query($connection,$query1);
                        $row1 = mysqli_fetch_assoc($query_run1);
                        echo $row1['name'];
                        
                        ?></td>
                        <td><?php 
                        
                        $mentor = $row['mentor'];

                        $query2 = "SELECT * FROM mentor WHERE id='$mentor'";
                        $query_run2 = mysqli_query($connection,$query2);
                        $row2 = mysqli_fetch_assoc($query_run2);
                        echo $row2['name'];
                        
                        ?></td>
                        <td><?php echo $row['created_at'];?></td>
                        <td><button type="button" class="btn btn-info update_event">Edit</button></td>
                        <td><button type="button" class="btn btn-danger delete_event">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">No Events Found</td>';
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

        $('.update_event').on('click', function() {
            $('#update_event').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_eventid').val(data[0]);
            $('#type').val(data[1]);
            $('#title').val(data[2]);
            $('#description').val(data[3]);
            $('#image').val(data[5]);
            $('#duration').val(data[6]);
            $('#location').val(data[7]);
            $('#pdf').val(data[8]);
            $('#price').val(data[9]);
            $('#incharge').val(data[10]);
            $('#mentor').val(data[11]);


        });
    });
    </script>
    <!-- delete college script -->
    <script>
    $(document).ready(function() {

        $('.delete_event').on('click', function() {
            $('#delete_event').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_eventid').val(data[0]);
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