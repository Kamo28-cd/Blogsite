<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (Login::isLoggedIn()) {
		$userid = Login::isLoggedIn();
		$logged = 1;
		echo $logged;
	} else {
		$logged = 0;
		echo $logged;

		//header("Location: login.html");
		//exit;
		
		}
?>

