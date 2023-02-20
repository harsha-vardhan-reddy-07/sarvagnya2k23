<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya - Admin Panel</title>
    <?php include 'includes/links.php'; ?>
</head>

<body>
    <div class="container" style="margin-top:150px;">
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

        <div class="card shadow text-center shadow-lg p-5 mb-5 bg-white rounded">
            <h4 class="text-center text-secondary font-weight-bold">Admin Login</h4><br>
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <form action="code.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name or Email Address"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        </div>
                        <button class="btn btn-outline-success btn-lg btn-block text-uppercase font-weight-bold"
                            name="login" type="submit">login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'includes/footer.php'; ?>

</html>