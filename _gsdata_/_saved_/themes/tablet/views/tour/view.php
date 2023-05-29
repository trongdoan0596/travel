<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\widgets\slidebg\slidesub\Slidesub;
use app\widgets\traveller\travellerreview\Travellerreview;
use app\widgets\page\servicework\Servicework;
use common\models\Tourcate;
use app\widgets\tour\othertour\Othertour;
use app\widgets\socialshare\Socialshare;
$class_ex ='';$url_price='#';
if(!empty($model)){
    $class_ex ='slidesubbg_cate'.$model->cat_id;
    $url_price = Url::toRoute(array('tour/requestprice','tid'=>$model->id)); 
}

?>
<?php echo Slidesub::widget(array('view' =>'index','class_ex'=>$class_ex));?>
<div id="main" class="main-content"> 
      <div class="boxcontryside">     
          <div class="uk-container uk-container-center">    
            <?php    
            if(!empty($model)){
                    $cat_id = $model->cat_id;
                    $infocate = Tourcate::getDetailTourCate($cat_id);
                    $url_cate = Tourcate::createUrl($infocate);
                    echo Breadcrumbs::widget(array(
                            'itemTemplate' => "<li>{link}</li>\n", // template for all links
                            'links' => array(
                                array(
                                    'label' =>$infocate->title,
                                    'url' =>$url_cate,
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),
                                array('label' =>$model->title,
                                      //'url' =>array('post/edit', 'id' => 1)
                                      ),
                                
                            ),
                         ));
                     echo $this->render('_map',array('model'=>$model,'details'=>$details));   
                     ?>
                    <div class="discover">
                         <div class="uk-grid">
                               <!-- <div class="uk-width-2-10 icon"></div>-->
                                <div class="uk-width-1-1 content">                               
                                <h2><?php echo Yii::t('app', 'Vous aimerez');?></h2>
                                 <?php echo HtmlPurifier::process($model->introtxt);?>     
                                </div>
                         </div>                                     
                    </div>
                     <?php        
                    }else{
                        echo 'Updating!';
                    }   
                ?>                      
          </div>
      </div>
<!--detail-->
<?php 
if(!empty($details)){
    ?>
    <div class="detailprogram">
        <div class="uk-container uk-container-center">    
             <h3><?php echo Yii::t('app','Detail program of the tour');?></h3>
             <div class="boxdetail">
                      <?php
                        foreach($details as $row){ 
                          echo $this->render('_days',array('row'=>$row));
                        }                            
                      ?>                       
             </div>
        </div>
    </div>  
    <?php
}
?>    
<!--End detail-->
<!--begin Service-->
<div class="boxserviceinclude">     
      <div class="uk-container uk-container-center">           
            <div class="uk-grid">
                 <div class="uk-width-1-2">
                     <div class="serviceinclude">
                          <h5><?php echo Yii::t('app','Service Included');?></h5>
                          <div class="content">
                           <?php echo HtmlPurifier::process($model->price_include);?>    
                           </div>
                     </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="notserviceinclude">
                          <h5><?php echo Yii::t('app','Service Not Included');?></h5>
                          <div class="content">
                          <?php echo HtmlPurifier::process($model->price_not_include);?>
                         </div>
                    </div>
                 </div>
             </div>   
              <div class="requestprize">
                 <a class="btn btn-warning btnrequest" href="<?php echo $url_price;?>"><?php echo Yii::t('app', 'Request Price');?></a>
               </div>  
              <?php echo Socialshare::widget(array('view'=>'mobi','url'=>$urlshare));?> 
      </div>
</div>    
 <!--End begin Service--> 
 <!--Recomment-->
 <div class="boxrecomment">     
      <div class="uk-container uk-container-center">   
            <?php
            if(!empty($model)){
                echo Othertour::widget(array('cat_id'=>$model->cat_id,'tour_id' =>$model->id));
             }
            ?>
           <div class="boxbottom">            
               <ul class="uk-list">
                   <li>  
                     <?php echo Yii::t('app','Vous aimerez créer votre voyage sur mesure ou voir d\'autres idées de voyages');?>
                   </li>
                    <li>  
                    <?php echo Html::a(Yii::t('app','Design your travel plan'),array('customize'), array('class' => 'btn btn-warning btnplan')) ?>
                     &nbsp;&nbsp; <?php echo Yii::t('app','Or');?> &nbsp;&nbsp; 
                     <?php echo Html::a(Yii::t('app','View all tours'),array('alltour'), array('class' => 'btn btn-warning btnalltour')) ?>
                   </li>
               </ul>
           </div>   
      </div>
</div>    
 <!--End Recomment-->
 <?php echo Servicework::widget(array('view' =>'tour'));?>
 <?php echo Travellerreview::widget(array('view' =>'detailtour'));?>
 </div>