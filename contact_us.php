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
    <title>Sarvagnya - 2023</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
    
    body{
        background: rgb(70,5,48);
        background: linear-gradient(-45deg, rgba(70,5,48,1) 0%, rgba(0,0,0,1) 38%, rgba(17,32,72,1) 99%);
        background-attachment: fixed;
    }
    /* Scroll bar */

    ::-webkit-scrollbar-thumb {
            background-color: #d97e7e;
            border-radius: 10px;
            border: 5px;
        }
        ::-webkit-scrollbar-track {
            background-color: transparent;
        }
        ::-webkit-scrollbar {
            width: 10px;
            background-color: #e8e8e800;
            display: none;
        }
    
    .contactus-title{
        font-family: "Ubuntu", sans-serif !important; 
        color: rgb(229, 226, 226);
    }
    


    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
    .contactus-card{
        background: rgba(255, 255, 255, 0.119);
        backdrop-filter: blur(10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 1;
        transform: 0.5s;
        color: #fff;
    }
    .card-body{
        color: #cdcbcbc6;
    }
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


    <br><br><br><br>



    <div class="container">

  <h3 class="title contactus-title">Faculty Coordinator: </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title ">
                        <h4>Dr. B. Muni Lavanya <span style="font-size: 60%;">PhD</span></h4>
                        <p><b>Email : </b>munilavanya45@gmail.com</p>
                        <p><b>Phone : </b>9490080261</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title ">
                        <h4>Dr. A. Naresh <span style="font-size: 60%;">PhD</span></h4>
                        <p><b>Email : </b> pandu5188@gmail.com</p>
                        <p><b>Phone : </b>9642051959</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class=" title contactus-title">Fest Coordinators : </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>N Charan Teja</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>9390393945</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>Niharika</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>9347812043</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>Anil</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>9347643823</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>N B Devi Sree</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>9347443239</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>G Madan Mohan</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>8074055571</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>k Snigdha</h4>
                        <p><b>Email : </b> 12345@gmail.com</p>
                        <p><b>Phone : </b>9347443239</p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <h3 class="title contactus-title">For Payment Related Issues Contact : </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>G Vamshi</h4>
                        <p><b>Email : </b>vv517816@gmail.com</p>
                        <p><b>Phone : </b>7287996065</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2 contactus-card">
                    <div class="card-body title">
                        <h4>B Harsha Vardhan</h4>
                        <p><b>Email : </b>harshavardhanreddyb07@gmail.com</p>
                        <p><b>Phone : </b>7569753553</p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>
    
    
    <!-- navbar visibility -->

<script>
    const navbar = document.querySelector('#navbar-sarvagnya');
    navbar.classList.add('visible');
</script>


</body>

</html>