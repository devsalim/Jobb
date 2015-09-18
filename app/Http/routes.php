<?php

Route::get('about', 'PagesController@about');
Route::get('login', 'PagesController@login');
Route::get('home', 'PagesController@home');
Route::get('/', 'PagesController@index');
Route::controllers([
	'auth'		=>	'Auth\AuthController',
	'password'	=>	'Auth\PasswordController',
]);
Route::post('professionalDetail', 'PagesController@professionalDetail');
Route::get('professionalDetail', 'PagesController@professionalDetail');
Route::get('professional_page', 'PagesController@professionalDetailMain');
Route::post('firmDetail', 'PagesController@firmDetail');
Route::get('firmDetail', 'PagesController@firmDetail');
Route::get('firm_details', 'PagesController@firmDetailMain');
Route::get('mypostnew', 'PagesController@mypost');
Route::get('postskill', 'PagesController@postskill');
Route::get('postjobupdate', 'PagesController@newPost');
Route::get('master', 'PagesController@master');
Route::post('register', 'UserController@store');
Route::post('updateProfessionalDetail', 'UserController@updateProfessionalDetail');
Route::get('fillitlater', 'PagesController@fillItLater');
Route::post('registerCorp', 'UserController@storeCorp');
Route::post('updateFirmDetail', 'UserController@updateFirmDetail');