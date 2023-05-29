<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\assets;
use yii\web\AssetBundle;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssettablet extends AssetBundle {
    public $basePath ='@webroot';
    public $baseUrl  ='@web';
    public $css = array(
        'themes/web/css/uikit.min.css',        
        'themes/web/css/components/slidenav.min.css',
        'themes/web/css/components/dotnav.min.css',  
        'themes/web/css/components/slideshow.min.css',
        'themes/web/css/components/tooltip.min.css',        
        'themes/web/css/components/accordion.min.css', 
        'themes/tablet/css/style-local.css'
        //'themes/tablet/css/style.css?v=1.0.1',
     );
    //public $cssOptions = array(          
         // "media" => "none",//none all
         // "onload" =>"if(media!='all')media='all'"              
    //);  
    public $js = array(
         //'themes/web/js/jquery.js', 
         //'themes/web/js/uikit.min.js', 
         //'themes/web/js/components/slideset.min.js',
         //'themes/web/js/components/slideshow.min.js',      
         //'themes/web/js/components/slideshow-fx.min.js',               
         //'themes/web/js/components/accordion.min.js',    
         'themes/tablet/js/funtions.js?v=1.0.1',
    );
    //load jquery trong head
    public $jsOptions = array(
          'position' =>\yii\web\View::POS_HEAD//POS_END POS_HEAD
          //'async' => 'async' // async , defer          
    ); 
    /*
 public $depends = array(
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',        
        //'yii\web\JqueryAsset',
       //'yii\jui\JuiAsset'
    );*/  
}
