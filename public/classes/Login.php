<?php
require_once("DB2.php");
class Login {
	
	public static function isLoggedIn() {
	$db = new DB2("127.0.0.1", "blogsite", "root", "");
	if (isset($_COOKIE['SNID'])) {
		if ($db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))) {
			$userid = $db->query('SELECT user_id FROM login_token WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id'];
			
			if (isset($_COOKIE['SNID_'])) {
			
				return $userid;
			} else {
					$cstrong = True;
					$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
					$db->query('INSERT INTO login_token VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
					$db->query('DELETE FROM login_token WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
					//change the second NULL in next line to TRUE
					setcookie("SNID", $token, time() + 60*60*24*7,'/',NULL, TRUE,TRUE);
					setcookie("SNID_", '1',time() + 60*60*24*3,'/',NULL, TRUE,TRUE);
					
					return $userid;
				
				}
			
			}
		
		}
		
		return false;
	
	}
	
	
	
}
?>