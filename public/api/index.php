<?php 
require_once("DB.php");

$db = new DB("127.0.0.1", "blogsite", "root", "");


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if ($_GET['url'] == "search") {
		
		
	$tosearch = explode(" ", $_GET['query']);
	if (count($tosearch) == 1) {
			$tosearch = str_split($tosearch[0], 2);
		}
	
	
	$whereclause = "";
	$paramsarray = array(':body'=>'%'.$_GET['query'].'%');
	for ($i = 0; $i < count($tosearch); $i++) {
			if ($i % 2) {
			$whereclause .= "  OR body LIKE :p$i";
			$paramsarray[":p$i"] = $tosearch[$i];
			}
		}
	
	$posts = $db->query('SELECT posts.id, posts.body, posts.posted_at, posts.user_id, posts.likes, posts.subject,  posts.grade, posts.postimg, users.username, users.profileimg FROM posts, users WHERE users.id = posts.user_id AND posts.body LIKE :body '.$whereclause.' LIMIT 5', $paramsarray);
	
	echo json_encode($posts);
	
	
	} else if ($_GET['url'] == "users") {
		
		$token = $_COOKIE['SNID'];
		
		$user_id = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$username = $db->query('SELECT username FROM users WHERE id=:uid', array(':uid'=>$user_id))[0]['username'];
		echo $username;
	
	} else if ($_GET['url'] == "userid") {
		
		$token = $_COOKIE['SNID'];
		
		$user_id = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		echo $user_id;
	
	} else if ($_GET['url'] == "userprof") {
		
		$token = $_COOKIE['SNID'];
		
		$user_id = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$userprof = $db->query('SELECT * FROM users WHERE id=:uid', array(':uid'=>$user_id));
		
		echo json_encode($userprof);
	
	} else if ($_GET['url'] == "comments" && isset($_GET['postid'])) {
		$output = "";
		$postID = $_GET['postid'];
		$comments = $db->query('SELECT comments.id, comments.comment, users.username, users.profileimg, comments.posted_at, comments.commentimg, comments.likes  FROM comments, users WHERE post_id = :postid AND comments.user_id = users.id', array(':postid'=>$_GET['postid']));
		
		$cmexist = $db->query('SELECT posts.commented FROM posts WHERE id =:postid', array(':postid'=>$postID))[0]['commented'];
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		if ($cmexist == 1) {
			
		$output .= "[";
			foreach($comments as $comment) {
				$iLiked = 1;
				if (!$db->query('SELECT comment_id FROM comment_likes WHERE comment_id=:commentid AND user_id=:userid',array(':commentid'=>$comment['id'],':userid'=>$userid))){
				$iLiked = 0;
				}
				$output .= "{";
					$output .= '"CommentId": '.$comment['id'].',';
					$output .= '"Comment": "'.$comment['comment'].'",';
					$output .= '"CommentedBy": "'.$comment['username'].'",';
					$output .= '"CommenterImg": "'.$comment['profileimg'].'",';
					$output .= '"CommentDate": "'.$comment['posted_at'].'",';
					$output .= '"CommentImage": "'.$comment['commentimg'].'",';
					$output .= '"Likes": '.$comment['likes'].',';
					$output .= '"ILiked": '.$iLiked.'';
				$output .= "},";
				
				}
		//$l = strlen($output);		
		//if (mb_substr($output,$l,1,"UTF-8") != "[") {
		
		$output = substr($output, 0, strlen($output)-1);
		//$output .= "]";
		//}
		$output .= "]";
		}else {
			$output = "[{}]";
			}
		http_response_code(200);
		echo $output;
		
	
	} else if ($_GET['url'] == "posts") {
		$start = (int)$_GET['start'];
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		$followingposts = $db->query('SELECT posts.id, posts.posted_at, posts.body, posts.postimg, posts.likes, posts.subject, posts.grade, users.username, users.profileimg, followers.user_id FROM posts, users, followers WHERE (posts.user_id = users.id AND posts.user_id = followers.user_id) ORDER BY posts.posted_at DESC, posts.likes DESC LIMIT 5 OFFSET '.$start.';', array(':userid'=>$userid));
		$response = "[";
		foreach($followingposts as $post) {
		$iLiked = 1;
			if (!$db->query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid',array(':postid'=>$post['id'],':userid'=>$userid))){
		$iLiked = 0;
		}
	
		$response .= "{";
			$response .= '"PostId": '.$post['id'].',';
			$response .= '"PostBody": "'.$post['body'].'",';
			$response .= '"PostedBy": "'.$post['username'].'",';
			$response .= '"PostDate": "'.$post['posted_at'].'",';
			$response .= '"PostSubject": "'.$post['subject'].'",';
			$response .= '"PostGrade": '.$post['grade'].',';
			$response .= '"PostImage": "'.$post['postimg'].'",';
			$response .= '"ProfileImage": "'.$post['profileimg'].'",';
			$response .= '"Likes": '.$post['likes'].',';
			$response .= '"ILiked": '.$iLiked.'';
		$response .= "},";

	
	
	}
	$response = substr($response, 0, strlen($response)-1);
	$response .= "]";
	
	http_response_code(200);
	echo $response;
		
	} else if ($_GET['url'] == "singlepost")  {
		$postid = $_GET['postid'];
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		$followingposts = $db->query('SELECT posts.id, posts.posted_at, posts.body, posts.postimg, posts.likes, posts.subject, posts.grade, users.profileimg, users.username FROM posts, users WHERE posts.id=:postid AND users.id = posts.user_id', array(':postid'=>$postid));
		//echo $followingposts;
		$response = "[";
		foreach($followingposts as $post) {
		$iLiked = 1;
			if (!$db->query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid',array(':postid'=>$post['id'],':userid'=>$userid))){
		$iLiked = 0;
		}
	
		$response .= "{";
			$response .= '"PostId": '.$post['id'].',';
			$response .= '"PostBody": "'.$post['body'].'",';
			$response .= '"PostedBy": "'.$post['username'].'",';
			$response .= '"PostDate": "'.$post['posted_at'].'",';
			$response .= '"PostSubject": "'.$post['subject'].'",';
			$response .= '"PostGrade": '.$post['grade'].',';
			$response .= '"PostImage": "'.$post['postimg'].'",';
			$response .= '"ProfileImage": "'.$post['profileimg'].'",';
			$response .= '"Likes": '.$post['likes'].',';
			$response .= '"ILiked": '.$iLiked.'';
		$response .= "},";

	
	
	}
	$response = substr($response, 0, strlen($response)-1);
	$response .= "]";
	
	//http_response_code(200);
	echo $response;
	//echo $followingposts;
	} else if ($_GET['url'] == "profileposts") {
		$start = (int)$_GET['start'];
		
		
		$userid = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
		//users.id AND users.id =
		$followingposts = $db->query('SELECT posts.id, posts.posted_at, posts.body, posts.postimg, posts.likes, posts.subject, posts.grade, users.username, users.profileimg FROM posts, users WHERE posts.user_id =users.id AND users.id = :userid ORDER BY posts.posted_at DESC LIMIT 5 OFFSET '.$start.';', array(':userid'=>$userid));
$response = "[";
foreach($followingposts as $post) {
	$iLiked = 1;
	if (!$db->query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid',array(':postid'=>$post['id'],':userid'=>$userid))){
	$iLiked = 0;
	}
	$response .= "{";
		$response .= '"PostId": '.$post['id'].',';
		$response .= '"PostBody": "'.$post['body'].'",';
		$response .= '"PostedBy": "'.$post['username'].'",';
		$response .= '"PostSubject": "'.$post['subject'].'",';
		$response .= '"PostGrade": '.$post['grade'].',';
		$response .= '"PostDate": "'.$post['posted_at'].'",';
		$response .= '"PostImage": "'.$post['postimg'].'",';
		$response .= '"ProfileImage": "'.$post['profileimg'].'",';
		$response .= '"Likes": '.$post['likes'].',';
		$response .= '"ILiked": '.$iLiked.'';
	$response .= "},";

	
	
	}
	$response = substr($response, 0, strlen($response)-1);
	$response .= "]";
	
	http_response_code(200);
	echo $response;
		
	} else if ($_GET['url'] == "notifications") {
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];

		$seen = 0; 
		//seen = 0 is no and seen = 1 is yes
		
		$notifications = $db->query('SELECT notifications.id, notifications.type, notifications.receiver, notifications.sender, notifications.extra, notifications.notification_seen FROM notifications WHERE notifications.receiver=:userid and notifications.notification_seen=:seen', array(':userid'=>$userid,':seen'=>$seen));
		$numberofnotif = sizeof($notifications);
		//echo 'There are '.$numberofnotif.' rows in the table';
		echo "{";
			echo '"Notifications":';
			echo $numberofnotif;
					
		echo "}";

	}
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
		
	
	if ($_GET['url'] == "message") {
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		
		$body = $postBody->body;
		$receiver = $postBody->receiver;
		$db->query("INSERT INTO messages VALUES ('', :body, :sender, :receiver, '0', NOW(), '')", array(':body'=>$body, ':sender'=>$userid, ':receiver'=>$receiver));
		
	
	 }  else if ($_GET['url'] == "musers2") {
		$token = $_COOKIE['SNID'];
		
		$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		$msgBody = file_get_contents("php://input");
		$msgBody = json_decode($msgBody);
		
		$sentby = $msgBody->sentby;
		 		
		$db->query("UPDATE messages SET messages.read=1 WHERE (receiver=:userid AND sender=:sentby)", array(':userid'=>$userid,':sentby'=>$sentby));
		
	 } else if ($_GET['url'] == "users") {
		
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		$profileimg = "profile_img/default.png";
		$coverimg = "cover_img/default.png";
		
		$username = $postBody->username;
		$email = $postBody->email;
		$password = $postBody->password;
		$category = $postBody->category;
		$industry = $postBody->industry;
		
		$firstname = $postBody->first_name;
		$lastname = $postBody->last_name;
		$userlocation = $postBody->location;
		$worksat = $postBody->works_at;
		$acctype = $postBody->acc_type;
		$accmode = $postBody->acc_mode;
		$gender = $postBody->gender;
		$dateofbirth = $postBody->dateofbirth;
		
		if (!$db->query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
	
			if (strlen($username) >= 3 && strlen($username) <= 32) {
				
				if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
					
						if (strlen($password) >= 6 && strlen($password) <= 60) {
				
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							
						if (!$db->query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
				
	
								$db->query('INSERT INTO users VALUES (\'\', :username, :password, :email, :category, :industry, :profileimg, :coverimg,\'\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':category'=>$category, ':industry'=>$industry,':profileimg'=>$profileimg,':coverimg'=>$coverimg));
								if ($db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))) {
									$userid =$db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
									$db->query('INSERT INTO profiles VALUES (\'\', :user_id, :first_name, :last_name, :user_location, :works_at, :acc_type, :acc_mode, NOW(), :dateofbirth, :gender)', array(':user_id'=>$userid, ':first_name'=>$firstname, ':last_name'=>$lastname, ':user_location'=>$userlocation, ':works_at'=>$worksat, ':acc_type'=>$acctype, ':acc_mode'=>$accmode, ':dateofbirth'=>$dateofbirth, ':gender'=>$gender));

								}
								echo '{"Success": "Your Account Has Successfully Been Created!"}';
								http_response_code(200);
								
						} else {
								echo '{"Error": "Email Already In Use"}';
								http_response_code(409);
							
						}
							
						} else {
								echo '{"Error": "Invalid Email"}';
								http_response_code(409);
						}
				} else {
						echo '{"Error": "Invalid Password"}';
						http_response_code(409);
				}
				} else {
						echo '{"Error": "Invalid Username"}';
					http_response_code(409);
				}
			} else {
					echo '{"Error": "Invalid Username or Password"}';
					http_response_code(409);	
			}
			
	} else {
		echo '{"Error": "User Already Exists!"}';
		http_response_code(409);
	}
		
	} else if ($_GET['url'] == "auth") {
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		
		$username = $postBody->username;
		$password = $postBody->password;
		
		if ($db->query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
			if (password_verify($password, $db->query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
				$cstrong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				$user_id = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
				$db->query('INSERT INTO login_token VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
				//echo '{"Token": "'.$token.'"}';	
				setcookie("SNID", $token, time() + 60*60*24*7,'/',NULL, NULL,TRUE);
				setcookie("SNID_", '1',time() + 60*60*24*3,'/',NULL, NULL,TRUE);
				//header("Location: home");
				echo '{"Success": "Loggin in"}';
				http_response_code(200);
				} else {
					echo '{"Error": "Invalid username or password"}';
					http_response_code(401);
					}
			} else {
				echo '{"Error": "Invalid username or password"}';
				http_response_code(401);
				
			}

		
	} else if ($_GET['url'] == "likedpost") {
		$postId = $_GET['id'];
		$token = $_COOKIE['SNID'];
		
		$likerId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		if (!$db->query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid',array(':postid'=>$postId,':userid'=>$likerId))){
						$iLiked = 0;
		} else {
			$iLiked = 1;
		}
		echo "{";
			echo '"ILiked":';
			echo $iLiked;
		echo "}";
		
	} else if ($_GET['url'] == "upload") {
		$formname = $_GET['formname'];

		$query = "UPDATE posts SET postimg=:postimg WHERE id=:postid";
		if(isset($_POST["image"])) {
			$data = $_POST["image"];
		
			$image_array_1 = explode(";",$data);
		
			$image_array_2 = explode(",", $image_array_1[1]);
		
			$data = base64_decode($image_array_2[1]);
	
			$imageName = time().'.png';
			
			file_put_contents($imageName,$data);
	
			//$image_file = addslashes(file_get_contents($imageName));
				
			//$db->query('UPDATE posts SET postimg=:postimg WHERE id=:postid', array (':postimg'=>$imgpost,':postid'=>$postid));
			$folder='./img_posts/';
			$final_file = ''.$imageName.'';
			$new_loc = $folder.$final_file;
			
			if(copy($final_file,'../img_posts/'.$final_file)) {
				
			//move_uploaded_file($final_file,$folder.$final_file);
				$imageName = $new_loc;
				unlink($final_file);
				//$preparams = array($formname=>$new_loc);
			
				//$params = $preparams + $params;
	
				//$db->query($query,$params);
		
	
		
				echo $imageName;
			}
		}

	} else if  ($_GET['url'] == "forgot-password")  {
		//include('../classes/DB.php');
		//require_once('../classes/Mail.php');

		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		
		
		
		$cstrong = True;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		//$email = $_POST['email'];
		$email = $postBody->email;
		$user_id = $db->query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
		
		$db->query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id, :email, NOW())', array(':token'=>sha1($token), ':user_id'=>$user_id, ':email'=>$email));
		//Mail::sendMail('Forgot Password', "<a href='https://example.co.za/change-password.php?token=$token'>Click here to reset your password</a>", $email);
		//echo "Email Sent!";
		//header('Location: change-password?token='.$token.'');
		//exit();
		echo $token;
	} else if  ($_GET['url'] == "change-password")  {
		$token = $_GET['token'];
		//Login::isLoggedIn();
		//the token we are getting is from the ajax request and has already been encrypted with sha1, so we dont have to encrypt it again, if it wasnt we would encrypt it again
		//before using it in the array below
		$userid = $db->query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>$token))[0]['user_id'];


		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
				
		
		if ($userid) {
			//if (isset($_POST['changepassword'])) {
			
		$oldpassword =$postBody->oldpassword;
		$newpassword =$postBody->newpassword; 
		$newpasswordrepeat = $postBody->newpasswordrepeat;
		//$userid = Login::isLoggedIn();
		
				if (password_verify($oldpassword, $db->query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {
					
					if ($newpassword == $newpasswordrepeat){
						
						if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
									
									$db->query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT),':userid'=>$userid));
								
									
									echo "{Success: You've successfully changed your Password}";
									http_response_code(200);
						}
								//$passwordmatch = True;
								
					} else {
								$passwordmatch = False;
								//echo "Passwords do not match!";
								echo "{Error: Passwords do not match!}";
								http_response_code(401);
					}
			
				} else {
					$currentPass = "Current Password Incorrect";
					//echo "Current Password Incorrect";
					echo "{Error: Current Password Incorrect}";
					http_response_code(401);
				}	
			//}
		} else if (!$userid) {
			
			if (isset($_GET['token'])) {
				$token = $_GET['token'];
				if ($db->query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))){
				$userid = $db->query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
				$tokenIsValid = True;
				
			

				//$newpassword = $_POST['newpassword'];
				//$newpasswordrepeat = $_POST['newpasswordrepeat'];
			
					if ($newpassword == $newpasswordrepeat){
						
						if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
									
							$db->query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT),':userid'=>$userid));
											
							echo "{Success: You've successfully changed your Password}";
							http_response_code(200);
							$db->query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
						}
						
					} else {
						$passwordmatch = False;
						echo "{Error: Passwords do not match!}";
						http_response_code(401);
					}
			
			
				
						
				} else {
					echo '{"Error": "Invalid token"}';
					http_response_code(400);
				}
			
			}
		
		} else {
				
			echo '{"Error": "Invalid User"}';
			http_response_code(400);
		}
	

	} else if ($_GET['url'] == "signout") {
		//require_once('../classes/DB.php');
		//require_once('../classes/Login.php');
		$token = $_COOKIE['SNID'];
		
		$userId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		$alldevices = $postBody->alldevices;
		if (isset($token)) {
			if ($userId) {
				if ($alldevices == 'yes') {
					//$db->query('DELETE FROM login_token WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
					$db->query('DELETE FROM login_token WHERE user_id=:userid', array(':userid'=>$userId));
					echo '{"Success": "Signing out of all devices"}';
					http_response_code(200);
		
				} else if ($alldevices == 'no') {
						if (isset($_COOKIE['SNID'])) {
							$db->query('DELETE FROM login_token WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
							echo '{"Success": "Signing out"}';
							http_response_code(200);
						}
						setcookie('SNID', '1', time()-3600);
						setcookie('SNID_', '1'. time()-3600);
						
				}
			} else {
				echo '{"Error": "Invalid User"}';
				http_response_code(400);
			}
	
		} else {
			echo '{"Error": "Invalid Token"}';
			http_response_code(400);
		}
	} else if ($_GET['url'] == "likes") {
		//require_once('../classes/DB.php');
		require_once('../classes/Login.php');
		require_once('../classes/Notify.php');

		$postId = $_GET['id'];
		$token = $_COOKIE['SNID'];
		
		$postBody = $db->query('SELECT body FROM posts WHERE id=:postid',array(':postid'=>$postId))[0]['body'];
		$likerId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		

					
		if (!$db->query('SELECT user_id FROM post_likes WHERE post_id=:postid AND user_id=:userid', array(':postid'=>$postId, ':userid'=>$likerId))) {
						$db->query('UPDATE posts SET likes=likes+1 WHERE id=:postid', array(':postid'=>$postId));
						$db->query('INSERT INTO post_likes VALUES (\'\', :postid, :userid)', array(':postid'=>$postId, ':userid'=>$likerId));
						Notify::createNotify("", $postId, $postBody);
						//$iLiked = 0;
					} else {
							$db->query('UPDATE posts SET likes=likes-1 WHERE id=:postid', array(':postid'=>$postId));
						$db->query('DELETE FROM post_likes WHERE post_id=:postid AND user_id=:userid', array(':postid'=>$postId, ':userid'=>$likerId));
						//$iLiked = 1;
					
					}
					//if (!$db->query('SELECT post_id FROM post_likes WHERE post_id=:postid AND user_id=:userid',array(':postid'=>$postId,':userid'=>$likerId))){
						//$iLiked = 0;
					//}
					$likes = $db->query('SELECT likes FROM posts WHERE id=:postid', array(':postid'=>$postId))[0]['likes'];
					echo "{";
					echo '"Likes":';
					echo $db->query('SELECT likes FROM posts WHERE id=:postid', array(':postid'=>$postId))[0]['likes'];
					//echo '"ILiked":';
					//echo $iLiked;
					echo "}";
				//$response = "[";
					
					//$response .= "{";
						//$response .= '"Likes": '.$likes.'';
						//$response .= '"ILiked": '.$iLiked.'';
					//$response .= "},";

					//$response = substr($response, 0, strlen($response)-1);
				//$response .= "]";
	
				//http_response_code(200);
				//echo $response;
		} else if ($_GET['url'] == "follow") {
			require_once('../classes/Login.php');
			require_once('../classes/Notify.php');
			
			$token = $_COOKIE['SNID'];
			$followerid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];

			$postBody = file_get_contents("php://input");
			$postBody = json_decode($postBody);
		
			$username = $postBody->username;
			$follow_btnId = $postBody->follow_btnId;
			
			$userid = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];

			$senderId = $followerid;
			$receiverId = $userid;
			if ($follow_btnId =="follow-profile-btn") {

				if ($userid != $followerid) {

		

					if(!$db->query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
						$db->query('INSERT INTO followers VALUES (\'\', :userid, :followerid, NOW())', array(':userid'=>$userid, ':followerid'=>$followerid));
						
						Notify::createFollowNotify($senderId,$receiverId);
					} else {
						echo 'Already following';
					}
					$isFollowing = "True";
					echo $isFollowing;
				}
			}

			if ($follow_btnId =="unfollow-profile-btn") {
			
				if ($userid != $followerid) {

					if($db->query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
						$db->query('DELETE FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid));
					} 
					$isFollowing = "False";
					echo $isFollowing;
				}
			}
		
			if($db->query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
				
					//echo 'Already following';
					$isFollowing = "True";
					echo $isFollowing;
			}
		
							
		} else if ($_GET['url'] == "viewednotif") {
			$token = $_COOKIE['SNID'];
		
			$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];

			$seen = 1;
			$notseen = 0; 
			//seen = 0 is no and seen = 1 is yes
		
			$db->query('UPDATE notifications SET notifications.notification_seen=:seen WHERE notifications.receiver=:userid AND notifications.notification_seen=:notseen', array(':userid'=>$userid,':seen'=>$seen,':notseen'=>$notseen));
			$notifications = $db->query('SELECT notifications.id, notifications.type, notifications.receiver, notifications.sender, notifications.extra, notifications.notification_seen FROM notifications WHERE notifications.receiver=:userid and notifications.notification_seen=:seen', array(':userid'=>$userid,':seen'=>$notseen));
			$numberofnotif = sizeof($notifications);
			//echo 'There are '.$numberofnotif.' rows in the table';
			echo "{";
				echo '"Notifications":';
				echo $numberofnotif;
					
			echo "}";
		
		} else if ($_GET['url'] == "deletepost") {
		$token = $_COOKIE['SNID'];
		$userId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$postId = $_GET['postid'];
		
		$poster = $db->query('SELECT user_id FROM posts WHERE id=:postid', array(':postid'=>$postId))[0]['user_id'];	
		
		if ($db->query('SELECT id FROM posts WHERE id=:postid AND user_id=:userid', array(':postid'=>$postId,':userid'=>$userId))) {
			if ($poster == $userId) {
				$db->query('DELETE FROM posts WHERE id=:postid AND user_id=:userid', array(':postid'=>$postId,':userid'=>$userId));
				$db->query('DELETE FROM post_likes WHERE post_id=:postid', array(':postid'=>$postId));
				echo 'Your post '.$postId.' has been deleted';
			}
		}
		
		} else if ($_GET['url'] == "editedposts") {
		$token = $_COOKIE['SNID'];
		
		$userId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$postId = $_GET['postid'];
		$subject = 'Maths';
		$grade = 12;
		
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		
		$body = $postBody->body;
		$poster = $postBody->poster;
		$imgpost = $postBody->imgpost;
		
		if ($body != "") {
		$db->query('UPDATE posts SET body=:postbody WHERE id=:postid AND user_id=:userid', array(':postbody'=>$body, ':userid'=>$userId,':postid'=>$postId));
		
		
		if ($imgpost != "") {
			$db->query('UPDATE posts SET postimg=:postimg WHERE id=:postid', array (':postimg'=>$imgpost,':postid'=>$postId));
			}	
		} else {
		 echo "Please enter post";	
		}
        } else if ($_GET['url'] == "reportpost") {
		$token = $_COOKIE['SNID'];
		
		$reporterId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
				

		$postId = $_GET['postid'];

		$followingposts = $db->query('SELECT posts.user_id, posts.posted_at, posts.body, posts.postimg, posts.likes FROM posts WHERE posts.id =:postid', array(':postid'=>$postId));
		$posterId = $followingposts[0]['user_id'];
		$reportBody = file_get_contents("php://input");
		$reportBody = json_decode($reportBody);
		
		//$reporttype = $_POST['myCheckboxes'];
		
		$reporttype = $reportBody->myCheckboxes;
		//$poster = $postBody->poster;
		//$imgpost = $postBody->imgpost;
		
		//if ($body != "") {
		$db->query('INSERT INTO reports VALUES (\'\', :reporttype, :postid, :posterid, :reporterid, NOW())', array(':postid'=>$postId, ':posterid'=>$posterId, ':reporterid'=>$reporterId,':reporttype'=>$reporttype));
		
		//$reportId = $db->query('SELECT id FROM reports WHERE reporter_id=:reporterid AND post_id=:postid ORDER BY ID DESC LIMIT 1;', array(':reporterid'=>$reporterId,':postid'=>$postId))[0]['id'];
		
		echo "You successfully reported this post, our review team will get back to you";
		
		
		
		
        } else if ($_GET['url'] == "createpost") {
		require_once('../classes/Login.php');
		require_once('../classes/Notify.php');

		$token = $_COOKIE['SNID'];
		
		$userId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		$subject = 'Maths';
		$grade = 12;
		
		$postBody = file_get_contents("php://input");
		$postBody = json_decode($postBody);
		
		$body = $postBody->body;
		$poster = $postBody->poster;
		$imgpost = $postBody->imgpost;
		
		if ($body != "") {
		$db->query('INSERT INTO posts VALUES (\'\', :postbody, NOW(), :userid, 0, :subject, :grade, \'NULL\', \'0\')', array(':postbody'=>$body, ':userid'=>$userId, ':subject'=>$subject, ':grade'=>$grade));
		
		$postid = $db->query('SELECT id FROM posts WHERE user_id=:userid ORDER BY ID DESC LIMIT 1;', array(':userid'=>$userId))[0]['id'];
		Notify::createNotify($body,$postid,$body);
		
		
		
		
		if ($imgpost != "") {
			$db->query('UPDATE posts SET postimg=:postimg WHERE id=:postid', array (':postimg'=>$imgpost,':postid'=>$postid));
			Notify::createNotify($body,$postid,$body);
			}	
		} else {
		 echo "Please enter post";	
		}
        } else if ($_GET['url'] == "createcomment") {
		require_once('../classes/Login.php');
		require_once('../classes/Notify.php');
		//$commentId = $_GET['id'];	
		$token = $_COOKIE['SNID'];
		
		$userId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		$commentBody = file_get_contents("php://input");
		$commentBody = json_decode($commentBody);
		
		$body = $commentBody->body;
		$commenter = $commentBody->commenter;
		$imgcomment = $commentBody->imgcomment;
		$postId = $_GET['postid'];
		//if ($userid == $commenter) {
		
			//if ($imgcomment == "0") {
				if (!$db->query('SELECT id FROM posts WHERE id=:postid', array(':postid'=>$postId))) {
						echo 'Invalid post ID';
				 } else {
							$db->query('INSERT INTO comments VALUES (\'\', :comment, :userid, NOW(), :postid, 0, \'\')', array(':comment'=>$body, ':userid'=>$userId, ':postid'=>$postId));
							
							$db->query('UPDATE posts SET commented =1 WHERE id=:postid', array(':postid'=>$postId));
							$commentId = $db->query('SELECT comments.id FROM comments WHERE post_id=:postid AND user_id=:userid ORDER BY posted_at DESC', array(':postid'=>$postId, ':userid'=>$userId))[0]['id'];
							
							Notify::createcmNotify($body, $commentId,$body);
				 }
			//} //"else {" (for image comment comes here)
			
			//"}" the end of the image comment code
					//} else {
							//die('Incorrect User');
							//}
		
		
		
		// uncomment "else {" (this will be for if the comment has an image or  not)
		// insert image comment code here then insert code from Image::upload image here too see below code
		//$commentid = Comment::createImgComment($_POST['commentbody'], $_GET['postid'], $userid);	
					//Image::uploadImage('commentimg', "UPDATE comments SET commentimg=:commentimg WHERE id=:commentid", array (':commentid'=>$commentid));
		// uncomment the closing tag for the else part of the if statement here: "}"

	 } else if ($_GET['url'] == "likedcomment") {
		$commentId = $_GET['id'];
		$token = $_COOKIE['SNID'];
		
		$likerId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		if (!$db->query('SELECT comment_id FROM comment_likes WHERE comment_id=:commentid AND user_id=:userid',array(':commentid'=>$commentId,':userid'=>$likerId))){
						$iLiked = 0;
		} else {
			$iLiked = 1;
		}
		echo "{";
			echo '"ILiked":';
			echo $iLiked;
		echo "}";
		
	} else if ($_GET['url'] == "commentlikes") {
		//require_once('../classes/DB.php');
		require_once('../classes/Login.php');
		require_once('../classes/Notify.php');

		$commentId = $_GET['id'];
		$token = $_COOKIE['SNID'];

		$postId = $db->query('SELECT post_id FROM comments WHERE id=:commentid',array(':commentid'=>$commentId))[0]['post_id'];
		$commentBody = $db->query('SELECT comment FROM comments WHERE id=:commentid',array(':commentid'=>$commentId))[0]['comment'];
		$likerId = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
		
		if (!$db->query('SELECT user_id FROM comment_likes WHERE comment_id=:commentid AND user_id=:userid', array(':commentid'=>$commentId, ':userid'=>$likerId))) {
						$db->query('UPDATE comments SET likes=likes+1 WHERE id=:commentid', array(':commentid'=>$commentId));
						$db->query('INSERT INTO comment_likes VALUES (\'\', :commentid, :userid)', array(':commentid'=>$commentId, ':userid'=>$likerId));
						Notify::createcmNotify("", $commentId,$commentBody);
					} else {
							$db->query('UPDATE comments SET likes=likes-1 WHERE id=:commentid', array(':commentid'=>$commentId));
						$db->query('DELETE FROM comment_likes WHERE comment_id=:commentid AND user_id=:userid', array(':commentid'=>$commentId, ':userid'=>$likerId));
						
					
					}
					echo "{";
					echo '"Likes":';
					echo $db->query('SELECT likes FROM comments WHERE id=:commentid', array(':commentid'=>$commentId))[0]['likes'];
					echo "}";
		} 
} else if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
		if ($_GET['url'] == "auth") {
				if (isset($_GET['token'])) {
						if ($db->query("SELECT token FROM login_token WHERE token=:token", array(':token'=>sha1($_GET['token'])))) {
							$db->query('DELETE FROM login_token WHERE token=:token', array(':token'=>sha1($_GET['token'])));
							echo '{"Status": "Success"}';
							http_response_code(200);
						} else {
							echo '{"Error": "Invalid token"}';
							http_response_code(400);
							}
					} else {
						echo '{"Error": "Mal-formed request"}';
						http_response_code(400);
						}
		}

} else {
	http_response_code(405);	
}

?>
