<?php 
$signedIn = '';
if (!Login::isLoggedIn()) {
	$signedIn = "Not Signed In";
}
?>
<!doctype html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Signout</title>
<link href="css/ownstyle.css" rel="stylesheet" type="text/css">
<link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
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
<h1 class="auth_header">Signout of your Account?</h1>

<div class="center iconborder loginiconwidth">
	<i class="iconlineht text-col-aqua icon-sli-lock icon3x"></i>
</div>
<div class="padding">
<form action="" onsubmit="return false" class="customform" method="post" enctype="multipart/form-data">

<div style="text-align:center;"><input type="checkbox" id="alldevices" name="alldevices" value="no" placeholder=""><label for="alldevices">Signout of all devices?</label></div><p />
<div><button class="button-bg-aqua shake" type="submit" name="confirm" id="confirm" data-bs-hover-animate="shake">Log Out</button></div>
</form>
<?php if ($signedIn != '') {echo '<div class="text-opacity text-size-12 center text-center auth_span animated shake" style="animation-duration: 0.75s !important;-webkit-animation-duration: 0.75s !important;"><span>You are not signed in</span></div><p />';}?>
<a href="signin" class="text-opacity text-size-12 center text-center" ><span>Click here to log in to your account</span></a>
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
	//console.log('<?php echo $signedIn;?>')
	$('#confirm').click(function() {
		if ($('#alldevices').is(':checked')) {
			$('#alldevices').val('yes');
			
		} else if (!$('#alldevices').is(':checked')) {
			$('#alldevices').val('no');
		}

		
		//console.log($('#alldevices').val());
		$.ajax({
							 
			type: "POST",
			url: "api/signout",
			cache:false,
			processData: false,
			contentType:"application/json",
			data: '{"alldevices": "'+ $("#alldevices").val()+'"}',
			success: function(r) {
				window.location.href = "signin";
				//console.log(r)
				type = 'success';
				
				response = r;
				alertFunction(type,response)
			},
			error: function(r) {
				type = 'warning';
				
				response = r;
				alertFunction(type,response)
				setTimeout(function() {
					$('[data-bs-animate]').removeClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));}, 2000)
					$('[data-bs-animate]').addClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
					//console.log(r)
				}
			});
		
	})
</script>
</body>
</html>