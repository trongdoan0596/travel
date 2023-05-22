<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
?>
<div id="main" class="main-content"> 
      <div class="main-customize">     
          <div class="boxcustomize">
              <div class="uk-container-center" style="padding-top: 30px;">   
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
               <div id="msgcontactus" class="contryside">
                     <h1 style="text-align: center;"><?php echo Yii::t('app', 'Thanks');?></h1>
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