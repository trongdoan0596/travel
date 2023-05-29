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
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css = array(      
        'themes/web/css/uikit.min.css',        
        'themes/web/css/components/slidenav.min.css',
        'themes/web/css/components/dotnav.min.css',  
        'themes/web/css/components/slideshow.min.css',
        'themes/web/css/components/tooltip.min.css',        
        'themes/web/css/components/accordion.min.css',  
        'themes/web/css/style-local.css' 
        //'themes/web/css/style.css?v=1.0.11'      
    );
    public $js = array(   
        'themes/web/js/jquery.js',
        'themes/web/js/uikit.min.js',
        'themes/web/js/components/slideset.min.js',
        'themes/web/js/components/slideshow.min.js',      
        'themes/web/js/components/slideshow-fx.min.js', 
        'themes/web/js/components/tooltip.min.js',         
        'themes/web/js/components/accordion.min.js',  
        'themes/web/js/funtions-local.js'
      // 'themes/web/js/funtions.js?v=1.0.2',
    );   
    public $jsOptions = array(
         'position' =>\yii\web\View::POS_HEAD//POS_END POS_HEAD
         //'async' => 'async'
         //'position' => View::POS_END // appear in the bottom of my page, but jquery is more down again
    );   
   public $depends = array(
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',        
        //'yii\web\JqueryAsset',
       //'yii\jui\JuiAsset'
    );  
}