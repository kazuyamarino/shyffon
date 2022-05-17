<?php
/**
* Environment Variables
*/
return [

	/*
	| Define Environment - Select 'development' or 'production' mode
	*/
	'APP_ENV' => 'development',

	/*
	| Define Application Directory
	*/
	'APP_DIR' => 'shyffon',

	/*
	| Define Session Prefix
	*/
	'SESSION_PREFIX' => '',

	/*
	| Define Public directory name
	*/
	'PUBLIC_DIR' => 'public',

	/*
	| Define FTP Variables
	*/
	'FTP_HOST' => '',
	'FTP_USERNAME' => '',
	'FTP_PASSWORD' => '',

	/*
	| Database Connection
	| You can create your own database connection as you need.
	 */
	// Primary connection
	'primary' => [
		'DB_ATTR' => [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
		],
		'DB_CONNECTION' => '',
		'DB_HOST' => '',
		'DB_PORT' => '',
		'DB_NAME' => '',
		'DB_USER' => '',
		'DB_PASS' => '',
		'DB_CHARSET' => '',
		'DB_PREFIX' => ''
	],

	// Secondary connection
	'secondary' => [
		'DB_ATTR' => [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
		],
		'DB_CONNECTION' => '',
		'DB_HOST' => '',
		'DB_PORT' => '',
		'DB_NAME' => '',
		'DB_USER' => '',
		'DB_PASS' => '',
		'DB_CHARSET' => '',
		'DB_PREFIX' => ''
	]

];
