<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\Menu;
use common\components\languageSwitcher;
AppAsset::register($this);
$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if(Yii::$app->user->getIsGuest()){
    //chua login
    ?>
      <div class="wrapper">
        <?php echo $content ?>
     </div>
    <?php    
    //END chua da login
}else{
    //da login
    //use yii\helpers\Url;
    $user     = Yii::$app->user->identity;
    $username = $user->username;
    $user_id  = $user->id; 
    $cookies = Yii::$app->request->cookies;   
    $language = $cookies->getValue('language', '');
    //if($language==''){
       // die('---No Cookies---');
    //}
//echo $language;die();
   // $cookies = Yii::$app->response->cookies;
   // if($cookies->has('language')){
      //   $language = $cookies->getValue('language');
  //  }else{
        // 
  //  }  
    ?>
 <div class="wrapper">
       <header id="header">
          <nav class="uk-navbar bghead">
                    <ul class="uk-navbar-nav">
                        <li ><a class="brand" href="<?php echo Url::to(array('site/index'));?>">Administration</a></li>
                    </ul>
                    <div class="uk-navbar-flip">
                        <ul class="uk-navbar-nav">
                            <li>
                               <!-- <a href="<?php //echo Url::to(array('site/language'))?>"> 
                                  <?php 
                                  // $language = Yii::$app->request->cookies->getValue('language');
                                  // if($language=='en'){
                                     //  echo 'Español';
                                  // }else{
                                  //   echo 'English';
                                 //  }
                                 
                                  ?><?php //echo $language;?>

                              </a>-->
                              <a><?php //echo languageSwitcher::Widget();
                              switch ($language) {
                                        case "en":  
                                        case "es":
                                            echo '<img src="'.Yii::$app->homeUrl.'themes/admin/images/flag/'.$language.'.png" alt="'.$language.'" />';
                                            break;
                                        default:
                                          echo 'No Language';
                                           break;
                                    }
                               //.' -- '.Yii::$app->language;                              
                                ?></a> 
                            </li>
                            <li><a href="<?php echo Url::to(array('user/myupdate'));?>"><i class="icon-user icon-white"></i> <?php echo $username;?></a></li>
                            <li ><a href="<?php echo Url::to(array('site/logout'))?>" data-method="post">Thoát</a></li>
                        </ul>
                    </div>
                </nav>
       </header >
 </div>       
<div class="page-wrapper" >
<div class="page-inner" >
<div class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="/backend/themes/admin/images/logo-cms.png" alt="authentiktravel.com/" aria-roledescription="logo">
            <span class="page-logo-text mr-1">authentiktravel.com</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
        </a>
    </div>
      <div class="boxleft">
     <?php        
     $role = Yii::$app->user->identity->role;
     $conten_manager = array('label' => 'Content Manager',
        'url' =>array('category/index'),
        'options'=>array('class'=>'nav-header'),
        //'template' => '<a href="{url}" class="href_class">{label}</a>',
        'template' => '<a href="javascript:void(0)" class="href_class">{label}</a>',
        'items' =>array(
            array('label' => 'Category', 'url' =>array('category/index')),
            array('label' => 'Article', 'url' => array('article/index')),
            array('label' => 'Banner Home', 'url' => array('au-banner-home/index')),
            // array('label' => 'Banner', 'url' => array('banner/index')),   
        )        
    );
    $tour = array('label' =>Yii::t('app','Tour'),
        'url' =>array('tour/index'),
        'options'=>array('class'=>'nav-header'),
        'template' => '<a href="javascript:void(0)" class="href_class">{label}</a>',
        'items' =>array(
            array('label' => 'Category Tour', 'url' => array('tourcate/index')),
            array('label' => 'Tour', 'url' =>array('tour/index')),
            array('label' => 'Book Tour','class'=>'nav-header','url' =>array('booktour/index')), 
            array('label' => 'Destination', 'url' =>array('destination/index')),       	               
        )        
    );
    $blog = array('label' => 'Blog',
        'url' =>array('blog/index'),
        'options'=>array('class'=>'nav-header'),
        'template' => '<a href="javascript:void(0)" class="href_class">{label}</a>',
        'items' =>array(
            array('label' => 'Category', 'url' => array('blogcate/index')),
            array('label' => 'Article', 'url' =>array('blog/index')),
        )        
    );
    $cotravel = array('label' => 'Cotravel', 'url' => array('cotravel/index'));
    $review = array('label' => 'Review', 'url' => array('review/index'));
    $video = array('label' => 'Video', 'url' => array('video/index'));
    $comment = array('label' => 'Comments', 'url' => array('comment/index'));
    $ourteam = array('label' => 'Ourteam', 'url' => array('ourteam/index'));
    $image_lib = array('label' => 'Image Lib', 'url' => array('itemimg/index'));
    $user = array('label' => 'User',
        'url' =>array('account/index'),
        'options'=>array('class'=>'nav-header'),
        'template' => '<a href="javascript:void(0)" class="href_class">{label}</a>',
        'items' =>array(
                    array('label' => 'Account', 'url' => array('account/index')),   
                    array('label' => 'User Manager', 'url' => array('user/index')), 
                    //array('label' => 'Sales', 'url' => array('sales/index')),     
            )        
        );
    $menu = array('label' => 'Menu', 'url' =>array('menu/index'));
    $newsletters = array('label' => 'Newsletters', 'url' =>array('newsletters/index'));
    $tool = array('label' => 'Tools ',
        'url' =>array('tools/index'),
        'options'=>array('class'=>'nav-header'),
        'template' => '<a href="javascript:void(0)" class="href_class">{label}</a>',
        'items' =>array(
                    //array('label' => 'Attribute group', 'url' => array('attributegroup/index')),
                    //array('label' => 'Attribute ', 'url' => array('attribute/index')),
                    array('label' => 'Countrys', 'url' => array('country/index')),
                    array('label' => 'Regions', 'url' => array('region/index')),  
                    array('label' => 'Districts', 'url' => array('district/index')),   
                    array('label' => 'Tools ', 'url' => array('tools/index')),
                    array('label' => 'Alias Url ', 'url' => array('aliasurl/index')),
                    array('label' => 'Log', 'url' => array('log/index')), 
                    array('label' => 'IP', 'url' => array('logip/index')),         
                    //array('label' => 'Sitemap ', 'url' => array('../tools/cronsitemap.php?key=d1MyuomRffghe323')),
            )        
        );
    if($role == 2){ //Manager
        $cotravel = null;
        $review = null;
        $video = null;
        $comment = null;
        $ourteam = null;
        $image_lib = null;
        $user = null;
        $menu = null;
        $newsletters = null;
        $tool = null;
    }
    if($role == 3){ //sale
        $conten_manager = null;     
        $tour = null;
        $blog = null;
        $cotravel = null;
        $review = null; 
        $video = null; 
        $ourteam = null;
        $image_lib = null;
        $menu = null;   
        $newsletters = null;                
        $tool = null;  
    }
    if($role == 4){ //input nhap lieu
        $conten_manager= null;     
        $cotravel= null;
        $review= null; 
        $comment= null; 
        $ourteam= null;
        $image_lib= null;
        $user= null;
        $menu= null;   
        $newsletters= null;                
        $tool= null;   
    }
    if($role == 5){ //input nhap lieu
        $conten_manager= null;     
        $tour= null;
        $blog= null;
        $cotravel= null;
        $review= null; 
        $video= null; 
        $ourteam= null;
        $image_lib= null;
        $menu= null;   
        $newsletters= null;                
        $tool= null;   
    }
    
    $items =array();
    echo Menu::widget(array(
        'items' => array(
            $conten_manager,     
            $tour,
            $blog,
            $cotravel,
            $review, 
            $video, 
            $comment, 
            $ourteam,
            $image_lib,
            $user,
            $menu,   
            $newsletters,                
            $tool,   
        ),
    // 'activeCssClass'=>'open',  
    'submenuTemplate' => "\n<ul class='dropdown' role='menu'>\n{items}\n</ul>\n",   
    // 'submenuTemplate' => "\n<ul id='level' class='dropdown' >\n{items}\n</ul>\n",
        'options' => array(
                        'class' =>'uk-nav nav-menu js-nav-built',
                        'id'=>'menu_left',
                        //'style'=>'font-size: 14px;',
                        //'data-tag'=>'yii2-menu',
                    ),
        'itemOptions'=>array('class'=>'nav-header'),  
        'activeCssClass'=>'open',
        'activateParents'=>true,             
        
    )
    );
	?>
    </div>
       <div style="text-align: center;padding-top: 14px;font-size:14px">
       Version :<?php echo Yii::getVersion();?>
       </div>
   </div>    
    <div class="page-content-wrapper">
        <?php echo $content ?>
     </div>
</div>
</div>
    <?php
}
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
