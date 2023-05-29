<?php
//use yii\helpers\Html;
use common\helper\StringHelper;
//use yii\helpers\Url;
?>
 <li>       
         <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/silde/<?php echo $img;?>" alt="agence de voyage sur mesure au vietnam" />   
         <center> 
            <div class="uk-overlay-panel uk-vertical-top"> 
                     <div class="uk-vertical-align-middle">                                          
                          <div class="slidetitle"> 
                             <h2>Agence de voyages sur mesure au Vietnam</h2>
                             <h3>Nous concevons, avec vous, votre voyage selon vos envies et votre budget</h3>
                          </div>
                    </div>   
                   <div class="uk-position-bottom" style="padding-bottom: 60px;">
                        <div class="uk-container uk-container-center boxtravelplanhead">  
                            <div class="title-bottom">
                                <font class="title-bottom">CRÉER VOTRE VOYAGE SUR MESURE AU VIETNAM   | </font>  Pour individuels, couples, familles & groupes d’amis
                            </div> 
                        </div>
                        <div class="uk-container uk-container-center travelplan"> 
                             <form id="frmcustomize" method="get" action="<?php echo $urlpost;?>">
                                 <div class="boxslc" id="boxslc">
                                     <select name="slccouple">
                                           <option value="0">---Vous voyagez---</option>
                                           <option value="1">Seul (e)</option>
                                           <option value="2">En couple</option>
                                           <option value="3">En famille</option>
                                           <option value="4">Entre amis</option>
                                           <option value="5">En groupe d’association</option>
                                     </select>
                                     <span>en</span> 
                                    <select name="slcyear" id="slcyear">
                                     <option value="">---<?php echo Yii::t('app','Date de départ');?>---</option>
                                      <?php                                     
                                      $m = date('m');
                                      $n = 12- $m +12;
                                      for ($i = 0; $i <= $n; $i++) {
                                            $month = mktime (0,0,0,date("m")+$i,date("d"),date("Y"));
                                            $v = date("F Y",$month);
                                            echo '<option value="'.StringHelper::showMonthfr($v).'">'.StringHelper::showMonthfr($v).'</option>';
                                        }
                                      ?>
                                     </select>
                                    <a class="btn btntravelplan" href="#" onclick="javascript:$('#frmcustomize').submit();">Proposer votre projet de voyage</a>
                                  </div>  
                             </form>                             
                        </div> 
                     </div>                              
            </div>                    
        </center>   
</li>