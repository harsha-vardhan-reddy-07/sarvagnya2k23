<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'components/database.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvagnya 2K22</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
    body {
        background: #00091B;
        color: #fff;
        font-family: 'Roboto', sans-serif;
    }

    @keyframes fadeIn {
        from {
            top: 20%;
            opacity: 0;
        }

        to {
            top: 100;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeIn {
        from {
            top: 20%;
            opacity: 0;
        }

        to {
            top: 100;
            opacity: 1;
        }
    }

    .wrapper {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        animation: fadeIn 1000ms ease;
        -webkit-animation: fadeIn 1000ms ease;
    }

    h1 {
        font-size: 50px;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 0;
        line-height: 1;
        font-weight: 700;
    }

    .dot {
        color: #4FEBFE;
    }

    p {
        text-align: center;
        margin: 18px;
        font-family: 'Muli', sans-serif;
        font-weight: normal;
    }

    .icons {
        text-align: center;
    }

    .icons i {
        color: #00091B;
        background: #fff;
        height: 15px;
        width: 15px;
        padding: 13px;
        margin: 0 10px;
        border-radius: 50px;
        border: 2px solid #fff;
        transition: all 200ms ease;
        text-decoration: none;
        position: relative;
    }

    .icons i:hover,
    .icons i:active {
        color: #fff;
        background: none;
        cursor: pointer !important;
        transform: scale(1.2);
        -webkit-transform: scale(1.2);
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>User Profile Not Found<span class="dot">.</span></h1>
        <a href="<?php echo $base_url; ?>/index.php">
            <h2 style="text-align: center;">Back to Home</h2>
        </a>
        <div class="icons">
            <a href="https://instagram.com/sarvagnya_2k22?utm_medium=copy_link"><i class="fa fa-instagram"></i></a>
            <a href="https://youtube.com/channel/UCWWF-JKepQBQX1oZ8KpnDgw"><i class="fa fa-youtube-play"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100079635271518"><i
                    class="fa fa-facebook-official"></i></a>
        </div>
    </div>
</body>

</html>