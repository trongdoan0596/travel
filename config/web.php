<?php
$params = require(__DIR__ . '/params.php');
$config = array(
    'id' => 'appfrd',
    'basePath' => dirname(__DIR__),
    'bootstrap' => array('log'),
    'language'=>'en',
    'controllerNamespace' =>'app\controllers',
    'components' => array(	
       'urlManager' =>  array(
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            //'suffix' => '.html',
            'rules' => array( 
                     '<language:(en|es)>/'=>'site/index', 
                     '/site/captcha' => 'site/captcha',                        
                     'contact-us'=>'site/contactus', 
                     'testmail'=>'site/testmail', 
                     '<language:\w+>/contact-us'=>'site/contactus',
                    // '<title:[\d\w\-_]+>-<id:\d+>'   => 'article/view', 
                    // '<title:[\d\w\-_]+>-<id:\d+>'   => 'article/viewblog',                    
                    // '<title:[\d\w\-_]+>-c<cid:\d+>' => 'article/index',                     
                     //Article                        
                     
                     'about-us' =>'article/viewaboutus',
                     '<language:\w+>/about-us' =>'article/viewaboutus',     
                                            
                     'recruitment' => 'article/recruitment', 
                     '<language:\w+>/recruitment' => 'article/recruitment', 
                     
                     //'useful-information' => 'article/travelinformation',
                    // '<language:\w+>/useful-information' => 'article/travelinformation',
                     'about-our-services' => 'article/travelinformation',
                     '<language:\w+>/about-our-services' => 'article/travelinformation',
                     
                     'before-the-trips' => 'article/beforetrips',//before-the-trips
                     '<language:\w+>/before-the-trips' => 'article/beforetrips',
                                          
                                       
                     'propose-your-travel-plan' => 'tour/customize',                     
                     '<tid:\d+>/request-price' =>'tour/requestprice',    
                     'request-price' =>'tour/requestprice', 
                     //Tour   
                    
                     '<language:\w+>/package-holidays-tours'=>'tour/alltour',   
                     '<page:\d+>/<per-page:\d+>/package-holidays-tours'=>'tour/alltour',       
                     '<language:\w+>/<page:\d+>/<per-page:\d+>/package-holidays-tours'=>'tour/alltour',   
                      'package-holidays-tours'=>'tour/alltour',                
                     //'<language:\w+>/package-holidays-tours/<title:[\d\w\-_]+>' => 'tour/index',    
                     'vietnam-classic-tours'=>'tour/index',                
                     '<language:\w+>/vietnam-classic-tours'=>'tour/index',
                     
                     'north-vietnam-tours'=>'tour/index',
                     '<language:\w+>/north-vietnam-tours'=>'tour/index',      
                                       
                     'vietnam-authentic-tours'=>'tour/index',
                     '<language:\w+>/vietnam-authentic-tours'=>'tour/index',
                     
                     'multi-country-tours'=>'tour/index',
                     '<language:\w+>/multi-country-tours'=>'tour/index',
                     
                     'myanmar-tours'=>'tour/index',
                     '<language:\w+>/myanmar-tours'=>'tour/index',
                     
                     'laos-tours'=>'tour/index',
                     '<language:\w+>/laos-tours'=>'tour/index',
                     
                     'cambodia-tours'=>'tour/index', 
                     '<language:\w+>/cambodia-tours'=>'tour/index',    
                         
                     'package-holidays-tours/<title:[\d\w\-_]+>'=>'tour/view',                     
                     '<language:\w+>/package-holidays-tours/<title:[\d\w\-_]+>'=>'tour/view',                              
                     //ourteam
                     'authentik-travel-team' =>'ourteam/index',     
                     '<language:\w+>/authentik-travel-team' =>'ourteam/index',      
                            
                     'authentik-travel-team/<id:\d+>/<title:[\d\w\-_]+>'=>'ourteam/view',
                     '<language:\w+>/authentik-travel-team/<id:\d+>/<title:[\d\w\-_]+>'=>'ourteam/view',                       
                     //review                      
                     '<language:\w+>/<page:\d+>/<per-page:\d+>/clients-reviews'=>'review/index', 
                     '<page:\d+>/<per-page:\d+>/clients-reviews'=>'review/index', 
                     '<language:\w+>/clients-reviews' =>'review/index',  
                     'clients-reviews'=>'review/index',                                       
                   
                     'clients-reviews/<title:[\d\w\-_]+>'   => 'review/view',
                     '<language:\w+>/clients-reviews/<title:[\d\w\-_]+>'   => 'review/view',    
                     //comment  
                     'comment/savecm' => 'comment/savecm', 
                     '<language:\w+>/comment/savecm' => 'comment/savecm', 
                     //newsletter
                     'newsletters/addnewsletter' =>'newsletters/addnewsletter', 
                     '<language:\w+>/newsletters/addnewsletter' => 'newsletters/addnewsletter', 
                     //'<title:[\d\w\-_]+>-b<id:\d+>'=>'blog/view',
                     //'<language:\w+>/<title:[\d\w\-_]+>-b<id:\d+>'=>'blog/view', 
                                         
                     '<page:\d+>/<per-page:\d+>/blog-travel-vietnam'=>'blog/index',                   
                     'blog-travel-vietnam/<title:[\d\w\-_]+>'=>'blog/index',     
                     'blog-travel-vietnam/<txttag:[\d\w\-_]+>'=>'blog/index',                  
                     'blog-travel-vietnam'=>'blog/index',    
                     '<language:\w+>/blog-travel-vietnam'=>'blog/index', 
                     '<language:\w+>/<title:[\d\w\-_]+>'=>'blog/view',
                     '<title:[\d\w\-_]+>'=>'blog/view',          
                     
                     //begin es
                                                                            
                     '<controller:\w+>/<action:\w+>/<id:\d+>-<title:[\d\w\-_]+>'=>'<controller>/<action>',
                     '<language:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>-<title:[\d\w\-_]+>'=>'<controller>/<action>',
                     '<language:\w+>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                     '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'view' => array(
            'theme' => array(
                'basePath' => '@app/themes/web',
                'baseUrl' => '@app/themes/web',
                'pathMap' => array(
                    '@app/views' => '@app/themes/web/views',
                    '@app/viewsmobi' =>'@app/themes/mobi/views',
                    '@app/viewstablet' =>'@app/themes/tablet/views',
                ),
            ),
        ),
        'mobileDetect' => array(
            'class' => 'skeeks\yii2\mobiledetect\MobileDetect'
        ),
        'request' =>array(
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'authen4@)m2$h',
        ),
        'cache' => array(
            'class' => 'yii\caching\FileCache',
        ),
        'user' => array(
            'identityClass' => 'common\models\Account',
            'enableAutoLogin' => true,
            'identityCookie' => array(
                'name' => '_frdUser',
                'httpOnly' => true,
                'path'=>'/runtime/web',
                'domain' => 'authentiktravel.com',
             ),
        ),
        'session' =>array(
            'name' => '_FrdSessId', // unique for backend
            'savePath' => __DIR__ . '/../runtime/session', // a temporary folder on backend
            'timeout' => 43200,//=60*60*12 = 1/2 ngay
            'cookieParams' =>array(
                'domain' => 'authentiktravel.com',
                'httpOnly' => true,
            ),
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),   
        'log' => array(
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => array(
                array(
                    'class' => 'yii\log\FileTarget',
                    'levels' => array('error', 'warning'),
                ),
            ),
        ),
       'assetManager' => array(
            'bundles' => array(
                'yii\web\JqueryAsset' => false,
            ),
        ),
        //'db' => require(__DIR__ . '/db.php'),
    ),
    'params' => $params,
);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = array(
        'class' => 'yii\debug\Module',
    );

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = array(
        'class' => 'yii\gii\Module',
    );
}
return $config;