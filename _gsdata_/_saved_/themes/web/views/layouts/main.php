<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Spaceless;
//use yii\widgets\Pjax;
use app\widgets\page\header\Header;
use app\widgets\page\footer\Footer;
use app\widgets\setting\settinghome\Settinghome;
use app\widgets\setting\settingdefault\Settingdefault;
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
    <meta name="google" content="nositelinkssearchbox" />
    <meta name="google-site-verification" content="h_8NOMVczxpAM03q1JYYNMxgnX2THcEMoZ3ci6YxZLo" />
    <meta name="author" content="Authentik Vietnam" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta property="fb:app_id" content="1962811230621626" /> 
    <link href="<?php echo Url::base();?>/themes/web/ico/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <base href="<?php echo Url::base();?>" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title> 
    <?php $this->head()?> 
    <script language="javascript">      
        var urlbase ='<?php echo Url::base();?>';        
    </script> 
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'fr'}</script>   
    <?php  echo Settinghome::widget(array('view' =>'index'));?>
    <?php  echo Settingdefault::widget(array('view' =>'sitelinks'));?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5LN7J9R');</script>
    <!-- End Google Tag Manager -->
    <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5OVjqG0FIRHe6HmCJ6lSKheVoyzmftWf";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->  
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LN7J9R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="wrapper" class="wrapper"> 
        <?php $this->beginBody() ?>
        <?php
           echo Header::widget(array('view' =>'index','lang'=>Yii::$app->language));
          // Pjax::begin();
           echo $content;
          // Pjax::end(); 
           echo Footer::widget(array('view' =>'index'));
           ?>
            <section id="rightfly" class="widget widget-fly">
                      <div class="widget-heading">
                           <h4 class="spb-heading"><span><?php echo Yii::t('app', 'Devis gratuit');?></span></h4>
                      </div>
                      <div class="sidebar-fly">
                         <ul>
                           <li>
                               <a href="https://authentikvietnam.com/creer-votre-voyage-sur-mesure">
                                   <span class="advisory-free"><?php echo Yii::t('app', 'devis gratuit');?></span>
                                   <span class="advisory-small"><?php echo Yii::t('app', 'réponse sous 24h');?></span>
                               </a>
                           </li>
                           <li>
                               <a href="https://authentikvietnam.com/nous-contacter">
                                   <span class="call-free"> <?php echo Yii::t('app', 'rappel');?>  </span>
                                   <span class="call-two"><?php echo Yii::t('app', 'telephonique');?></span><span class="call-small"> <?php echo Yii::t('app', 'gratuit');?>  </span>
                               </a>
                           </li>
                           </ul>
                      </div>
             </section> 
        <?php $this->endBody() ?>  
    </div>  
    <div id="fb-root"></div> 
 <script language="javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-15503737-1', 'auto');
  ga('send', 'pageview');
 (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=1962811230621626";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php //echo Yii::getLogger()->getElapsedTime();?>
<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
<a id="scrollfooter" href="#wrapper" class="uk-button uk-float-right" style="display: none;"  data-uk-smooth-scroll><i class="uk-icon-angle-double-up uk-icon-large"></i><span style="display: block !important;margin-top: -5px !important;">En haut</span></a>
<script>
    $(window).scroll(function(){
        if($(this).scrollTop()<=20){           
            $('#scrollfooter').hide();         
        }else{         
         $('#scrollfooter').show();
        }
      });
</script> 
<!--<a id="promotion" href="https://authentikvietnam.com/promotion-voyage-authentik-vietnam-cadeau-fin-annee" class="uk-float-left" style="position:fixed;font-weight: bold;top:32%;left:0%;transition:all 0.4s ease-in-out 0s;z-index:999;color:#009933;">
<img border="0" align="Promotion" src="<?php echo Url::base();?>/themes/web/img/promotion.gif" />
</a>
-->
<a id="whatsapp" target="_blank" class="uk-float-right" href="https://web.whatsapp.com/send?phone=+84912121091">
   <img src="<?php echo Url::base();?>/themes/web/img/whatsapp-logo.png" alt="WhatsApp" />
</a>
</body>
</html>
<?php $this->endPage() ?>
<?php Spaceless::end(); ?>