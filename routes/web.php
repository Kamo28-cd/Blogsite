<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/signout', function() {

        return view('signout');
	
	//SignOut::CreateView('SignOut');
});
Route::get('/signin', function() {

        return view('signin');
		//SignIn::CreateView('SignIn');
});
$variable = '';

Route::get('/', function() {
	
	if (Login::isLoggedIn()) {
		//$userid = Login::isLoggedIn();
		//Index::CreateView('Index');
		return view('home');
		
	} else {
		//SignIn::CreateView('SignIn');
		//echo 'not logged in';
		return view('signin');
	}
		
});
Route::get('/home', function() {
	
	if (Login::isLoggedIn()) {
		//$userid = Login::isLoggedIn();
		//Index::CreateView('Index');
		return view('home');
		
	} else {
		//SignIn::CreateView('SignIn');
		//echo 'not logged in';
		return view('signin');
	}
		
});

Route::get('/forgot-password', function() {

        return view('forgot-password');
		//ForgotPassword::CreateView('ForgotPassword');
});

Route::get('/change-password', function() {

        return view('change-password');
		
		//ChangePassword::CreateView('ChangePassword');
});

Route::get('/posts', function() {

        return view('posts');
		
		//Posts::CreateView('Posts');
});
