<?php
return [ 
		'vendorPath' => dirname ( dirname ( __DIR__ ) ) . '/vendor',
		'components' => [ 
			'cache' => [ 
					'class' => 'yii\caching\FileCache' 
			],
			'urlManager' => [ 
					'class' => 'yii\web\UrlManager',
					'enablePrettyUrl' => true,
					'BaseUrl' => '/goods/frontend/web/',
					'showScriptName' => false,
					'suffix' => '.shtml',
					'rules' => [ ] 
			],
			'memberUrlManager' => [ 
					'class' => 'yii\web\UrlManager',
					'BaseUrl' => '/goods/member/web/',
					'suffix' => '.shtml',
					'enablePrettyUrl' => true,
					'showScriptName' => false,
					'rules' => [ ] 
			],
			'i18n' => [
				'translations' => [
					'app*' => [
						'class' => 'yii\i18n\PhpMessageSource',
						'basePath' => '@root/messages',
						'sourceLanguage' => 'zh',
						'fileMap' => [
							'app' => 'app.php',
							'app/error' => 'error.php',
						],
					],
				],
			],
		
		] 
];
