<?php 
include('./classes/DB.php');
include('./classes/Mail.php');

//for caterogy: change grade to account_category, it should have freelancer, recruiter, school/institution, company

if (isset($_POST['createaccount'])) {
	//users
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$industry = $_POST['industry'];
	$grade = $_POST['grade'];
	//profiles
	
	$firstname = $_POST['grade'];
	$lastname = $_POST['grade'];
	$userlocation = $_POST['grade'];
	$worksat = $_POST['grade'];
	$acctype = $_POST['grade'];
	$accmode = $_POST['grade'];
	
	if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
	
			if (strlen($username) >= 3 && strlen($username) <= 32) {
				
				if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
					
						if (strlen($password) >= 6 && strlen($password) <= 60) {
				
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							
						if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
				
	
								DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, :grade, :industry, \'\', \'0\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':grade'=>$grade, ':industry'=>$industry));
								
								if (DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))) {
									$userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username));
									DB::query('INSERT INTO profiles VALUES (\'\', :user_id, :first_name, :last_name, :user_location, :works_at, :acc_type, :acc_mode, NOW())', array(':user_id'=>$userid, ':first_name'=>$firstname, ':last_name'=>$lastname, ':user_location'=>$userlocation, ':works_at'=>$worksat, ':acc_typet'=>$acctype, ':acc_mode'=>$accmode));

								}

								Mail::sendMail('Welcome to Buble','Your account has been created', $email);
								echo "Success!";
								
						} else {
							?>
								<script type="text/javascript">
									errortext = "Email already in use";
									alertFunction("warning",errortext);
								</script>
								
							<?php
						}
							
						} else {
							?>
							<script type="text/javascript">
								errortext = "Warning: Invalid Email";
								alertFunction("warning",errortext);
							</script>
							
						<?php
								
						}
				} else {
					?>
					<script type="text/javascript">
						errortext = "Warning: Invalid Password";
						alertFunction("warning",errortext);
					</script>
					
				<?php
						
				}
				} else {
					?>
					<script type="text/javascript">
						errortext = "Warning: Invalid Username";
						alertFunction("warning",errortext);
					</script>
					
				<?php
						
				}
			} else {
					?>
					<script type="text/javascript">
						errortext = "Warning: Invalid Username";
						alertFunction("warning",errortext);
					</script>
					
				<?php
						
			}
			
	} else {
		?>
					<script type="text/javascript">
						errortext = "Warning: User already exists!";
						alertFunction("warning",errortext);
					</script>
					
				<?php	
		
	}
}
?>
<!doctype html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Create Account</title>
<link rel="stylesheet" href="css/template-style.css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/ownstyle.css" rel="stylesheet" type="text/css">
<link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
<link href="css/components.css" rel="stylesheet" type="text/css">
<link href="css/responsee.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="css/popup-box.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Romanesco" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Roboto:400,500,100,100italic,300,300italic,500italic,700,700italic,900,900italic,400italic" rel="stylesheet" type="text/css">
	 
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>  
<script type="text/javascript" src="js/toastalert.js"></script> 

<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/responsee.js"></script>
         
</head>

<body class="body-signup">
<div class="container-signup">
    <header>Sign Up</header>
	<div class="center iconborder loginiconwidth">
		<i class="iconlineht text-col-aqua icon-sli-people icon3x"></i>
	</div>
    <div class="progress-bar">
        <div class="step-signup">
            <p>Name</p>
            <div class="bullet-signup">
                <span>1</span>
            </div>
            <div class="check fas fa-check"></div>

        </div>
         <div class="step-signup">
            <p>Contact</p>
            <div class="bullet-signup">
                <span>2</span>
            </div>
            <div class="check fas fa-check"></div>

        </div>
         <div class="step-signup">
            <p>Birth</p>
            <div class="bullet-signup">
                <span>3</span>
            </div>
            <div class="check fas fa-check"></div>

        </div>
        <div class="step-signup">
            <p>Account</p>
            <div class="bullet-signup">
                <span>4</span>
            </div>
            <div class="check fas fa-check"></div>

        </div>
         <div class="step-signup">
            <p>Submit</p>
            <div class="bullet-signup">
                <span>5</span>
            </div>
            <div class="check fas fa-check"></div>

        </div>
    </div>
    <div class="form-outer">
        <form class="">
            <div class="page slidepage">
                <div class="title-signup">Basic Info:</div>
                <div class="field">
                    <div class="label-signup">First Name</div>
                    <input class="required" id="first_name" type="text" required>
                </div>
                <div class="field">
                    <div class="label-signup">Last Name</div>
                    <input class="required" id="last_name" type="text" required>
                </div>
                <div class="field nextBtn">
                  
                    <button type="button">Next</button>
                </div>
            </div>

            <div class="page">
                <div class="title-signup">Contact Info:</div>
                <div class="field">
                    <div class="label-signup">Email Address</div>
                    <input class="required"  id="email" type="text" required>
                </div>
                <div class="field">
                    <div class="label-signup">Phone Number</div>
                    <input id="phonenumber" type="number">
                </div>
                <div class="field btns">
                  
                    <button type="button" class="prev-1 prev">Previous</button>
                    <button type="button" class="next-1 next">Next</button>
                </div>
            </div>

            <div class="page">
                <div class="title-signup">Personal Info:</div>
                <div class="field">
                    <div class="label-signup">Date of Birth</div>
                    <input class="required"  id="dateofbirth" type="date" placeholder="" required>
                </div>
                <div class="field">
                    <div class="label-signup">Gender</div>
                    <select id="gender">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="field btns">
                    <button type="button" class="prev-2 prev">Previous</button>
                    <button type="button" class="next-2 next">Next</button>
                </div>
            </div>


            <div class="page">
                <div class="title-signup">Account Info:</div>
                <div class="field">
                    <div class="label-signup">Location</div>
                    <input id="location" type="text">
                </div>
		 <div class="field">
                    <div class="label-signup">Employment Status</div>
                    <select id="works_at">
			<option id="employment_status1">Employed Full-time</option>
                        <option id="employment_status2">Employed Part-time</option>
			<option>Job Seeking</option>
                        <option id="employment_status3">Self-Employed</option>
                        <option>Studying</option>
                        <option>Other</option>
                    </select>
                </div>
		<div id="works_at_field" class="field" style="display:none;transition:0.3s ease;height:0;">
                    <div class="label-signup">Place of Employment</div>
                    <input id="works_status" type="text">
                </div>
                <div class="field">
                    <div class="label-signup">Account Type</div>
                    <select id="acc_type">
                        <option>Individual</option>
                        <option>Enterprise</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="field">
                    <div class="label-signup">Account Mode</div>
                    <select id="acc_mode">
                        <option>Buyer</option>
                        <option>Seller</option>
                        <option>Courier (Deliver products)</option>
                        <option>Provide Services</option>
                        <option>None</option>
                        <option>All</option>
                    </select>
                </div>
                <div class="field btns">
                  
                    <button type="button" class="prev-3 prev">Previous</button>
                    <button type="button" class="next-3 next">Next</button>
                </div>
            </div>


            <div class="page">
                <div class="title-signup">Profile Info:</div>
                <div class="field">
                    <div class="label-signup">Username</div>
                    <input class="required"  id="username" type="text" required>
                </div>
                <div class="field">
                    <div class="label-signup">Password</div>
                    <input class="required"  id="password" type="password" required>
                </div>
		<div class="field">
                    <div class="label-signup">Category</div>
                    <select id="category">
			<option>Company</option>
                        <option>Freelancer</option>
                        <option>Recruiter</option>
                        <option>School/Insituion</option>
			
                    </select>
                </div>
                <div class="field">
                    <div class="label-signup">Inustry</div>
                    <select id="industry">
			<option>Art</option>
			<option>Architecture/Construction</option>
                        <option>Engineering</option>
			<option>Entertainment</option>
			<option>Finance</option>
			<option>Law</option>
                        <option>Medical Field</option>
                        <option>Politics</option>
			<option>Public Relations</option>
                        <option>Research</option>
			<option>Sports</option>
                        <option>Other</option>
                        <option>None</option>
                    </select>
                </div>
                <div class="field btns">
                    <button type="button" class="prev-4 prev">Previous</button>
                    <button type="button" id="createaccount" class="submit-signup next">Submit</button>
                </div>
            </div>


            



        </form>
    </div>

</div>

<!-- Start of toast notifications-->
<div class="alert" style="margin-top:0px !important;">
	<span class="fas fa-exclamation-circle"></span> 
	<span class="msg-a">Warning: This is a warning alert!</span>
	
	<span class="close-btn-alert">
		<span class="fas fa-times"></span>
	</span>

</div>

<div class="alert-success" style="margin-top:0px !important;">
	<span class="far fa- check fas fa-check-circle"></span> 
	<span class="msg-a-success">Success: You've completed this action</span>
	
	<span class="close-btn-alert-success">
		<span class="fas fa-times"></span>
	</span>

</div>
<!-- End of toast notifications-->
<script type="text/javascript" src="js/signup.js"></script> 
<script type="text/javascript" src="js/toastalert.js"></script> 
<script type="text/javascript">
		
		$('#employment_status1,#employment_status2,#employment_status3').click(function(){
			document.getElementById("works_at_field").style.display="block";
			document.getElementById("works_at_field").style.height="45px";
			console.log("working");
		});
      		$('#createaccount').click(function() {
						//mydata = '{"username": "'+ $("#username").val()+'", "email": "'+ $("#email").val()+'", "password": "'+ $("#password").val()+'", "gender": "'+ $("#gender").val()+'", "dateofbirth": "'+ $("#dateofbirth").val()+'", "first_name": "'+ $("#first_name").val()+'", "last_name": "'+ $("#last_name").val()+'", "location": "'+ $("#location").val()+'","works_at": "'+ $("#works_at").val()+'", "acc_type": "'+ $("#acc_type").val()+'", "acc_mode": "'+ $("#acc_mode").val()+'","category": "'+ $("#category").val()+'","industry": "'+ $("#industry").val()+'"}';
						//console.log(mydata)
						$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/users",
							 processData: false,
							 contentType:"application/json",
							 data: '{"username": "'+ $("#username").val()+'", "email": "'+ $("#email").val()+'", "password": "'+ $("#password").val()+'", "gender": "'+ $("#gender").val()+'", "dateofbirth": "'+ $("#dateofbirth").val()+'", "first_name": "'+ $("#first_name").val()+'", "last_name": "'+ $("#last_name").val()+'", "location": "'+ $("#location").val()+'","works_at": "'+ $("#works_at").val()+'", "acc_type": "'+ $("#acc_type").val()+'", "acc_mode": "'+ $("#acc_mode").val()+'","category": "'+ $("#category").val()+'","industry": "'+ $("#industry").val()+'"}',
							 success: function(r) {
									
								 	//console.log(r)
									alertText = JSON.parse(r);
									
									
									alertString = alertText.Success;
									console.log(alertString);
									alertFunction("success",''+alertString+'')
									setTimeout(function() {
										console.log("you did it");
									},1000)
							 },
							 error: function(r) {
									
								 	
								 	setTimeout(function() {
										$('[data-bs-animate]').removeClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));}, 2000)
										$('[data-bs-animate]').addClass('animated' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
								 	//console.log(r)
									
									alertText = JSON.parse(r.responseText);
									
									alertString = alertText.Error;
									
									
									alertFunction("warning",'Error:'+alertString+'')
									
								 }
						});
			});
      </script>
</body>
</html>



