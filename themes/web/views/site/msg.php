<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
?>
<div id="main" class="main-content"> 
      <div class="main-customize">     
          <div class="boxcustomize">
              <div class="uk-container uk-container-center" style="padding-top: 30px;">   
               <?php
                   echo Breadcrumbs::widget(array(
                                    'itemTemplate' => "<li>{link}</li>\n", // template for all links
                                    'links' => array(
                                        array(
                                            'label' =>Yii::t('app','Contact us'),
                                            'url' => array('site/contactus'),//, 'id' => 10
                                            'template' => "<li>{link}</li>\n", // template for this link only
                                        ),  
                                    ),
                           ));       
                   ?>            
               <div id="msgpropose" class="contryside">
                     <h1><?php echo Yii::t('app', 'Thanks');?></h1>
                     <div class="uk-container-center thanksmsg" style="text-align: center !important;">
                         <br /><?php echo $msg;?><br />
                         <br />
                     </div>
                </div>
              </div>
          </div>
      </div> 
</div>