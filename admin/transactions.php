<?php

include 'security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Transactions</title>
    <?php include 'includes/links.php'; ?>
    <script src="table2excel.js"></script>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>


    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between">
            <h3><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Transactions </h3>


        </div>
        <br>
        <div class="row">
            <div class="col-md-6">

                <button id="downloadexcel" class="btn btn-secondary">Export to Excel</button>
            </div>

            <div class="col-md-6">
                <input id="search" type="text" class="form-control col-md-4"
                    placeholder="Search Challenge Transactions">

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



        <!-- Add transaction Modal -->
        <div class="modal fade" id="add_transaction" tabindex="-1" role="dialog" aria-labelledby="add_transactionTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_transactionLongTitle">Add New Transcation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-left">


                        <form action="code.php" method="POST">





                            <div class="form-group">
                                <label class="font-weight-bold">User email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter User Email"
                                    required>
                            </div>



                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Event</label>
                                </div>

                                <select class="custom-select" name="event">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM events";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">No Events Found</div>';
            }

        ?>

                                </select>
                            </div>



                            <br>


                            <div class="form-group">
                                <label class="font-weight-bold">Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Enter Event Amount"
                                    required>
                            </div>






                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_transaction" class="btn btn-primary">Add Transaction</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <!--Update Transaction-->
        <div class="modal fade" id="update_transaction" tabindex="-1" role="dialog"
            aria-labelledby="update_transactionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_transactionLongTitle">Update Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="update_transactionid" id="update_transactionid">



                            <div class="form-group">
                                <label class="font-weight-bold">User email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter User Email" required>
                            </div>



                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-dark font-weight-bold" name="collge_name"
                                        for="inputGroupSelect01" style="font-size:16px;"> <i class="fa fa-filter"
                                            aria-hidden="true"></i> &nbsp; Event</label>
                                </div>

                                <select class="custom-select" name="event" id="event">
                                    <option selected>Choose</option>
                                    <?php
  

            $query = "SELECT * FROM events";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>
                                    </option>

                                    <?php
                 }
             }
            else
            {
            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">No Events Found</div>';
            }

        ?>

                                </select>
                            </div>



                            <br>


                            <div class="form-group">
                                <label class="font-weight-bold">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control"
                                    placeholder="Enter Event Amount" required>
                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_transaction" class=" btn btn-primary">Update
                            transaction</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>






        <!-- Delete Transaction-->
        <div class="modal fade" id="delete_transaction" tabindex="-1" role="dialog"
            aria-labelledby="delete_transactionCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_transactionLongTitle">Delete Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="code.php" method="POST">

                            <input type="hidden" name="delete_transactionid" id="delete_transactionid">

                            <h4>Do You Want to Delete this Transaction </h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                <button type="submit" name="delete_transaction" class="btn btn-primary">YES</button>
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

                            $query = "SELECT * FROM transactions";
                            $query_run = mysqli_query($connection,$query);

                    ?>

        <div class="table-responsive text-nowrap">
            <table id="example_table" class="table table-bordered table-striped text-center">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Order ID</th>
                        <th>Payment ID</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Event ID</th>
                        <th>Event Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Txn_time</th>

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
                        <td><?php echo $row['order_id'];?></td>
                        <td><?php echo $row['payment_id'];?></td>
                        <td><?php echo $row['user_id'];?></td>
                         <td><?php 
                        
                        $user_id = $row['user_id'];

                        $query1 = "SELECT * FROM users WHERE id='$user_id'";
                        $query_run1 = mysqli_query($connection,$query1);
                        $row1 = mysqli_fetch_assoc($query_run1);
                        echo $row1['name'];
                        
                        ?></td>
                        <td><?php 
                        
                        $user_id = $row['user_id'];

                        $query1 = "SELECT * FROM users WHERE id='$user_id'";
                        $query_run1 = mysqli_query($connection,$query1);
                        $row1 = mysqli_fetch_assoc($query_run1);
                        echo $row1['email'];
                        
                        ?></td>
                        <td><?php echo $row['event_id'];?></td>
                         <td><?php 
                        
                        $event_id = $row['event_id'];

                        $query2 = "SELECT * FROM events WHERE id='$event_id'";
                        $query_run2 = mysqli_query($connection,$query2);
                        $row2 = mysqli_fetch_assoc($query_run2);
                        echo $row2['title'];
                        
                        ?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><?php echo $row['txn_time'];?></td>

                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="13">No Transactions Found</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>


    </div>



    </div>


















    <!-- update Transaction script -->
    <script>
    $(document).ready(function() {

        $('.update_transaction').on('click', function() {
            $('#update_transaction').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_transactionid').val(data[0]);
            $('#email').val(data[3]);
            $('#event').val(data[4]);
            $('#amount').val(data[5]);



        });
    });
    </script>
    <!-- delete college script -->
    <script>
    $(document).ready(function() {

        $('.delete_transaction').on('click', function() {
            $('#delete_transaction').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_transactionid').val(data[0]);
        });
    });
    </script>


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



    <?php include 'includes/footer.php'; ?>





</body>

</html>

<script>
document.getElementById('downloadexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#example_table"));
});
</script>