<?php
use yii\helpers\Html;
use common\helper\StringHelper;
use yii\helpers\Url;
?>
<div class="slidesubbg <?php echo $class_ex;?>">   
    <div class="subbghead"></div>
    <div class="subbgcontent">
           <div class="uk-container uk-container-center">           
                        <div class="uk-grid">
                            <div class="uk-width-1-2 subbg1">                                                                
                                  <h2><?php echo Yii::t('app','Create your private tailor made trips with us');?></h2>
                                  <h3><?php echo Yii::t('app','Solo traveler, couples, family and group of friends');?></h3>                                  
                            </div>
                            <div class="uk-width-1-2 subbg2">
                                 <h4><?php echo Yii::t('app','Your trip');?></h4>  
                                 <form id="frmcustomize" method="get" action="<?php echo Url::toRoute(array('tour/customize'));?>">
                                 <div class="boxslc" id="boxslc">
                                     <select name="slccouple">                                           
                                           <option value="1"><?php echo Yii::t('app','Solo traveler');?></option>
                                           <option value="2"><?php echo Yii::t('app','Couples');?></option>
                                           <option value="3" selected="selected"><?php echo Yii::t('app','Family');?></option>
                                           <option value="4"><?php echo Yii::t('app','Friends');?></option>
                                           <option value="5"><?php echo Yii::t('app','Group association ');?></option>                                                                                </select>
                                     <span></span> 
                                     <select name="slcyear" id="slcyear">
                                     <option value=""><?php echo Yii::t('app','---Departure date:---');?></option>
                                      <?php                                     
                                      $m = date('m');
                                      $n = 12- $m +12;
                                      for ($i = 0; $i <= $n; $i++) {
                                            $month = mktime (0,0,0,date("m")+$i,date("d"),date("Y"));
                                            $v = date("F Y",$month);
                                            echo '<option value="'.$v.'">'.$v.'</option>';
                                        }

                                      ?>
                                     </select>
                                 </div>  
                                 <a class="btn btntravelplan" href="#" onclick="javascript:$('#frmcustomize').submit();"><?php echo Yii::t('app','Propose your travel plan');?></a>
                                 </form> 
                             </div>
                        </div>
                  
            </div>
      </div>  
</div>