<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Spaceless;
use app\widgets\page\header\Header;
use app\widgets\page\footer\Footer;
use app\widgets\setting\settinghome\Settinghome;
//use app\widgets\setting\settingdefault\Settingdefault;
use app\assets\AppAsset;
AppAsset::register($this);
?><?php Spaceless::begin(); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-control" content="max-age=7200,public" />   
    <meta name="robots" content="index,follow,noarchive" />
    <meta name="google" content="notranslate" />
    <meta http-equiv="content-language" content="<?= Yii::$app->language ?>" />  
    <meta name="google-site-verification" content="qE3XocYCbi-7ztgcVqlzlu181giXhVJhdRQ11aQtkCI" />
    <meta name="author" content="Authentik Travel" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta property="fb:app_id" content="826906504136544" /> 
    <link href="<?php echo Url::base();?>/themes/web/ico/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <base href="<?php echo Url::base();?>" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title> 
    <?php $this->head()?> 
     <script language="javascript">      
        var urlbase ='<?php echo Url::base();?>';        
    </script> 
    <?php  echo Settinghome::widget(array('view' =>'index'));?>
    <?php  //echo Settingdefault::widget(array('view' =>'sitelinks'));?>
     <!--Start of Zendesk Chat Script-->
    <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="https://v2.zopim.com/?5P8A90m0JputmjcHrX8lGX5hoLXS8Ll4";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zendesk Chat Script-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VKM79X');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPL3ZDN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="wrapper" class="wrapper"> 
        <?php $this->beginBody() ?>
        <?php
           echo Header::widget(array('view' =>'index','lang'=>Yii::$app->language));
           echo $content;
           echo Footer::widget(array('view' =>'index'));
           ?>
            <section id="rightfly" class="widget widget-fly">
                      <div class="widget-heading">
                           <h4 class="spb-heading"><span><?php echo Yii::t('app', 'Free &nbsp; proposal');?></span></h4>
                      </div>
                      <div class="sidebar-fly">
                         <ul>
                           <li>
                               <a href="http://authentiktravel.com/propose-your-travel-plan">
                                   <span class="advisory-free"><?php echo Yii::t('app', 'Free proposal');?></span>
                                   <span class="advisory-small"><?php echo Yii::t('app', 'Response within 24h');?></span>
                               </a>
                           </li>
                           <li>
                               <a href="http://authentiktravel.com/contact-us">
                                   <span class="call-free"> <?php echo Yii::t('app', 'Leave your');?>  </span>
                                   <span class="call-two"><?php echo Yii::t('app', 'number');?></span><span class="call-small"> <?php echo Yii::t('app', 'We call back');?>  </span>
                               </a>
                           </li>
                           </ul>
                      </div>
             </section> 
        <?php $this->endBody() ?> 
    </div> 
  <div id="fb-root"></div>      
  <script language="javascript">  
         (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=826906504136544";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
  </script>     
  <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>   
  <a id="scrollfooter" href="#wrapper" class="uk-button uk-float-right" style="display: none;"  data-uk-smooth-scroll><i class="uk-icon-angle-double-up uk-icon-medium"></i><span style="display: block !important;margin-top: -5px !important;">Top</span></a>
  <script>
    $(window).scroll(function(){
        if($(this).scrollTop()<=20){           
            $('#scrollfooter').hide();         
        }else{         
         $('#scrollfooter').show();
        }
      });
  </script>   
  <a id="whatsapp" target="_blank" class="uk-float-right" href="https://api.whatsapp.com/send?phone=+84969729983">
   <img src="<?php echo Url::base();?>/themes/mobi/img/whatsapp-logo.png" alt="WhatsApp" />
</a>
</body>
</html>
<?php $this->endPage() ?>
 <?php Spaceless::end(); ?>