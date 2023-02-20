<?php

session_start();
$auth = (isset($_SESSION['manual_id']) && isset($_SESSION['manual_name']));

if(!$auth)
{
    header("Location: login.php");
}

include "database.php";


?>