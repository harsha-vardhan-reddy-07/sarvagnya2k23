<?php
	require_once "config.php";
	// require_once "../database/dbconfig.php";
	// date_default_timezone_set('Asia/Kolkata');
	// $datetime = date("Y-m-d H:i:s");
	// $id=$_SESSION['id'];
	// $conn=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
	// $query1="SELECT slno FROM users WHERE id='$id' GROUP BY login_time ORDER BY max(login_time) DESC";
	// $result=mysqli_query($conn,$query1);
	// $count=mysqli_num_rows($result);
	// if ($count>0)
	// {
	// 	while ($row=mysqli_fetch_array($result)) {
	// 	    $slno = $row['slno'];
	// 	    break;
	// 	}
		
	// }
	// $query="UPDATE users SET logout_time='$datetime' WHERE id='$id' and slno=$slno";
	// mysqli_query($conn,$query);
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	header('Location: https://localhost/sarva/index.php');
	exit();
?>