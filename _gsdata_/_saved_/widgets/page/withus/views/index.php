<?php
use yii\helpers\Url;
use common\models\Article;
if(!empty($rows)){ 
    $urlall = Url::toRoute(array('article/viewaboutus'));
    $info_ac = Article::getDetailArticle(111,1);
    if(!empty($info_ac)){  
        //$imgac = Article::getImage($info_ac);
    ?>
     <div class="uk-container uk-container-center homeabout" style="padding-top:70px;">   
          <div class="uk-grid">
            <div class="uk-width-1-2">
                 <h4 class="titleindex"><a href="<?php echo $urlall;?>"><?php echo $info_ac->title;?></a></h4> 
                 <div class="content"><i class="uk-icon-quote-left uk-icon-medium uk-align-left"></i>
                 <?php echo $info_ac->fulltxt;?>
                 </div>
             </div>
             <div class="uk-width-1-2">
                <figure class="uk-overlay">
                      <a href="<?php echo $urlall;?>"><img class="border-img-4" src="<?php echo Url::base();?>/themes/web/img/article/agence-de-voyage-sur-mesure-au-vietnam.png"  alt="Agence de voyage sur mesure au Vietnam" /></a>
                       <!-- <figcaption class="uk-overlay-panel">
                        <div class="uk-grid uk-position-bottom">
                             <div class="uk-width-1-3 title-bottom">Privatif
                             </div>
                              <div class="uk-width-1-3 title-bottom">
                                Authentique
                                                             </div>
                                <div class="uk-width-1-3 title-bottom">Sur mesure 
                             </div>
                           </div>
                        
                        </figcaption>
                        -->
                    </figure>  
             </div>
              
          </div> 
     </div>
     <?php
     }
     ?>     
    <div class="uk-container uk-container-center boxwhyus">    
      <h4 class="uk-h1 uk-text-center"><a href="<?php echo $urlall;?>"><?php echo $infocate->title;?></a></h4>  
      <div class="uk-text-center txthome"><?php echo $infocate->fulltxt;?></div>    
      <div class="uk-grid">
              <?php
              $i=1;
               foreach($rows as $row){                          
                     $title = $row->title;
                     $class_='';
                     if($i==5) $class_='box5';
                     ?>
                       <div class="uk-width-1-5 <?php echo $class_;?>">
                           <div class="uk-panel uk-align-center">
                              <div class="circleus-<?php echo $i;?>"><a href="#"></a></div>                           
                              <p class="uk-text-center"><?php echo $title;?></p>
                           </div>
                        </div>
                     <?php
                     $i++;
               }
            ?>
      </div>      
      <br /> <br />
      <div class="viewall"><a href="<?php echo $urlall;?>"><?php echo  Yii::t('app','Voir notre concept');?></a></div>
</div>
    <?php
}
?>
