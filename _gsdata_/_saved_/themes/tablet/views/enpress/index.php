<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\widgets\slidebg\slidesub\Slidesub;
//use common\models\Article;
?>
<?php echo Slidesub::widget(array('view' =>'index','class_ex'=>'slidesubbg_aboutus'));?>
<div id="main" class="main-content"> 
      <div class="listourteam">     
          <div class="uk-container uk-container-center">   
           <?php
             $fulltxt= "";$title="";
             if(!empty($info)){
                   $fulltxt = HtmlPurifier::process($info->fulltxt);
                   $title    = $info->title;//Html::encode($info->title);
             }                       
             echo Breadcrumbs::widget(array(
                        'itemTemplate' => "<li>{link}</li>\n", // template for all links
                        'links' => array(
                            array(
                                'label' => $title,
                                'url' => array('enpress/index'),//, 'id' => 10
                                'template' => "<li>{link}</li>\n", // template for this link only
                            ),
                           
                            
                        ),
               ));                 
            ?>
            <div class="boxenpress">
              <h1 class="title"><?php echo $title;?></h1>
              <div class="boxinfo" style="margin-bottom: 50px;"><?php echo $fulltxt;?></div>     
              <div class="uk-grid">
                    <div class="uk-width-1-2">
                       <div class="uk-grid">
                            <div class="uk-width-1-2">
                               <a href="https://www.tripadvisor.fr/Attraction_Review-g293924-d11641267-Reviews-Authentik_Vietnam_Travel-Hanoi.html" target="_blank"><img src="<?php echo Url::base();?>/themes/web/img/press/trip.png" alt="Tripadvisor" /></a>
                            </div>
                            <div class="uk-width-1-2" style="padding-left: 0px !important;padding-top:80px;">                             
                                 <ul class="uk-list">
                                        <li class="titleitem">Tripadvisor</li>
                                        <li class="dateitem">2018/2019</li>
                                        <li class="readmore"><a href="https://www.tripadvisor.fr/Attraction_Review-g293924-d11641267-Reviews-Authentik_Vietnam_Travel-Hanoi.html" target="_blank"><?php echo Yii::t('app', 'Read more');?></a></li>
                                  </ul>                   
                            </div>
                        </div>   
                     </div>
                     <div class="uk-width-1-2">
                       <div class="uk-grid">
                            <div class="uk-width-1-2">
                              <a href="http://adresses-incontournables.madame.lefigaro.fr/besoin-evasion/authentik-vietnam-les-voyages-personnalises/" target="_blank"><img src="<?php echo Url::base();?>/themes/web/img/press/le-figaro.png" alt="Madame Le Figaro.fr" /> </a>
                            </div>
                            <div class="uk-width-1-2" style="padding-left: 0px !important;padding-top:80px;">                            
                                 <ul class="uk-list">
                                        <li class="titleitem">Madame Le Figaro.fr</li>
                                        <li class="dateitem">05/2019</li>
                                        <li class="readmore"><a href="http://adresses-incontournables.madame.lefigaro.fr/besoin-evasion/authentik-vietnam-les-voyages-personnalises/" target="_blank"><?php echo Yii::t('app', 'Read more');?></a></li>
                                  </ul>                         
                            </div>
                        </div>   
                     </div>
                    
                     <div class="uk-width-1-2">
                       <div class="uk-grid">
                            <div class="uk-width-1-2">
                               <a href="<?php echo Url::base();?>/themes/web/img/press/petit-fute-papier.jpg" data-uk-lightbox ><img src="<?php echo Url::base();?>/themes/web/img/press/petit-fute.png" alt="Petit Futé" /></a> 
                            </div>
                            <div class="uk-width-1-2" style="padding-left: 0px !important;padding-top:80px;">                            
                                 <ul class="uk-list">
                                        <li class="titleitem">Petit Futé</li>
                                        <li class="dateitem">06/2018</li>
                                        <li class="readmore"><a href="https://www.petitfute.com/v45031-hanoi/c1122-voyage-transports/c747-tours-operateurs/c1161-tour-operateur-specialise/1637615-authentik-vietnam.html" target="_blank"><?php echo Yii::t('app', 'Read more');?></a></li>
                                  </ul>                       
                            </div>
                        </div>   
                     </div>
                     <div class="uk-width-1-2">
                       <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <a href="<?php echo Url::base();?>/themes/web/img/press/full-mass-media-1.jpg" data-uk-lightbox><img src="<?php echo Url::base();?>/themes/web/img/press/mass-media-1.png" alt="Le Figaro" /></a> 
                            </div>
                            <div class="uk-width-1-2" style="padding-left: 0px !important;padding-top:80px;">                            
                                  <ul class="uk-list">
                                        <li class="titleitem">Authentik Vietnam sur Le Progres</li>
                                        <li class="dateitem">04/2014</li>
                                        <li class="readmore"><a href="<?php echo Url::base();?>/themes/web/img/press/full-mass-media-1.jpg" data-uk-lightbox><?php echo Yii::t('app', 'Read more');?></a></li>
                                  </ul>                    
                            </div>
                        </div>   
                     </div>
                     <div class="uk-width-1-2">
                       <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <a href="https://www.laquotidienne.fr/receptifs-au-vietnam-un-marche-a-prendre-avec-des-pincettes/" target="_blank"><img src="<?php echo Url::base();?>/themes/web/img/press/la-quotidienne.png" alt="Le Figaro" /></a> 
                            </div>
                            <div class="uk-width-1-2" style="padding-left: 0px !important;padding-top:80px;">                            
                                 <ul class="uk-list">
                                        <li class="titleitem">La quotidienne.fr</li>
                                        <li class="dateitem">05/2016</li>
                                        <li class="readmore"> <a href="https://www.laquotidienne.fr/receptifs-au-vietnam-un-marche-a-prendre-avec-des-pincettes/" target="_blank"><?php echo Yii::t('app', 'Read more');?></a></li>
                                  </ul>                
                            </div>
                        </div>   
                     </div> 
                      <div class="uk-width-1-2">
                      
                     </div>
                     <div class="uk-align-center notreequipe">
                     <a href="https://authentikvietnam.com/notre-equipe">Découvrir notre équipe</a>
                     </div>
                    
                </div>         
            </div>
            <?php
             $fulltxtuser= "";$titleuser="";$phoneuser="";$avatar="";
             if(!empty($infouser)){
                   $fulltxtuser = $infouser->fulltxt;//HtmlPurifier::process();
                   $titleuser   = $infouser->title;//Html::encode($info->title);
                   $phoneuser   = $infouser->introtxt;
                   $avatar      = $infouser->getImage($infouser);
             }  
             ?>
            <div class="boxenpress" style="margin-top: 30px;padding-top: 50px;">                                
                    <div class="uk-width-1-1" style="text-align: center;">
                       <h2 class="title"><?php echo $titleuser;?></h2>                       
                       <div class="contentuser"><?php echo $fulltxtuser;?></div>
                    </div> 
             </div>                
          </div>
     </div>
</div>  