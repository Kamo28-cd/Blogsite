<?php

include('./classes/DB.php');
include('./classes/Login.php');

$tokenIsValid = False;
$passwordmatch = '';
$currentPass = '';
if (Login::isLoggedIn()) {
		if (isset($_POST['changepassword'])) {
			
		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$newpasswordrepeat = $_POST['newpasswordrepeat'];
		$userid = Login::isLoggedIn();
		
		if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {
					
					if ($newpassword == $newpasswordrepeat){
						
								if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
									
									DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT),':userid'=>$userid));
								
									echo "You've successfully changed your Password";
								}
								//$passwordmatch = True;
						} else {
								$passwordmatch = False;
								//echo "Passwords do not match!";
							
							}
			
			} else {
					$currentPass = "Current Password Incorrect";
					//echo "Current Password Incorrect";
				}	
		}
	} else {
			
			if (isset($_GET['token'])) {
			$token = $_GET['token'];
			if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))){
					$userid = DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
					$tokenIsValid = True;
			if (isset($_POST['changepassword'])) {
			

		$newpassword = $_POST['newpassword'];
		$newpasswordrepeat = $_POST['newpasswordrepeat'];

		
		
					
					if ($newpassword == $newpasswordrepeat){
						
								if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
									
									DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT),':userid'=>$userid));
								
									echo "You've successfully changed your Password";
									DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
								}
						
						} else {
								$passwordmatch = False;
								//echo "Passwords do not match!";
							
							}
			
			} 	
			
					
	} else {
			$invalidToken = "Token Invalid";
			die('Token Invalid');
	}
		
		} else {
			die('Not Logged In');
	}
		}
?>
<!doctype html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Change Password</title>
<link rel="stylesheet" href="css/template-style.css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/components.css" rel="stylesheet" type="text/css">
<link href="css/responsee.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="css/popup-box.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Romanesco" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Roboto:400,500,100,100italic,300,300italic,500italic,700,700italic,900,900italic,400italic" rel="stylesheet" type="text/css">
	 
	  <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>
         
</head>

<body>
<div>
<div class="padding loginbodyht center s-6 l-6 maxwidthlogin minwidthlogin boxborder">
<h1 class="auth_header">Change Password</h1>
<div class="center iconborder loginiconwidth">
	<i class="iconlineht text-col-aqua icon-sli-lock icon3x"></i>
</div>
<div class="padding">
<form action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else {echo 'change-password.php?token='.$token.''; }?>" method="post" class="customform" enctype="multipart/form-data">
<?php if (!$tokenIsValid) { echo '<div><input type="password" name="oldpassword" id="oldpassword" value="" placeholder="Current Password"></div><p />';}?>
<?php if ($currentPass != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>Current Password Incorrect</span></div><p />';}?>
<div><input type="password" name="newpassword" id="newpassword" value="" placeholder="New Password"></div><p />

<div><input type="password" name="newpasswordrepeat" value="" id="newpasswordrepeat" placeholder="Repeat Password"></div><p />
<?php if ($passwordmatch != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>Passwords do not match</span></div><p />';}?>

<div><button class="button-bg-aqua shake" id="changepassword" type="submit" name="changepassword" data-bs-hover-animate="shake">Change Password</button></div>
</form>
<a href="login.php" class="text-opacity text-size-12 center text-center" ><span>Login with your new password</span></a>
</div>
</div>
</div>

</body>
</html>
<!--
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<h1>Change Password</h1>
<form action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else {echo 'change-password.php?token='.$token.''; }?>" method="post">
    <?php if (!$tokenIsValid) { echo '<input type="password" name="oldpassword" value="" placeholder="Current Password"><p />';}?>
    <input type="password" name="newpassword" value="" placeholder="New Password"><p />
    <input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password"><p />
    <input type="submit" name="changepassword" value="Change Password"><p />


</form>
</body>
</html>
-->

