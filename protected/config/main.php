<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii-news',
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    // Название темы
    'theme' => 'classic',
	// preloading 'log' component
	'preload'=>array('log'),

    'defaultController'=>'site',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.components.ImageHandler.CImageHandler',
        'application.components.CCApplicationComponent',
	),

	'modules'=>array(
        'user','auth',
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'6223772',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(

        'cache'=>array('class'=>'system.caching.CFileCache'),

        // CImageHandler
        'ih'=>array(
            'class'=>'CImageHandler',
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
                ''=>'site/index',

                '<slug:[\w-]+>_<id:\d+>_<controller:(news)>.html'=> '<controller>',
//                '<controller:(tag)>/<action:(list)>.html'=> '<controller><action>', // /<action:(Tags)>
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                '<slug:\w+>-<country:\w+>_<controller:(category)>_<page:\d+>.html'=> '<controller>',
                '<slug:\w+>-<country:\w+>_<controller:(category)>.html'=> '<controller>',
                '<slug:\w+>_<controller:(category)>_<page:\d+>.html'=> '<controller>',
                '<slug:\w+>_<controller:(category)>.html'=> '<controller>',

                '<slug:\w+>_<id:\d+><controller:(tag)>_<page:\d+>.html'=>'<controller>',
                '<slug:\w+>_<id:\d+><controller:(tag)>.html'=> '<controller>',

                '<country:\w+>-<controller:(people)>-<category:\w+>.html'=> '<controller>',

                '<country:\w+>-<controller:(people)>_<page:\d+>.html'=> '<controller>',
                '<country:\w+>-<controller:(people)>.html'=> '<controller>',

                '<controller:(people)>-<category:\w+>_<page:\d+>.html'=> '<controller>',
                '<controller:(people)>-<category:\w+>.html'=> '<controller>',
                '<slug:\w+>_<controller:(people)>_<action:(desc)>.html'=> '<controller>/desc',

                '<controller:(people)>_<page:\d+>.html'=> '<controller>',
                '<controller:(week|people)>.html'=> '<controller>',
                '<slug:\w+>.html'=> 'page',
			),
		),

		// uncomment the following to use a MySQL database


		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii-news',
			'emulatePrepare' => true,
			'username' => 'root',
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
                    'class'=>'CProfileLogRoute',
                    'levels'=>'profile',
                    'enabled'=>true,
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),
			),
		),
        'clientScript' => array(
            'class' => 'ext.minScript.components.ExtMinScript',
/*
            'scriptMap'=>array(
                'jquery.js'=>'/js/all.js',
                'jquery.easing.1.3.js'=>'/js/all.js',
                'functions.js'=>'/js/all.js',
                'lightbox.js'=>'/js/all.js',
                )
*/
        ),

        'assetManager'=>array(
            'basePath'=>realpath(dirname(dirname(dirname(__FILE__))).'/httpdocs/assets'),
        ),

        'messages'=>array(
            'class'            => 'DBCMessageSource',
            'forceTranslation' => true,
        ),

        'banners'=>array(
            'class'     => 'ext.banners.BannerInit'
        ),

        'page'=>array(
            'class'     => 'ext.page.PageInit'
        ),

        'textAnalysis'=>array(
            'class'     => 'ext.textAnalysis.AnalysisInit'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'baseUrl' => 'http://yii-news/',
        'images' => array(
            "default" => array(
                    "1" => array( 800, 800 ),
                    "2" => array( 200, 200 ),
                    "3" => array( 100, 100 )
                )
        ),
        "titleName"=>"Новостной портал Узбекистана",

    /*
    * для кэширования виджетов, все что вам надо, это добавить массив с названием виджета, без прифекса _Widget
    * и указать параметры:
    * duration: Время жизни кэша
    * cacheID: ИД номер типа кэша
    * в данный момент доступны следующие ID:
    * CDummyCache - Пустышка, не производит кэширование данных (так же можно удалить массив с виджетом, тогда по дефолту ему выстовится CDummyCache)
    * CFileCache - Кэширование по средством файлов
    *
    * что бы добавить свой тип кэширования, необходимо в компоненты добавить следующую строчку:
    * 'CFileCache' => array('class' => 'CFileCache')  т.е. 'cacheID' => array('class' => 'ClassName'),
*/
        'widgetList' => array(
            'blocksnewswidget' => array(
                'duration' => 86400,
                'cacheID' => 'CFileCache',
            ),
            'menuwidget' => array(
                'duration' => 86400,
                'cacheID' => 'CFileCache',
            ),
            'fotoNewsWidget' => array(
                'duration' => 86400,
                'cacheID' => 'CFileCache',
            ),
        ),
	),

    'controllerMap'=>array(
        'min'=>array(
            'class'=>'ext.minScript.controllers.ExtMinScriptController',
        ),
    ),

);