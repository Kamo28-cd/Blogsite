<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';



/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

//autoload my classes start
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

//autoload my classes end

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
