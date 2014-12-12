<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

YiiBase::setPathOfAlias('rest', realpath(__DIR__ . '/../extensions/yii-rest-api/library/rest'));
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Hito 2 - Desarrollo Web',
	'defaultController' => 'persona',
	// preloading 'log' component
	'preload'=>array('restService','log'),
//    'aliases' => array(
//        'RestfullYii' =>realpath(__DIR__ . '/../extensions/starship/RestfullYii'),
//	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),



	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
        'restService' => array(
            'class'  => '\rest\Service',
            'enable' => strpos($_SERVER['REQUEST_URI'], '/api/') !== false, // for example
        ),
        'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=> array(
                array('persona/index',  'pattern' => 'api/persona', 'verb' => 'GET', 'parsingOnly' => true),
                array('persona/create', 'pattern' => 'api/persona', 'verb' => 'POST', 'parsingOnly' => true),
                array('persona/view',   'pattern' => 'api/persona/<id>', 'verb' => 'GET', 'parsingOnly' => true),
                array('persona/view',   'pattern' => 'api/persona/ver/<nombre>', 'verb' => 'GET', 'parsingOnly' => true),
                array('persona/update', 'pattern' => 'api/persona/<id>', 'verb' => 'PUT', 'parsingOnly' => true),
                array('persona/delete', 'pattern' => 'api/persona/<id>', 'verb' => 'DELETE', 'parsingOnly' => true),
            ),
            'showScriptName'=>false,


        ),

        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=c9',
			'emulatePrepare' => true,
			'username' => 'elrodox',
			'password' => '',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);