<?php


//spl_autoload_register('PHPMailerAutoload', true, true)
function myAutoload($class_name) {
	if (file_exists('./classes/'.$class_name.'.php')) {
		require_once './classes/'.$class_name.'.php';
	} else if  (file_exists('./controller/'.$class_name.'.php')) {
		require_once './controller/'.$class_name.'.php';
	}
}

/*class Autoloader {
	public static function register() {
		spl_autoload_register(function($class_name) {
			$file = str_replace('\\', DIECTORY_SEPARATOR, $class_name).'.php';
			if (file_exists($file)) {
				require $file;
				return true;
			}
			return false;	
		});
	}
}
Autoloader::register();*/
spl_autoload_register('myAutoload'); 
	

require_once('Routes.php');	

/*$section= isset($_GET['section']) ? $_GET['section']:'home';



if ($section == 'about-us') {

	include('controller/aboutUs.php');
	
} else if ($section == 'contact-us') {

	include('controller/contactUs.php');

} else {
	include('controller/homePage.php');
}


*/

?>