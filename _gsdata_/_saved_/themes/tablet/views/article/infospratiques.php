<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;
use app\widgets\slidebg\slidesub\Slidesub;
use common\models\Article;
use app\widgets\question\Question;
use app\widgets\socialshare\Socialshare;
?>
<?php echo Slidesub::widget(array('view' =>'index','class_ex'=>'slidesubbg_guidevoyage'));?>
<div id="main" class="main-content"> 
      <div class="boxguidevoyage">     
          <div class="uk-container uk-container-center">   
          <?php  
            if(!empty($rows)){                      
                   if(!empty($info)){
                      //$fulltxt  = HtmlPurifier::process($info->fulltxt);
                      $title    = Html::encode($info->title);
                      //$img_head = $info->getImage($info);
                   }                       
                    echo Breadcrumbs::widget(array(
                            'itemTemplate' => "<li>{link}</li>\n", // template for all links
                            'links' => array(
                                array(
                                    'label' => $title,
                                    'url' => array('article/infospratiques'),//, 'id' => 10
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),  
                            ),
                   ));   
                    $i=0;
                    foreach($rows as $row){  
                         $showfirst="false";
                        // if($i==0) $showfirst="false";
                         echo $this->render('_itemcate',array('row'=>$row,'showfirst'=>$showfirst));  
                         $i++;                
                   }     
                 ?>
                    <div class="uk-grid boxbottom" style="padding-bottom:10px;">
                        <div class="uk-width-1-1" style=" text-align: right;">
                          <?php echo Html::a(Yii::t('app','Voir les infos pratiques sur les voyages'),array('article/infossurlesvoyages'), array('class' => 'btn btn-warning btnalltourfix')) ?>
                        </div>                        
                    </div>  
                   
               
               <?php    
             }else{
                echo "Updating!";
             }
           ?> 
          </div>
     </div>      
</div>    