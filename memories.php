
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memories of Sarvagnya</title>
    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <style>

body{
            margin: 0;
            padding: 0;
            background: rgb(70,5,48);
            background: linear-gradient(-45deg, rgb(50, 3, 34) 0%, rgba(0,0,0,1) 38%, rgba(17,32,72,1) 99%);
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

.Gallery{
            height: 100vh;
            background-color: transparent;
            padding-top: 10vh;
            text-align: center;
        }
        .Gallery h1{
            color: aliceblue;
            font-family: blackpast;
            padding-top: 5%;
            font-size: 2.5rem;
        }
        .Gallery p{
            color: rgba(240, 248, 255, 0.42);
            padding-top: 15%;
            font-size: 1rem;
        }
        @media screen and (max-width:700px){
            .Gallery p{
                padding-top: 30vh;
            }
        }
</style>

</head>
<body>

<?php require_once 'components/navbar.php'; ?>


<section class="Gallery">
        <h1>Memories of Sarvagnya😍</h1>
        <p>Will be updated shortly....!</p>
</section>

<?php require_once 'components/footer.php'; ?>


<!-- navbar visibility -->

<script>
    const navbar = document.querySelector('#navbar-sarvagnya');
    navbar.classList.add('visible');
</script>
    
</body>
</html>