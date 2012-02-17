<?php

return array(

	'basePath'=>__DIR__.DIRECTORY_SEPARATOR.'..',

	'name'=>'Mayflower Example Blog',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'abc',
			//'ipFilters'=>array('127.0.0.1','::1'),
			'ipFilters'=>array('*'),
		),
	),

	'components'=>array(

        'clientScript' => array(
            'coreScriptPosition' => CClientScript::POS_END,
        ),

		'user'=>array(
			'allowAutoLogin'=>true,
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
            //'showScriptName' => false,
			'rules'=>array(
                '' => 'site/index',
                'static/<view:\w+>' => 'site/page',
                'post:<id\w+>' => 'site/show',
			),
		),

		'db'=>array(
			'connectionString' => 'sqlite:'.__DIR__.'/../data/mayflowertest.db',
            'schemaCachingDuration' => 120,
		),

        'cache'=>array(
            'class'=>'system.caching.CXCache',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                //array(
                    //'class'=>'CWebLogRoute',
                //),
			),
		),
	),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
        'infobarLevels' => array(
            'error', 'success', 'info', 'warn'
        ),
	),

);
