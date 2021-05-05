<?php
require_once("../api/DB.php");


class Notify {
		public static function createNotify($text = "", $postid = 0, $textbody = "") {
					
					$db = new DB("127.0.0.1", "blogsite", "root", "");
					$text = explode(" ", $text);
					$textbody = explode(" ", $textbody);
					$notify = array();
					
					foreach ($text as $word) {
							if (substr($word, 0, 1) == "@") {
								$notify[substr($word, 1)] = array("type"=>1, "extra"=>' {"postbody": "'.htmlentities(implode($text, " ")).'"}');
								$r_name = substr($word, 1);
								//SELECT posts.user_id AS sender FROM posts WHERE (posts.id = :postid)	
								$temp = $db->query('SELECT posts.user_id AS sender FROM posts WHERE (posts.id = :postid)', array(':postid'=>$postid));
								$r = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$r_name))[0]['id'];
								$s = $temp[0]["sender"];
								$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', NOW(), :postid)', array(':type'=>1, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"postbody": "'.htmlentities(implode($textbody, " ")).'"}', ':postid'=>$postid));	
							}
					}
						
						if (count($text) == 1 && $postid != 0) {
							$temp = $db->query('SELECT posts.user_id AS receiver, post_likes.user_id AS sender FROM posts, post_likes WHERE posts.id = post_likes.post_id AND posts.id=:postid', array(':postid'=>$postid));
							$r = $temp[0]["receiver"];
							$s = $temp[0]["sender"];
							$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', NOW(), :postid)', array(':type'=>2, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"postbody": "'.htmlentities(implode($textbody, " ")).'"}', ':postid'=>$postid));
							}
						
						return $notify;
				
		}
		public static function createcmNotify($text = "", $commentid = 0, $textbody = "") {
					
					$db = new DB("127.0.0.1", "blogsite", "root", "");
					$text = explode(" ", $text);
					$textbody = explode(" ", $textbody);
					$notify = array();
					//date_default_timezone_set("Africa/Johannesburg");
					//$date = date("Y-m-d H:i:s");
					$date = 'NOW()';
					$postid = $db->query('SELECT comments.post_id FROM comments WHERE comments.id=:commentid', array(':commentid'=>$commentid))[0]['post_id'];
					
					foreach ($text as $word) {
							if (substr($word, 0, 1) == "@") {
								
								$notify[substr($word, 1)] = array("type"=>3, "extra"=>' {"commentbody": "'.htmlentities(implode($text, " ")).'"}');
								
								$r_name = substr($word, 1);	
								//SELECT comments.user_id AS sender, posts.user_id AS receiver FROM comments, posts WHERE (comments.post_id = posts.id AND comments.id = 6)
								$temp = $db->query('SELECT comments.user_id AS sender, posts.user_id AS receiver FROM comments, posts WHERE (comments.post_id = posts.id AND comments.id=:commentid)', array(':commentid'=>$commentid));
								
								$r = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$r_name))[0]['id'];
								$s = $temp[0]["sender"];
								$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', NOW(), :postid)', array(':type'=>3, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"commentbody": "'.htmlentities(implode($textbody, " ")).'"}', ':postid'=>$postid));	
							} else {
								//currently you get both mention notifications and comment notifications for the same comment but if you decide to have either a comment or a mention instead of both comment and mention notifications of the same comments then uncomment the following out and change date from $date = now() to the uncommented date format and uncomment timezone setting too
								//$notifyid = $db->query('SELECT id FROM notifications WHERE notification_date=:date', array(':date'=>$date))[0]['id'];
								//print($notifyid);
								//if($notifyid ==0 ) {
									//$notify[substr($word, 1)] = array("type"=>6, "extra"=>' {"commentbody": "'.htmlentities(implode($text, " ")).'"}');
								
									//$r_name = substr($word, 1);
									//$temp = $db->query('SELECT comments.user_id AS sender, posts.user_id AS receiver FROM comments, posts WHERE (comments.post_id = posts.id AND comments.id=:commentid)', array(':commentid'=>$commentid));
								
									//$r = $temp[0]["receiver"];
									//$s = $temp[0]["sender"];
									//$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', :date, :postid)', array(':type'=>6, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"commentbody": "'.htmlentities(implode($textbody, " ")).'"}',':date'=>$date, ':postid'=>$postid));
								//}
								
							}
					}
						if (count($text) != 1 && $commentid != 0) {
							$notify[substr($word, 1)] = array("type"=>6, "extra"=>' {"commentbody": "'.htmlentities(implode($text, " ")).'"}');
								
							$r_name = substr($word, 1);
							$temp = $db->query('SELECT comments.user_id AS sender, posts.user_id AS receiver FROM comments, posts WHERE (comments.post_id = posts.id AND comments.id=:commentid)', array(':commentid'=>$commentid));
								
							$r = $temp[0]["receiver"];
							$s = $temp[0]["sender"];
							$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', NOW(), :postid)', array(':type'=>6, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"commentbody": "'.htmlentities(implode($textbody, " ")).'"}', ':postid'=>$postid));
								
						}
						if (count($text) == 1 && $commentid != 0) {
							$temp = $db->query('SELECT comments.user_id AS receiver, comment_likes.user_id AS sender FROM comments, comment_likes WHERE comments.id = comment_likes.comment_id AND comments.id=:commentid', array(':commentid'=>$commentid));
							$r = $temp[0]["receiver"];
							$s = $temp[0]["sender"];
							$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', NOW(), :postid)', array(':type'=>4, ':receiver'=>$r, ':sender'=>$s, ':extra'=>'{"commentbody": "'.htmlentities(implode($textbody, " ")).'"}', ':postid'=>$postid));
						}
						
						return $notify;
				
		}
		public static function createFollowNotify($senderId = 0, $receiverId = 0) {
					
					$db = new DB("127.0.0.1", "studenthub", "root", "");
					$now_date = 'NOW()';
					$db->query('INSERT INTO notifications VALUES (\'\', :type, :receiver, :sender, :extra, \'\', \'\', :date, \'\')', array(':type'=>5, ':receiver'=>$receiverId, ':sender'=>$senderId, ':extra'=>'', ':date'=>$now_date));
					//$notify_id = $db->query('SELECT id FROM notifications WHERE sender=:sender, receiver=:receiver, notification_date=:date', array(':receiver'=>$receiverId, ':sender'=>$senderId, ':date'=>$now_date));
					$notify = array("type"=>5, "date"=>$now_date);
					
					return $notify;
		}
	}
?>

