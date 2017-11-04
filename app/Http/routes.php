<?php

// Home route
Route::get('/', array(	
		'as' =>'home',
		'uses' => 'HomeController@index'		
));


// route for the create short url
Route::post('/make', array(
		'as'=> 'make',
		'uses' => 'LinkController@make'
	));

//Sign Up

//Route::get('/register', 'UserController@register');

Route::get('/register', array(	
		'as' =>'register',
		'uses' => 'UserController@register'		
));

Route::post('/signup', [
  'uses' => 'UserController@postSignUp',
  'as' => 'signup'
]);

Route::post('/signin', [
  'uses' => 'UserController@postSignIn',
  'as' => 'signin'
]);

Route::get('/logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'logout',
  'middleware' => 'auth'
]);



//Get route to chage to full url
Route::get('/{code}', array(	
		'as' =>'get',
		'uses' => 'LinkController@get'	
));


//Link Data
Route::get('/link-details/{id}', array(	
		'as' =>'details',
		'uses' => 'HomeController@details'	
));


