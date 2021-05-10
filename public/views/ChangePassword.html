<?php 
$currentToken = $_GET['token'];
$email = $_GET['email'];
$user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
$token = DB::query('SELECT token FROM password_tokens WHERE user_id=:userid ORDER BY date DESC', array(':userid'=>$user_id))[0]['token'];

if (sha1($currentToken) == $token) {
	$tokenIsValid = True;
} else {
	$tokenIsValid = False;
}

$passwordmatch = '';
$currentPass = '';

?>

<!doctype html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Change Password</title>
<link href="css/ownstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/template-style.css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/components.css" rel="stylesheet" type="text/css">
<link href="css/responsee.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="css/popup-box.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
<link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
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
<div class="padding loginbodyht center s-6 l-6 maxwidthlogin minwidthlogin boxborder" style="top:10vh">
<h1 class="auth_header">Change Password</h1>
<span class="auth_header" style="padding:10px;">Please note, for the purpose of this demo, a confirmation email was not sent. Instead you were redirected to this page however under normal circumstances a confirmation email with a link would be sent instead</span>
<div class="center iconborder loginiconwidth">
	<i class="iconlineht text-col-aqua icon-sli-lock icon3x"></i>
</div>
<div class="padding">
<form action="" method="post" class="customform" enctype="multipart/form-data" onsubmit="return false">
<?php if ($tokenIsValid) { echo '<div><input type="password" name="oldpassword" id="oldpassword" value="" placeholder="Current Password"></div><p />';}?>
<?php if ($currentPass != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>Current Password Incorrect</span></div><p />';}?>
<div><input type="password" name="newpassword" id="newpassword" value="" placeholder="New Password"></div><p />

<div><input type="password" name="newpasswordrepeat" value="" id="newpasswordrepeat" placeholder="Repeat Password"></div><p />
<?php if ($passwordmatch != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>Passwords do not match</span></div><p />';}?>

<div><button class="button-bg-aqua shake" id="changepassword" type="submit" name="changepassword" data-bs-hover-animate="shake">Change Password</button></div>
</form>
<a href="signin" class="text-opacity text-size-12 center text-center" ><span>Login with your new password</span></a>
</div>
</div>
</div>
<!--**************** Start of toast notifications****************-->
<div class="alert" style="margin-top:0px !important;">
	<span class="fas fa-exclamation-circle"></span> 
	<span class="msg-a">Warning: This is a warning alert!</span>
	
	<span class="close-btn-alert">
		<span class="fas fa-times"></span>
	</span>

</div>

<div class="alert-success" style="margin-top:0px !important;">
	<span class="far fa-check-circle"></span> 
	<span class="msg-a-success">Success: You've completed this action</span>
	
	<span class="close-btn-alert-success">
		<span class="fas fa-times"></span>
	</span>

</div>


<!--**************** End of toast notifications****************-->
<script type="text/javascript" src="js/toastalert.js"></script>
<script> 
	token = '<?php echo $token; ?>';
	tokenIsValid = '<?php echo $tokenIsValid; ?>';
	$('#changepassword').click(function(){
		
		if ((token != '') && (tokenIsValid ==1)) {
			$.ajax({
							 
				type: "POST",
				url: "api/change-password?token="+token,
				cache:false,
				processData: false,
				contentType:"application/json",
				data: '{"oldpassword": "'+ $("#oldpassword").val()+'", "newpassword": "'+ $("#newpassword").val()+'", "newpasswordrepeat": "'+ $("#newpasswordrepeat").val()+'"}',
				success: function(r) {
					//window.location.href = "home";
					type = 'success';
					//console.log(r)
					response = r;
					alertFunction(type,response)
					setTimeout(function() {window.location.href = "signin";},1500)
				},
				error: function(r) {
					type = 'warning';
					response = r.responseText;
					alertFunction(type,response)
					setTimeout(function() {
					$('[data-bs-animate]').removeClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));}, 2000)
					$('[data-bs-animate]').addClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
					//console.log(r)
					}
				});
		}
	})
	//console.log('token valid '+'<?php echo $tokenIsValid;?>')
	//console.log('DB Token '+'<?php echo $token;?>')
	//console.log('Current Token '+'<?php echo sha1($currentToken);?>')
</script>
</body>
</html>