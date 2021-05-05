<?php 

Route::set('signout', function() {
	
	SignOut::CreateView('SignOut');
});
Route::set('signin', function() {
		SignIn::CreateView('SignIn');
});
$variable = '';
Route::set($variable, function() {
	if (Login::isLoggedIn()) {
		//$userid = Login::isLoggedIn();
		Index::CreateView('Index');
	
		
	} else {
		SignIn::CreateView('SignIn');
		//echo 'not logged in';
	}
});
Route::set('home', function() {
	
	if (Login::isLoggedIn()) {
		//$userid = Login::isLoggedIn();
		Index::CreateView('Index');
	
		
	} else {
		SignIn::CreateView('SignIn');
		//echo 'not logged in';
	}
		
});

Route::set('forgot-password', function() {
		ForgotPassword::CreateView('ForgotPassword');
});

Route::set('change-password', function() {
		
		ChangePassword::CreateView('ChangePassword');
});

Route::set('posts', function() {
		
		Posts::CreateView('Posts');
});

?>