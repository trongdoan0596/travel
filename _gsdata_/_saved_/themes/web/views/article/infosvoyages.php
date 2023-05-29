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
                                    'url' => array('article/recrutement'),//, 'id' => 10
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),  
                            ),
                   ));   
                    foreach($rows as $row){  
                         $showfirst="false";                       
                         echo $this->render('_itemcate',array('row'=>$row,'showfirst'=>$showfirst));  
                   }
                   ?>
                   <div class="uk-grid boxbottom" style="padding-bottom:10px;">
                        <div class="uk-width-1-1" style=" text-align: right;">
                          <?php echo Html::a(Yii::t('app','Voir plus d\'infos avant de partir'),array('article/infospratiques'), array('class' => 'btn btn-warning btnalltourfix')) ?>
                        </div>                        
                    </div> 
                    <?php //echo Socialshare::widget(array('view'=>'index','url'=>$urlshare,'clss'=>'uk-text-center'));?>     
                                    
                    <?php             
                  // if(!empty($info)){
                     //echo Question::widget(array('view' =>'index','cat_id'=>$info->id));
                  // } 
                ?>
                        
               <?php        
             }else{
                echo "Updating!";
             }
           ?> 
          </div>
     </div>      
</div>    