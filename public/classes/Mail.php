<?php
require_once('../PHPMailer/PHPMailerAutoload.php');
class Mail {
	public static function sendMail($subject,$body,$address) {
		$email = new PHPMailer();
		$email->IsSMTP();
		$email->SMTPAuth = true;
		$email->SMTPSecure = 'ssl';
		$email->Host = 'mail.example.co.za'; 
		$email->Port = '465';
		$email->IsHTML(true);
		$email->Username = 'no-reply@example.co.za';//insert email here
		$email->Password = '';//insert password here
		$email->From='no-reply@example.co.za';//insert from email here
		$email->FromName='Business';//insert business username here
		$email->Subject = $subject;
		$email->Body = $body;
		$email->AddAddress($address);


		$email->Send();
		if(!$email->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            
            return $error; 
	    http_response(400);
        }
        else 
        {
            $error = "Thank You !! Your email is sent."; 
	    return $error; 
            http_response(200);
            
        }
	}

}

?>