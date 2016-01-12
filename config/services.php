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
	    'client_id' => '1676295885993366',
	    'client_secret' => 'ab0753395dae30b2b6ffa053a363bd85',
	    'redirect' => 'http://jobtip.in/user/fb',
	],

	'google' => [
	    'client_id' => '977947078684-4jiokgir292r0v10mav8ol0tcuqm29so.apps.googleusercontent.com',
	    'client_secret' => 'B5TJsGgMCBhoxCJ5JHKqDO8y',
	    'redirect' => 'http://jobtip.in/user/gp',
	],

	'linkedin' => [
	    'client_id' => '75fpui9szgs844',
	    'client_secret' => 'UlxmnXB6k7lEj4Mb',
	    'redirect' => 'http://jobtip.in/user/li',
	]

];
