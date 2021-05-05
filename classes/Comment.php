<?php

include('./classes/Login.php');
include('./classes/Image.php');
include('./classes/Notify.php');

class Comment {
	public static function createComment($commentBody, $postId,$loggedInUserId, $profileUserId) {
		
					if (strlen($commentBody) > 500 || strlen($commentBody) < 1) {
						die('Incorrect length no image');
					}
					
					if ($loggedInUserId == $profileUserId) {
						
						if (count(Notify::createNotify($commentBody)) !=0) {
								foreach(Notify::createNotify($commentBody) as $key => $n) {
										$s = $loggedInUserId;
										$r = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$key))[0]['id'];
										if ($r != 0) {
										DB::query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra)', array(':type'=>$n["type"], ':receiver'=>$r, ':sender'=>$s, ':extra'=>$n["extra"]));
										}
									}
							}
					
					if (!DB::query('SELECT id FROM posts WHERE id=:postid', array(':postid'=>$postId))) {
						echo 'Invalid post ID';
						} else {
							DB::query('INSERT INTO comments VALUES (\'\', :comment, :userid, NOW(), :postid, 0, \'\')', array(':comment'=>$commentBody, ':userid'=>$userId, ':postid'=>$postId));
							
							DB::query('UPDATE posts SET commented =1 WHERE id=:postid', array(':postid'=>$postId));
							}
					} else {
							die('Incorrect User');
							}
		}
	public static function createImgComment($commentBody, $postId,$loggedInUserId, $userId) {
		
					if (strlen($commentBody) > 500) {
						die('Incorrect length with image');
					}
					
					if ($loggedInUserId == $profileUserId) {
						
						if (count(Notify::createNotify($commentBody)) !=0) {
								foreach(Notify::createNotify($commentBody) as $key => $n) {
										$s = $loggedInUserId;
										$r = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$key))[0]['id'];
										if ($r != 0) {
										DB::query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra)', array(':type'=>$n["type"], ':receiver'=>$r, ':sender'=>$s, ':extra'=>$n["extra"]));
										}
									}
							}
					
					if (!DB::query('SELECT id FROM posts WHERE id=:postid', array(':postid'=>$postId))) {
						echo 'Invalid post ID';
						} else {
							DB::query('INSERT INTO comments VALUES (\'\', :comment, :userid, NOW(), :postid, 0, \'\')', array(':comment'=>$commentBody, ':userid'=>$userId, ':postid'=>$postId));
							DB::query('UPDATE posts SET commented =1 WHERE id=:postid', array(':postid'=>$postId));
							
							$commentid = DB::query('SELECT id FROM comments WHERE user_id=:userid ORDER BY ID DESC LIMIT 1;', array(':userid'=>$userId))[0]['id'];
						return $commentid;
						
						}
					} else {
							die('Incorrect User');
							}
		}
		
		public static function link_add($text) {
					
					$text = explode(" ", $text);
					$newstring = "";
					
					foreach ($text as $word) {
							if (substr($word, 0, 1) == "@") {
									
									$newstring .= "<a href='profile.php?username=".substr($word, 1)."'>".htmlspecialchars($word)."</a>";
								} else {
							$newstring .= htmlspecialchars($word)." ";
								}
						}
						
						
					return $newstring;
				}
		
		public static function displayComments($postId) {
			
			$comments = DB::query('SELECT comments.comment, users.username FROM comments, users WHERE post_id = :postid AND comments.user_id = users.id', array(':postid'=>$postId));
			foreach($comments as $comment) {
				echo $comment['comment']." ~ ".$comment['username']."<hr />";
				}
			}
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>