<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\helper\StringHelper;
use app\widgets\slidebg\slidesub\Slidesub;
use app\widgets\traveller\travellerreview\Travellerreview;
use app\widgets\page\servicework\Servicework;
use common\models\Tourcate;
use app\widgets\tour\othertour\Othertour;
use app\widgets\socialshare\Socialshare;
$class_ex ='';
if(!empty($model)){
    $class_ex ='slidesubbg_cate'.$model->cat_id;
}
?>
<?php //echo Slidesub::widget(array('view' =>'index','class_ex'=>$class_ex));?>
<div class="detailtour">     
            <?php    
            if(!empty($model)){
                    $cat_id = $model->cat_id;
                    $infocate = Tourcate::getDetailTourCate($cat_id);
                    $url_cate = Url::base().'/'.StringHelper::formatUrlKey($infocate->alias);//Tourcate::createUrl($infocate);
                    echo Breadcrumbs::widget(array(
                            'itemTemplate' => "<li>{link}</li>\n", // template for all links
                            'links' => array(
                                array(
                                    'label' =>$infocate->title,
                                    'url' =>$url_cate,
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),
                            ),
                         ));
                   // echo $this->render('_map',array('model'=>$model,'details'=>$details));   
                   $url_price = Url::toRoute(array('tour/requestprice','tid'=>$model->id));  
                     ?>
                     <h1 class="titletour"><?php echo $model->title;// Html::encode($model->title);?></h1>
                   <div class="summarybox"> 
                           <h2><?php echo Yii::t('app', 'Summary of Tour');?></h2>
                           <ul class="uk-list uk-list-line">
                           <?php
                           if(!empty($details)){
                                foreach($details as $row){ 
                                   ?>
                                      <li>
                                          <div class="uk-grid">
                                            <div class="uk-width-1-4 uk-text-top titleday"><?php echo $row->days->title;?></div>
                                            <div class="uk-width-3-4"><?php echo  Html::encode($row->title);?></div>
                                           </div>                                        
                                       </li>
                                   <?php
                                }
                            }
                            ?>   
                           </ul>   
                           <div class="requestprize">
                             <a class="btnrequest" href="<?php echo $url_price;?>"><?php echo Yii::t('app', 'Book This Trip');?></a>
                           </div>                                
                                                                                  
                    </div>
                    <div class="discover">                        
                            <div class="content">                               
                            <h2><?php echo Yii::t('app', 'You will be interested in:');?></h2>
                             <?php echo $model->introtxt;//HtmlPurifier::process($model->introtxt);?>     
                            </div>                                                         
                    </div>
                     <?php        
                    }else{
                        echo 'Updating!';
                    }   
                ?>
<!--detail-->
<?php 
if(!empty($details)){
    ?>
    <div class="detailprogram">
             <h3 class="uk-text-center"><?php echo Yii::t('app','Detail Program');?></h3>
             <div class="boxdetail">
                      <?php
                        foreach($details as $row){ 
                          echo $this->render('_days',array('row'=>$row));
                        }                            
                      ?>                       
             </div>
    </div>  
    <?php
}
?>    
<!--End detail-->
<!--begin Service-->
<div class="boxserviceinclude">  
   <?php
      if($model->pax1!='' || $model->pax2!='' || $model->pax3!='' || $model->pax4!='' || $model->pax5!='' || $model->pax_single!=''){
   ?>
    <div class="serviceinclude">
          <h5 style="background: white;"><?php echo Yii::t('app','Private tour price');?></h5>
          <div class="content">
             <p align="center"><?php echo Yii::t('app','The prices are quoted on USD and based on per pax (Twin/double sharing - 3 star accommodation)<br />Valid to 31 December 2020');?></p>
             <table class="uk-table tablepax">                  
                        <tbody>
                            <tr>
                                <td class="titlepricepax" width="40%"><?php echo Yii::t('app','No.pax');?></td>
                                <td class="titlepricepax uk-text-center"><?php echo Yii::t('app','Price/pp');?></td>
                            </tr>
                            <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','1 pax');?></td>
                                <td class="uk-text-center pricepax"><?php echo $model->pax1;?></td>                               
                            </tr> 
                            <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','2 pax');?></td>
                                <td class="uk-text-center pricepax"><?php echo $model->pax2;?></td>                               
                            </tr>
                            <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','3-4 pax');?></td>
                                <td class="uk-text-center pricepax"><?php echo $model->pax3;?></td>                               
                            </tr>
                            <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','5-7 pax');?></td>
                                <td class="uk-text-center pricepax"><?php echo $model->pax4;?></td>                               
                            </tr>
                            <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','>8 pax');?></td>
                                <td class="uk-text-center pricepax">
                                <?php
                                    if( $model->pax5=='Contact us' || $model->pax5=='contact us' || $model->pax5=='Contact' || $model->pax5=='contact'){
                                        echo '<a href="'.Url::toRoute(array('site/contactus')).'" class="pricepax">'.$model->pax5.'</a>';
                                    }else{
                                        echo $model->pax5;
                                   }                                
                                 ?>  
                                 </td>                               
                            </tr>
                             <tr>                               
                                <td class="titlepricepax"><?php echo Yii::t('app','Single Sup');?></td>
                                <td class="uk-text-center pricepax"><?php echo $model->pax_single;?></td>                               
                            </tr>                            
                        </tbody>
                    </table>   
           </div>
    </div>
    <?php } ?>
    <div class="serviceinclude">
          <h5><?php echo Yii::t('app','Service Included');?></h5>
          <div class="content">
           <?php echo $model->price_include;//HtmlPurifier::process($model->price_include);?>    
           </div>
    </div>
    <div class="notserviceinclude">
          <h5><?php echo Yii::t('app','Service Not Included');?></h5>
          <div class="content">
          <?php echo $model->price_not_include;//HtmlPurifier::process($model->price_not_include);?>
         </div>
    </div>
  <div class="requestprize" style="text-align: center;">
     <a class="btnrequest" href="<?php echo $url_price;?>"><?php echo Yii::t('app', 'Book This Trip');?></a>
   </div>  
   <br />
<?php echo Socialshare::widget(array('view'=>'mobi','url'=>$urlshare));?> 
</div>
 <!--End begin Service--> 
 <!--Recomment-->
 <div class="boxothertour"> 
            <?php
            if(!empty($model)){
                echo Othertour::widget(array('view'=>'mobi','cat_id'=>$model->cat_id,'tour_id' =>$model->id));
             }
            ?>   
</div>   
<div class="boxbottom">            
       <ul class="uk-list">
           <li class="title">  
             <?php echo Yii::t('app','Create your own trip or see other travel ideas');?>
           </li>
            <li >  
             <p><?php echo Html::a(Yii::t('app','Design your travel plan'),array('customize'), array('class' => 'btnplan')) ?></p>
             <p><?php echo Yii::t('app','Or');?></p>
             <p><?php echo Html::a(Yii::t('app','View all tours'),array('alltour'), array('class' => 'btnalltour')) ?></p>
           </li>
       </ul>
   </div>    
 <!--End Recomment-->
 <?php echo Servicework::widget(array('view' =>'tourmobi'));?>
 <?php echo Travellerreview::widget(array('view' =>'mobi'));?>
 </div>