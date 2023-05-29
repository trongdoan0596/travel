<?php
$db = require __DIR__ . '/db.php';
return array(
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en',
    'language' => 'en',
    'components' => array(
        'formatter' => array(
            'dateFormat' => 'yyyy-MM-dd',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => '$',
         ),
        'cache' => array(
            'class' => 'yii\caching\FileCache',           
        ),
        // 'db' =>  array(
		//      'class' => 'yii\db\Connection',            
        //      'dsn' => 'mysql:host=localhost;dbname=travel',//localhost
		// 	 'username' => 'root',
		// 	 'password' => '',
        //      'enableSchemaCache' => true,
        //      // Duration of schema cache.
        //      'schemaCacheDuration' => 3600,
        //      //Name of the cache component used to store schema information
        //     //  'schemaCache' => 'cache',
		// 	 'charset' => 'utf8', 
        // ),
        'db' =>  $db,

        'languageSwitcher' =>array(
            'class' => 'common\components\languageSwitcher',
        ),
       'i18n' =>array(
            'translations' => array(
                'app*' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => array(
                        'app' => 'app.php',
                        //'app/error' => 'error.php',
                    ),
                ),
            ),
        ),
         'mailer' => array(
                'class' => 'yii\swiftmailer\Mailer',
                //send all mails to a file by default. You have to set
                //useFileTransport' to false and configure a transport
                //for the mailer to send real emails.                
                'useFileTransport' =>false,
                //'enableSwiftMailerLogging' => true,
                'viewPath' => '@common/mail',
                'transport' => array(
                    'class' => 'Swift_SmtpTransport',
                    //'host' =>'smtp.gmail.com',                      
                    'host'       => 'sxb1plzcpnl487833.prod.sxb1.secureserver.net',
                    'port'       => 587,//587 = tls or 465 = ssl
                    'username'   => 'support@authentiktravel.com',
                    'password'   => 'wy)*yrtNiusr',
                    'encryption' => 'tls'//tls ssl             
                ),
         ), 
    
    ),
   //'bootstrap' => array(
   //    'languageSwitcher',
   //),
    'params' => array(
		'appname'=>'atktravel',
        'defPageSize' =>20,
		'defaultPageSize'=>30,//phan trang mac dinh cho admin        
	//	'languages'=>array('en'=>'English','es'=>'Español'),
    	'languages'=>array('en'=>'English'),
        //'countryid'=>array('36','116','232','146'),
		'image_server'=>array('host'=>'http://authentiktravel/media/','port'=>''),
    ),   
    
);