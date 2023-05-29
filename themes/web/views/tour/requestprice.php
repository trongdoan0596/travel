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
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;  
use dosamigos\datepicker\DatePicker;
use common\helper\StringHelper;
$slccouple  = Yii::$app->request->get('slccouple',0);
$slcyear    = Yii::$app->request->get('slcyear','');
$class_ex ='';
if(!empty($model)){
    $class_ex ='slidesubbg_cate'.$model->cat_id;
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
                     //echo $this->render('_map',array('model'=>$model,'details'=>$details));   
                     ?>
                     <?php        
                    }else{
                        echo 'Updating!';
                    }   
                ?>                      
          </div>
      </div>
<!--requestprice-->
<?php 
if($msg !=''){
    ?> 
     <div class="uk-container uk-container-center">    
        <div class="uk-alert uk-alert-success" data-uk-alert="" style="text-align: center;padding: 20px;"> 
             <a class="uk-alert-close uk-close"></a>
             <p><?php echo $msg;?></p>
        </div>
    </div>
    <?php
}
if(!empty($model)){    
    $url_tour  = $model->createUrl($model);
    $form = ActiveForm::begin(
                              array('id' => 'requestfrm',
                                    'enableClientValidation'=>true,
                                    'validateOnSubmit' => true,
                                    'options' =>array(
                                        'class' => 'uk-form'
                                     )
                                   )
                             ); 
       echo $form->errorSummary($model,array("id"=>"errorid","class"=>"uk-container-center errorsummary")).'<br />';                 
      ?>     
    <div class="requestprice">
        <div class="uk-container uk-container-center">    
             <h3><?php echo Yii::t('app','BOOK THIS TRIP');?></h3>
             <div class="boxprice">             
                <div class="shorttxt"><?php echo Yii::t('app','You are interested in');?> : <b><?php echo $model->title;?> ?</b> <?php echo Yii::t('app', 'Simply fill out this information and we will reply as soon as possible.');?></div>
                <ul class="uk-list">
                        <li>
                        <label><?php echo Yii::t('app', 'Gender');?></label>
                            <select name="RequestpriceForm[title]">
                                 <option value="<?php echo Yii::t('app', 'Mr.');?>"><?php echo Yii::t('app', 'Mr.');?></option>
                                 <option value="<?php echo Yii::t('app', 'Ms.');?>"><?php echo Yii::t('app', 'Ms.');?></option>                                
                            </select> 
                        </li>      
                       <li>     
                         <?php echo $form->field($modelform,'name')->textInput(array('class' =>'uk-form-width-medium'))->label(Yii::t('app','Name').' *');?>
                        </li>                       
                        <li>
                           <?php echo $form->field($modelform,'nationality')->textInput(array('class' =>'uk-form-width-medium'));?>           
                        </li>                         
                        <li>
                          <?php echo $form->field($modelform,'phone')->textInput(array('class' =>'uk-form-width-medium'))->label(Yii::t('app','Phone').' *');?>          
                        </li>                        
                        <li>
                           <?php echo $form->field($modelform,'email')->textInput(array('class' =>'uk-form-width-medium'))->label(Yii::t('app','E-mail').' *');?>         
                        </li>
                         <li>
                          <?php echo $form->field($modelform,'confirmemail')->textInput(array('class' =>'uk-form-width-medium'))->label(Yii::t('app','Confirm E-mail').' *');?>         
                        </li> 
                                           
                        <li class="uk-display-inline-block">
                          <div class="uk-grid uk-display-inline-block uk-position-relative uk-width-1-1" style="width: 100%;">
                           <?php echo $form->field($modelform,'adult')->textInput(array('class' =>'uk-form-width-medium'))->label(Yii::t('app','Number of participants').' *');?>
                           <label style="width: 90px !important;padding-left: 0px;padding-right: 0px;">
                           <?php echo Yii::t('app', 'Adult(s) and');?> </label>
                           <?php echo $form->field($modelform,'children')->textInput(array('class' =>'uk-form-width-medium'))->label(false);?>
                           <span style="float: right;margin-top: -30px;"><?php echo Yii::t('app', 'Children under 12 years old');?> </span>
                       </div> 
                        </li>
                       <li class="uk-display-inline-block"> 
                           <label class="control-label" for="requestpriceform-traveldate_id1" style="cursor: pointer;"><?php echo Yii::t('app', 'Arrival date');?></label>                        
                              
                            <?php echo DatePicker::widget(array(
                                    'model' =>$modelform,
                                    'attribute' =>'depart',
                                    'template' => '{input}{addon}',
                                    'clientOptions' => array(                               
                                            'autoclose' => true,
                                            'format' => 'dd M yyyy'
                                        )
                                ));
                            ?>
                        </li>
                         <br />                       
                         <li>
                          <?php echo $form->field($modelform,'mess')->textarea(array('class' =>'uk-display-inline-block','rows' =>6,'cols' =>50,'placeholder'=>Yii::t('app','To help our travel consultant to create the first proposal as close as possible to your expectations, please, specify your desires, request about the itinerary, cultural activities, sportive activities').' ... '));?>
                         </li>
                         <li class="uk-display-inline-block">
                             <label class="control-label" for="requestpriceform-how_did_id"><?php echo Yii::t('app', 'How did you find us');?></label> 
                             <div class="uk-form-row boxhotel" style="float: right;">       
                             
                             <?php
                                     $allhowdid = $modelform->getAllHowDidUs();
                                     if(!empty($allhowdid)){
                                        $i=1;
                                        foreach ($allhowdid as $key => $value) {                                                                                  
                                            ?>   
                                              <div class="radio-item" style="width:170px !important;">
                                                <input data-id="0" onclick="ChangeHowDid(<?php echo $key;?>);" type="radio" id="requestpriceform-how_did_id<?php echo $key;?>" name="RequestpriceForm[how_did_id]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-how_did_id<?php echo $key;?>" style="text-align: left;"><?php echo $value;?></label>
                                             </div>                                             
                                            <?php
                                            if($i==3) echo '<br />';
                                            $i++;
                                       }                         
                                    }
                              ?>
                               <div style="padding-top: 14px;" > 
                                    <?php echo $form->field($modelform,'howdidtxt')->textarea(array('class' =>'uk-display-inline-block','rows' =>2,'cols' =>58,'placeholder'=>Yii::t('app','Please tell us how you heard about us. Recommendation of a friend? Internet search ? If so, with what keywords? Social networks? Forums If yes, which ones ?')))->label(false);?>
                                </div>
                              </div>              
                        </li>
                         <li style="vertical-align: top;">
                          <?php echo $form->field($modelform,'verifyCode')->widget(Captcha::className(),array('imageOptions'=>array('alt'=>'Captcha'),'template' =>'<div class="captchacode"><div class="col-code">{input}</div><div class="col-img">{image}<br /><div style="white-space: nowrap;">'.Yii::t('app','You must type the characters of the image in the text box').'</div></div></div>',)); ?>
                         </li>                        
                        <?php 
                        $modelform->tour_id = $model->id;
                        echo $form->field($modelform,'tour_id')->hiddenInput()->label(false);
                        $modelform->title_tour = $model->title;
                        echo $form->field($modelform,'title_tour')->hiddenInput()->label(false);
                        
                        ?>
                  </ul>                   
             </div>
             <div style="text-align: center !important;padding-top: 20px;padding-bottom: 20px;">
                  <a class="btn btn-warning clsback" href="<?php echo $url_tour;?>"><i class="uk-icon-arrow-left"></i> <?php echo Yii::t('app','Back');?></a>
                  &nbsp&nbsp&nbsp <?php echo Html::submitButton(Yii::t('app','Send').'  <i class="uk-icon-angle-double-right"></i>',array('id'=>'idrequest','class' =>'btn btn-warning clsback', 'name' => 'sendrequest')) ?>
             </div>
        </div>
    </div>  
    <?php ActiveForm::end(); ?>       
 <?php
}
?>    
<!--End requestprice-->
<!--begin Service-->
<div class="boxserviceinclude">     
      <div class="uk-container uk-container-center">           
            <div class="uk-grid">
                 <div class="uk-width-1-2">
                     <div class="serviceinclude">
                          <h5><?php echo Yii::t('app','Service Included');?></h5>
                          <div class="content">
                           <?php echo $model->price_include;//HtmlPurifier::process($model->price_include);?>    
                           </div>
                     </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="notserviceinclude">
                          <h5><?php echo Yii::t('app','Service Not Included');?></h5>
                          <div class="content">
                          <?php echo $model->price_not_include;//HtmlPurifier::process($model->price_not_include);?>
                         </div>
                    </div>
                 </div>
             </div>  
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
                     <?php echo Yii::t('app','You will like to create your own travel or see other travel ideas');?>  
                   </li>
                    <li>  
                    <?php echo Html::a(Yii::t('app','Design your travel plan'),array('customize'), array('class' => 'btn btn-warning btnplan')) ?>
                     &nbsp;&nbsp; or &nbsp;&nbsp; 
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
<script language="javascript">
function ChangeSlc(id,name){
   var dataid = $("#requestpriceform-"+name+id).attr("data-id");
   if(dataid==0){
       $("#requestpriceform-"+name+id).attr("data-id","1");
       $("#requestpriceform-"+name+id).attr("checked");
   }else{
       $("#requestpriceform-"+name+id).attr("data-id","0");
       $("#requestpriceform-"+name+id).removeAttr("checked");
   }     
}
function ChangeHowDid(id){ 
          switch(id){
                case 1:
                     $("#requestpriceform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");                
                    break;
                case 2:
                    $("#requestpriceform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
               case 3:
                     $("#requestpriceform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
               case 4:
                     $("#requestpriceform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
                case 4:
                     $("#requestpriceform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");  
                    break;     
        }
}
$('#idrequest').on('click', function(e) { 
    $("#idrequest").hide().delay(3000).fadeIn();
    //e.preventDefault();
});
$('#requestfrm').on('afterValidate', function (event, messages) {
   if(typeof $('.has-error').first().offset() !== 'undefined') {
     $("#errorid").show();
     $('html, body').animate({scrollTop: $("#errorid").offset().top - 100},1000);
   }
});
</script>   