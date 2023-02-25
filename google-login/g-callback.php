<?php

	require_once "config.php";
	require_once '../components/database.php';
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: index.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];

	$auth_provider='Google';
	$id = $userData['id'];
	$email = $userData['email'];
	$firstname = $userData['givenName'];
	$lastname = $userData['familyName'];
	$picture = $userData['picture'];
	$name=$firstname." ".$lastname;
	$gender = $userData['gender'];
	$_SESSION['name'] = $name;

	$width = "250";
	$height = "250";
	$text = "http://localhost/sarva/user_profile.php?id={$id}";
$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$text}";
$_SESSION['qr_code'] = $url;
	// echo $id;
	// require_once '../components/database.php';
	// $conn=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
	// date_default_timezone_set('Asia/Kolkata');
	// $logintime = date("Y-m-d H:i:s");
	// $_SESSION['logintime'] = $logintime;
	// $query="INSERT INTO users(login_time,id,name,email,picture,auth_provider) VALUES('$logintime','$id','$name','$email','$picture','$auth_provider')";
	// $query_run=mysqli_query($conn,$query);


	 $query="INSERT INTO users(id,name,email,image,gender) VALUES('$id','$name','$email','$picture','$gender')";
	 $query_run=mysqli_query($connection,$query);

	//  insert blank user details

	 $query1="INSERT INTO `user_details` (`id`, `college_name`, `branch`, `year`, `address`, `mobile`, `github`, `linkedin`) VALUES ('$id', '-', '-','-', '-', '-', '-', '-')";
	 $query_run1=mysqli_query($connection,$query1);
	



	$_SESSION['login_status'] = "done";
	$url = $_SESSION['url'];
	// header('Location: '.$url.'');
	header('Location: ../index.php');
	exit();




?>