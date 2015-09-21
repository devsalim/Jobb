<?php

Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@home');
Route::get('login', 'PagesController@login');
Route::get('about', 'PagesController@about');

Route::controllers([
	'auth'		=>	'Auth\AuthController',
	'password'	=>	'Auth\PasswordController',
]);

Route::post('individual/store', 'UserController@store');
Route::post('corporate/store', 'CorporateController@store');

Route::group(array('before' => 'auth'), function(){

	Route::get('master', 'PagesController@master');
	Route::get('mypost', 'PagesController@myPost');

	Route::get('individual', 'UserController@index');
	Route::get('individual/create', 'UserController@create');
	Route::post('individual/update/{id}', 'UserController@update');
	Route::post('individual/basicupdate', 'UserController@basicUpdate');

	Route::get('corporate', 'CorporateController@index');
	Route::get('corporate/create', 'CorporateController@create');
	Route::post('corporate/update/{id}', 'CorporateController@update');
	Route::post('corporate/basicupdate', 'CorporateController@basicUpdate');

	Route::get('job', 'JobController@index');
	Route::get('job/create', 'JobController@create');
	Route::post('job/store', 'JobController@store');
	Route::post('job/update', 'JobController@update');

	Route::get('skill', 'SkillController@index');
	Route::get('skill/create', 'SkillController@create');
	Route::post('skill/store', 'SkillController@store');
	Route::post('skill/update', 'SkillController@update');

	Route::get('invitefriend', 'InvitefriendController@index');
	Route::get('invitefriend/create', 'InvitefriendController@create');
	Route::post('invitefriend/store', 'InvitefriendController@store');
	Route::post('invitefriend/update', 'InvitefriendController@update');

	Route::get('creategroup', 'CreategroupController@index');
	Route::get('creategroup/create', 'CreategroupController@create');
	Route::post('creategroup/store', 'CreategroupController@store');
	Route::post('creategroup/update', 'CreategroupController@update');

	Route::post('user/imgUpload', 'UserController@imgUpload');	

	Route::get('feedback', 'FeedbackController@index');
	Route::get('feedback/create', 'FeedbackController@create');
	Route::post('feedback/store', 'FeedbackController@store');
	Route::post('feedback/update', 'FeedbackController@update');

});

Route::get('fillitlater', 'PagesController@fillItLater');

