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

body{
    background: rgb(70,5,48);
    background: linear-gradient(-45deg, rgba(70,5,48,1) 0%, rgba(0,0,0,1) 38%, rgba(17,32,72,1) 99%);
        
}

.form-modal{
    position:relative;
    top: 10vh;
    width:450px;
    height:auto;
    padding: 2% 2% 2% 2%;
    margin-top:4em;
    left:50%;
    transform:translateX(-50%);
    /* background:#fff;
    border-radius: 1rem;
    box-shadow:0 3px 20px 0px rgba(0, 0, 0, 0.1) */
    background: rgba(255, 255, 255, 0.119);
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    z-index: 1;
    transform: 0.5s;
    color: #fff;
}

.form-modal button{
    cursor: pointer;
    position: relative;
    text-transform: capitalize;
    font-size:1em;
    z-index: 2;
    outline: none;
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
    margin-top:0.2em;
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
    text-align: center;
}

.form-toggle button{
    width:100%;
    
    margin: 7% 0 3% 0;
    border:none;
    font-size:1.5rem;
    font-weight: bold;
    
}
.login-sarva-logo{
    font-family: researcher;
    font-size: 1.5rem;
    color: #ffffffdf;
    
}

#loginator{
    color:#57b846e6;
    margin: 12% 0 5% 0;
    font-size:1.5rem;
    font-weight: bold;
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
    margin-top:0.1em;
    padding:0.6em;
}

.google-login-btn{
    background-color: #e3e3e317;
    border: 1px solid #e3e3e317;
    border-radius: 20px;
}
.google-login-btn:hover{
    background-color: #e3e3e32e;
}
.google-login-btn-text{
    color: #ffffffb3;
}




.form-modal i {
    position: absolute;
    left:20%;
    top:50%;
    transform:translateX(-10%) translateY(-50%); 
}

.fa-google{
    color:#dd4b39;
}



@media only screen and (max-width:500px){
    .form-modal{
        width:100%;
        top: 20vh;
    }
    .login-sarva-logo{
        margin: 2% 0 0 2%;
    }
    .form-toggle button{
        margin: 15% 0 3% 0;
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
    <h2 class="login-sarva-logo">Sarvagnya</h2>
    <div class="form-toggle">
        
        <h3 id="loginator" >Loginator!!</h3>
    </div>

    <div id="login-form">
        <form>
          
            <button type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="google-login-btn"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> <span class="text google-login-btn-text">sign in with google</span> </button>
         
        </form>
    </div>
</div>
  </div><br>

</body>

</html>