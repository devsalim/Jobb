<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'facebook' => [
	    'client_id' => '1679926718913960',
	    'client_secret' => '00bd52740edb628da4d946b9bb0072b1',
	    'redirect' => 'http://jobtip.dev/user/fb',
	],

	'google' => [
	    'client_id' => '602994102978-9q9fl6qdr0kmearg4fr867gmj5gib0c3.apps.googleusercontent.com',
	    'client_secret' => '6Hf_gBXJvEgZdvexsVx9Ob00',
	    'redirect' => 'http://jobtip.dev/user/gp',
	],

];
