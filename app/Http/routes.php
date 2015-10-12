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


	Route::get('job/skillSearch', 'JobController@skillSearch');
	Route::get('job', 'JobController@index');
	Route::get('job/create', 'JobController@create');
	Route::post('job/store', 'JobController@store');
	Route::post('job/update', 'JobController@update');
	Route::post('job/like', 'JobController@postLike');
	Route::post('job/fav', 'JobController@postFav');
	Route::post('job/apply', 'JobController@postApply');
	Route::post('job/contact', 'JobController@postContact');

	Route::get('skill', 'SkillController@index');
	Route::get('skill/create', 'SkillController@create');
	Route::post('skill/store', 'SkillController@store');
	Route::post('skill/update', 'SkillController@update');

	Route::get('connections', 'ConnectionsController@index');
	Route::get('connections/create', 'ConnectionsController@create');
	Route::post('connections/store', 'ConnectionsController@store');
	Route::post('connections/update', 'ConnectionsController@update');
	Route::post('connections/inviteFriend/{id}', 'ConnectionsController@inviteFriend');
	Route::post('connections/destroy/{id}', 'ConnectionsController@destroy');
	Route::post('connections/response/{id}', 'ConnectionsController@response');
	
	Route::get('group', 'GroupController@index');
	Route::get('group/create', 'GroupController@create');
	Route::post('group/store', 'GroupController@store');
	Route::post('group/update', 'GroupController@update');
	Route::post('group/destroy/{id}', 'GroupController@destroy');
	Route::get('group/{id}', 'GroupController@detail');
	Route::post('group/adduser', 'GroupController@addUser');	
	Route::post('group/deleteuser', 'GroupController@deleteUser');

	Route::post('user/imgUpload', 'UserController@imgUpload');	
	Route::post('corporate/imgUpload', 'CorporateController@imgUpload');	

	Route::get('feedback', 'FeedbackController@index');
	Route::get('feedback/create', 'FeedbackController@create');
	Route::post('feedback/store', 'FeedbackController@store');
	Route::post('feedback/update', 'FeedbackController@update');

	Route::post('searchConnections', 'ConnectionsController@searchConnections');

	Route::get('individual_view', 'ViewpageController@index');
	Route::get('individual_view/create', 'ViewpageController@create');
	Route::get('individual/edit_view', 'ViewpageController@edit_view');	

});


