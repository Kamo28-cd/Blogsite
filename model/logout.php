<?php
include('./classes/DB.php');
include('./classes/Login.php');
$loggedIn = '';
if (!Login::isLoggedIn()) {
	$loggedIn = "Not Logged In";
	//die("Not Logged In");
	
	}

if (isset($_POST['confirm'])) {
	
	if (isset($_POST['alldevices'])) {
			DB::query('DELETE FROM login_token WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
		
		} else {
				if (isset($_COOKIE['SNID'])) {
						DB::query('DELETE FROM login_token WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
				}
				setcookie('SNID', '1', time()-3600);
				setcookie('SNID_', '1'. time()-3600);
			
			}
	
	}

?>
<!doctype html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Logout</title>
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
<h1 class="auth_header">Logout of your Account?</h1>

<div class="center iconborder loginiconwidth">
	<i class="iconlineht text-col-aqua icon-sli-lock icon3x"></i>
</div>
<div class="padding">
<form action="logout.php" class="customform" method="post" enctype="multipart/form-data">

<div style="text-align:center;"><input type="radio" id="alldevices" name="alldevices" placeholder="Password"><label for="alldevices">Logout of all devices?</label></div><p />
<div><button class="button-bg-aqua shake" type="submit" name="confirm" id="confirm" data-bs-hover-animate="shake">Log Out</button></div>
</form>
<?php if ($loggedIn != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>You are not logged in</span></div><p />';}?>
<a href="login.html" class="text-opacity text-size-12 center text-center" ><span>Click here to log in to your account</span></a>
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

<h1>Logout of your Account?</h1>

<form action="logout.php" method="post">
	<input type="checkbox" name="alldevices" value="alldevices">Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>
</body>
</html>
-->