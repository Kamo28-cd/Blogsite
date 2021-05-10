<?php

include('./classes/DB.php');
include('./classes/Mail.php');

if (isset($_POST['resetpassword'])) {
	//when going live use php's mail function instead of the following (printing it out), only using the following because we are running it on a local computer
	
	//next line is for the token not the printing of the email 
	$cstrong = True;
	$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
	$email = $_POST['email'];
	$user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
	DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
	Mail::sendMail('Forgot Password', "<a href='https://buble.co.za/change-password.php?token=$token'>Click here to reset your password</a>", $email);
	echo "Email Sent!";
	
	echo $token;
	}


?>

<!doctype html>
<html>
<head style="height:100%">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Forgot Password</title>
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
<h1 class="auth_header">Forgot Password</h1>
<div class="center iconborder loginiconwidth">
	<i class="iconlineht text-col-aqua icon-sli-lock icon3x"></i>
</div>
<div class="padding">
<form action="forgot-password.php" class="customform" method="post" enctype="multipart/form-data">
<div><input type="email" id="username" name="email" placeholder="Email"></div><p />

<div><button class="button-bg-aqua shake" id="reset" type="submit" name="resetpassword" data-bs-hover-animate="shake">Reset Password</button></div>
</form>

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
<h1>Forgot Password</h1>
<form action="forgot-password.php" method="post">
		<input type="text" name="email" value="" placeholder="Email"><p />
        <input type="submit" name="resetpassword" value="Reset Password">
</form>
</body>
</html>-->