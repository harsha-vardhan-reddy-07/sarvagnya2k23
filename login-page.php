<?php
require_once "google-login/config.php";
require_once "components/database.php";
$loginURL = $gClient->createAuthUrl();
$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
if (!$auth) {
  echo "<script> href.location = '<?php echo $base_url?>/login-page.php';</script>";
} else {
  echo "<script> location.href = '<?php echo $base_url?>/index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'components/links.php'; ?>
  <link rel="stylesheet" href="assets/css/login-page.css">
</head>
<style>

.form-modal{
    position:relative;
    width:450px;
    height:auto;
    margin-top:4em;
    left:50%;
    transform:translateX(-50%);
    background:#fff;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
    box-shadow:0 3px 20px 0px rgba(0, 0, 0, 0.1)
}

.form-modal button{
    cursor: pointer;
    position: relative;
    text-transform: capitalize;
    font-size:1em;
    z-index: 2;
    outline: none;
    background:#fff;
    transition:0.2s;
}

.form-modal .btn{
    border-radius: 20px;
    border:none;
    font-weight: bold;
    font-size:1.2em;
    padding:0.8em 1em 0.8em 1em!important;
    transition:0.5s;
    border:1px solid #ebebeb;
    margin-bottom:0.5em;
    margin-top:0.5em;
}

.form-modal .login , .form-modal .signup{
    background:#57b846;
    color:#fff;
}

.form-modal .login:hover , .form-modal .signup:hover{
    background:#222;
}

.form-toggle{
    position: relative;
    width:100%;
    height:auto;
}

.form-toggle button{
    width:100%;
    float:left;
    padding:1.5em;
    margin-bottom:1.5em;
    border:none;
    transition: 0.2s;
    font-size:1.1em;
    font-weight: bold;
    border-radius: 20px;
    
}

#login-toggle{
    background:#fff;
    color:#57b846;
}

.form-modal form{
    position: relative;
    width:90%;
    height:auto;
    left:50%;
    transform:translateX(-50%);  
}

#login-form {
    position:relative;
    width:100%;
    height:auto;
    padding-bottom:1em;
}



#login-form button {
    width:100%;
    margin-top:0.5em;
    padding:0.6em;
}

.form-modal input{
    position: relative;
    width:100%;
    font-size:1em;
    padding:1.2em 1.7em 1.2em 1.7em;
    margin-top:0.6em;
    margin-bottom:0.6em;
    border-radius: 20px;
    border:none;
    background:#ebebeb;
    outline:none;
    font-weight: bold;
    transition:0.4s;
}

.form-modal input:focus , .form-modal input:active{
    transform:scaleX(1.02);
}

.form-modal input::-webkit-input-placeholder{
    color:#222;
}


.form-modal p{
    font-size:16px;
    font-weight: bold;
}

.form-modal p a{
    color:#57b846;
    text-decoration: none;
    transition:0.2s;
}

.form-modal p a:hover{
    color:#222;
}


.form-modal i {
    position: absolute;
    left:10%;
    top:50%;
    transform:translateX(-10%) translateY(-50%); 
}

.fa-google{
    color:#dd4b39;
}

.fa-linkedin{
    color:#3b5998;
}

.fa-windows{
    color:#0072c6;
}

.-box-sd-effect:hover{
    box-shadow: 0 4px 8px hsla(210,2%,84%,.2);
}

@media only screen and (max-width:500px){
    .form-modal{
        width:100%;
    }
}

@media only screen and (max-width:400px){
    i{
        margin-right:5px;
    }
    .text{
        font-size:15px;
    }
}

</style>
<body>
  <div class="container">
    <div class="form-modal">
    
    <div class="form-toggle">
        <button id="login-toggle">log in to your account</button>
    </div>

    <div id="login-form">
        <form>
          
            <hr/>
            <button type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> <span class="text">sign in with google</span> </button>
         
        </form>
    </div>
</div>
  </div><br>

</body>

</html>