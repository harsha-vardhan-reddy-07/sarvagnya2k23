<?php
session_start();
$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);


if (!$auth) {
  header("Location: index.php");
}
require_once 'components/database.php';
?>
<!DOCTYPE html>
<html>



<head>
    <title>Sarvagyna - User Profile</title>
    <?php require_once 'components/links.php' ?>
    <link rel="stylesheet" href="assets/css/snackbar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <style>
    @media screen and (max-width: 576px) and (min-width: 0px) {
        .desktop-only {
            display: none;
        }
    }

    @media (min-width: 1025px) {

        .mobile-only {
            display: none;
        }

    }

    @media (min-width: 768px) and (max-width: 1024px) {

        .mobile-only {
            display: none;
        }

    }



    .modal-title {
        font-weight: 900
    }

    .modal-content {
        border-radius: 13px
    }

    .modal-body {
        color: #3b3b3b
    }

    .img-thumbnail {
        border-radius: 33px;
        width: 61px;
        height: 61px
    }

    .fab:before {
        position: relative;
        top: 13px
    }

    .smd {
        width: 200px;
        font-size: small;
        text-align: center
    }

    .modal-footer {
        display: block
    }

    .ur {
        border: none;
        background-color: #e6e2e2;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px
    }

    .cpy {
        border: none;
        background-color: #e6e2e2;
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
        cursor: pointer
    }

    button.focus,
    button:focus {
        outline: 0;
        box-shadow: none !important
    }

    .ur.focus,
    .ur:focus {
        outline: 0;
        box-shadow: none !important
    }

    .message {
        font-size: 11px;
        color: #ee5535
    }
    </style>


</head>

<body>

    <?php require_once 'components/navbar.php' ?>





    <div class="container" style="margin-top: 100px;margin-bottom:20px;">
        <div class=" card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="row justify-content-center">

                <div class="col-md-3 text-center">
                    <img src="<?php echo $_SESSION['picture']; ?>" class="mb-3" width="150" height="150" alt="PICTURE">
                </div>

                <div class="col-md-2 text-center">
                    <img src="<?php echo $_SESSION['qr_code']; ?>" class="mb-3" width="150" height="150" alt="Qr code">
                </div>
                <div class="col-md-7 text-center">
                    <table class="table table-hover table-bordered">
                        <tbody>

                            <tr>
                                <td><b>NAME : </b></td>
                                <td><?php echo $_SESSION['name']; ?></td>
                            </tr>
                            <tr>
                                <td><b>EMAIL : </b></td>
                                <td><?php echo $_SESSION['email']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <a href="google-login/logout.php"
                            class="btn col-md-12 btn-outline-secondary font-weight-bold">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <!-------- categories-------->

    <section class="food-items">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 justify-content-center">
                    <div class="container-fluid">





                        <div class="d-flex justify-content-between">
                            <h4><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Profile Details </h4>

                            <!-- <button class="btn btn-outline-success" data-toggle="modal" data-target="#add_details">Add
                                Data</button> -->
                        </div>



                        <br>


                        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d-m-Y');
                            $user_id = $_SESSION['id'];
                            $query = "SELECT * FROM user_details WHERE id='$user_id'";
                            $query_run = mysqli_query($connection,$query);

                    ?>

                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-striped text-center">
                                <thead style="background-color:#55198B !important;color:#fff !important;">
                                    <tr>
                                        <th>College Name</th>
                                        <th>Branch</th>
                                        <th>Year </th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Github</th>
                                        <th>Linkedin</th>
                                        <th>Update</th>
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
                                        <td><?php echo $row['college_name'];?></td>
                                        <td><?php echo $row['branch'];?></td>
                                        <td><?php echo $row['year'];?></td>
                                        <td><?php echo $row['address'];?></td>
                                        <td><?php echo $row['mobile'];?></td>
                                        <td><?php echo $row['github'];?></td>
                                        <td><?php echo $row['linkedin'];?></td>
                                        <td><button type="button" class="btn btn-info update_details">Edit</button></td>
                                    </tr>
                                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">Please Add Your Details</td>';
                    }

                    ?>
                                </tbody>
                            </table>
                        </div>










                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- Add internship Modal -->
    <div class="modal fade" id="add_details" tabindex="-1" role="dialog" aria-labelledby="add_detailsTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_detailsLongTitle">Add Profile Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-left">


                    <form action="code.php" method="POST">

                        <div class="form-group">
                            <label class="font-weight-bold">College Name</label>
                            <input type="text" name="college_name" class="form-control" placeholder="Enter College Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Branch</label>
                            <input type="text" name="branch" class="form-control" placeholder="Enter Department"
                                required>
                        </div>


                        <div class="input-group mb-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                    for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                        aria-hidden="true"></i> &nbsp; Year</label>
                            </div>

                            <select class="custom-select" name="year">
                                <option selected>choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter  Address"
                                required>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Github</label>
                            <input type="text" name="github" class="form-control" placeholder="Enter Github link">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" placeholder="Enter Likedin Link">
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_details" class="btn btn-primary">Add Details</button>
                </div>

                </form>
            </div>
        </div>
    </div>


    <!--Update details-->
    <div class="modal fade" id="update_details" tabindex="-1" role="dialog" aria-labelledby="update_detailsTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_detailsLongTitle">Update details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">

                    <form action="code.php" method="POST">



                        <div class="form-group">
                            <label class="font-weight-bold">College Name</label>
                            <input type="text" name="college_name" id="college_name" class="form-control"
                                placeholder="Enter College Name" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Branch</label>
                            <input type="text" name="branch" id="branch" class="form-control"
                                placeholder="Enter Department" required>
                        </div>


                        <div class="input-group mb-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                    for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                        aria-hidden="true"></i> &nbsp; Year</label>
                            </div>

                            <select class="custom-select" name="year" id="year">
                                <option selected>Choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Enter Address" required>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"
                                placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Github</label>
                            <input type="text" name="github" id="github" class="form-control"
                                placeholder="Enter Github Link">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control"
                                placeholder="Enter Linkedin Link">
                        </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_details" class="btn btn-primary">Update
                        Details</button>
                </div>

                </form>
            </div>
        </div>
    </div>















    <!-- update Details script -->
    <script>
    $(document).ready(function() {

        $('.update_details').on('click', function() {
            $('#update_details').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);


            $('#college_name').val(data[0]);
            $('#branch').val(data[1]);
            $('#year').val(data[2]);
            $('#address').val(data[3]);
            $('#mobile').val(data[4]);
            $('#github').val(data[5]);
            $('#linkedin').val(data[6]);

        });
    });
    </script>


    <?php require_once 'components/footer.php'; ?>
    <!-------- categories End-------->


    <!-------- Mobile nav-------->
    <?php require_once 'components/mobile-nav.php' ?>

</body>

</html>