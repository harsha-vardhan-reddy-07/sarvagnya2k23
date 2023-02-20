<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("167855090789-3lou9gdoah0bv3tlfee606hjqupurc1t.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("Sarvagnya 2k23");
	$gClient->setRedirectUri("http://localhost/sarva/google-login/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
