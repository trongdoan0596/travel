<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$url_all = Url::toRoute(array('tour/alltour'));
?>
<div id="main" class="main-content"> 
      <div class="main-customize">     
          <div class="boxcustomize">
              <div class="uk-container uk-container-center">   
               <?php
                echo Breadcrumbs::widget(array(
                            'itemTemplate' => "<li>{link}</li>\n", // template for all links
                            'links' => array(
                                array(
                                    'label' =>Yii::t('app', 'All tours'),//
                                    'url' =>$url_all,
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),  
                            ),
                         ));
              ?>             
               <div id="msgpropose" class="contryside">
                     <h1><?php echo Yii::t('app', 'Thanks');?></h1>
                     <div class="uk-grid thanksmsg" style="text-align: center;">
                        <div class="uk-width-1-1">
                             <br /><?php echo $msg;?><br />
                             <br />
                         </div>
                     </div>
                </div>
              </div>
          </div>
      </div> 
</div>