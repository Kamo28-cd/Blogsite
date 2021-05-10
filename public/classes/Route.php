<?php
class Route {

	public static $validRoutes = array();

	public static function set($route, $function) {
		
		//$route= isset($_GET['url']) ? $_GET['url']:'home';
		self::$validRoutes[] = $route;
		if (isset($_GET['url'] )) {
			if ($_GET['url'] == $route) {
			
				$function->__invoke();
			
			} 
		} else {
			if (isset($_GET['url'] ) == $route) {
			
				$function->__invoke();
			
			} 
		}
	}
}


?>