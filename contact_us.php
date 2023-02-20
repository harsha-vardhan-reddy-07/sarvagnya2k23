<?php
session_start();

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
				"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
				$_SERVER['REQUEST_URI'];


$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
require_once "components/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sarvagnya - 2022</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
    .title {
        font-family: "Ubuntu", sans-serif !important;
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


    <br><br><br><br>



    <div class="container">

  <h3 class="text-secondary title">Faculty Coordinator: </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>Sri A. Naresh</h4>
                        <p><b>Email : </b> pandu5188@gmail.com</p>
                        <p><b>Phone : </b>9642051959</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class="text-secondary title">Fest Coordinators : </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>A. Praveen Babu</h4>
                        <p><b>Email : </b> praveenbabuatluri123@gmail.com</p>
                        <p><b>Phone : </b>7893681921</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>B.L Vikram</h4>
                        <p><b>Email : </b> vikram@gmail.com</p>
                        <p><b>Phone : </b>9381426211</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>Deepika</h4>
                        <p><b>Email : </b> deepikanidadala@gmail.com</p>
                        <p><b>Phone : </b>7671974174</p>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>Kavya</h4>
                        <p><b>Email : </b> garladinnekavyasree002@gmail.com</p>
                        <p><b>Phone : </b>9704592930</p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <h3 class="text-secondary title">For Payment Related Issues Contact : </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>Ch. Narendra</h4>
                        <p><b>Email : </b> cnarendra329@gmail.com</p>
                        <p><b>Phone : </b>9110762518</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h4><b>Name : </b>R. Kishore</h4>
                        <p><b>Email : </b> rudrarajukishore1@gmail.com</p>
                        <p><b>Phone : </b>9381426211</p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>