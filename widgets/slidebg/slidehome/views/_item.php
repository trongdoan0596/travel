<?php
//use yii\helpers\Html;
//use common\helper\StringHelper;
//use yii\helpers\Url;
?>
<li>       
         <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/silde/<?php echo $img;?>" alt="<?php echo Yii::t('app','Tailor made private tours');?>" />   
         <center> 
            <div class="uk-overlay-panel uk-vertical-top"> 
                     <div class="uk-vertical-align-middle">                                          
                          <div class="slidetitle"> 
                             <h2><?php echo Yii::t('app','A Local Travel Agent for Private Tours in Vietnam');?></h2>
                             <h3><?php echo Yii::t('app','We design private trips to match your desires and budgets');?></h3>
                          </div>
                    </div>   
                   <div class="uk-position-bottom" style="padding-bottom: 60px;">
                        <div class="uk-container uk-container-center boxtravelplanhead">  
                            <div class="title-bottom">
                                <font class="title-bottom"><?php echo Yii::t('app','Create your private tailor made trips with us');?> | </font>  <?php echo Yii::t('app','Solo traveler, couples, family and group of friends');?>
                            </div> 
                        </div>
                        <div class="uk-container uk-container-center travelplan" style="text-align: center !important;"> 
                             <form id="frmcustomize" method="get" action="<?php echo $urlpost;?>">
                                 <div class="boxslc" id="boxslc">
                                     <select name="slccouple">
                                           <option value="0"><?php echo Yii::t('app','---Your trip---');?></option>
                                           <option value="1"><?php echo Yii::t('app','Alone');?></option>
                                           <option value="2"><?php echo Yii::t('app','Couple');?></option>
                                           <option value="3"><?php echo Yii::t('app','With Friends');?></option>
                                           <option value="4"><?php echo Yii::t('app','Family');?></option>
                                           <option value="5"><?php echo Yii::t('app','Association / Club');?></option>
                                     </select>
                                     <span>in</span> 
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
                                    <a class="btn btntravelplan" href="#" onclick="javascript:$('#frmcustomize').submit();"><?php echo Yii::t('app','Propose your travel plan');?></a>
                                  </div>  
                             </form>                             
                        </div> 
                     </div>                              
            </div>                    
        </center>   
</li> 