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
                    
      ?>     
    <div class="requestprice">
        <div class="uk-container uk-container-center">    
             <h3><?php echo Yii::t('app','Request Price');?></h3>
             <div class="boxprice">             
                <div class="shorttxt">Vous souhaitez avoir le prix pour le voyage : <b><?php echo $model->title;?> ?</b> Veuillez remplir simplement ces infomations, nous vous répondront dans le meilleur délai.</div>
                <?php  echo $form->errorSummary($model,array("id" =>"errorpriceid","class" => "uk-container-center errorsummary ")).'<br />';?>
                <ul class="uk-list">
                        <li>
                        <label><?php echo Yii::t('app', 'Civilité');?></label>
                            <select name="RequestpriceForm[title]">
                                 <option value="<?php echo Yii::t('app', 'M');?>"><?php echo Yii::t('app', 'M');?></option>
                                 <option value="<?php echo Yii::t('app', 'Mme');?>"><?php echo Yii::t('app', 'Mme');?></option>
                                 <option value="<?php echo Yii::t('app', 'Mlle');?>"><?php echo Yii::t('app', 'Mlle');?></option>
                            </select> 
                        </li>      
                       <li>     
                         <?php echo $form->field($modelform,'name')->textInput(array('class' =>'uk-form-width-medium'));?>
                        </li>                      
                        <li>
                           <?php echo $form->field($modelform,'nationality')->textInput(array('class' =>'uk-form-width-medium'));?>           
                        </li>                         
                        <li>
                          <?php echo $form->field($modelform,'phone')->textInput(array('class' =>'uk-form-width-medium'));?>          
                        </li>                        
                        <li>
                           <?php echo $form->field($modelform,'email')->textInput(array('class' =>'uk-form-width-medium'));?>          
                        </li>    
                        <li class="uk-display-inline-block contactmuti">                          
                             <label class="control-label" for="requestpriceform-contact-title"><?php echo Yii::t('app', 'How would you like to be connected ?');?></label> 
                             <div class="uk-form-row" style="float: right;">       
                             <?php
                                     $allcontact = $modelform->getAllContact();
                                     if(!empty($allcontact)){
                                        $i=1;
                                        foreach ($allcontact as $key => $value) {                                         
                                          //  $checked="";
                                           // if($i==1) $checked = 'checked="checked"';
                                            ?>
                                             <div class="radio-item">
                                                <input data-id="0" type="radio" id="requestpriceform-contact<?php echo $key;?>" name="RequestpriceForm[contact]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-contact<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                            <?php
                                            $i++;
                                       }                         
                                    }
                              ?> 
                              </div>                                        
                        </li>    
                       <li>
                          <?php echo $form->field($modelform,'contacttxt')->textarea(array('class' =>'uk-form-width-large','rows'=>2,'placeholder'=>Yii::t('app','Your availability for discussion with us on Skype / phone')));?>          
                        </li>                      
                        <li class="uk-display-inline-block">
                          <div class="uk-grid uk-display-inline-block uk-position-relative uk-width-1-1" style="width: 100%;">
                           <?php echo $form->field($modelform,'adult')->textInput(array('class' =>'uk-form-width-medium'));?>
                           <label style="width: 90px !important;padding-left: 0px;padding-right: 0px;">
                           <?php echo Yii::t('app', 'Adult(s) and');?> </label>
                           <?php echo $form->field($modelform,'children')->textInput(array('class' =>'uk-form-width-medium'))->label(false);?>
                           <span style="float: right;margin-top: -30px;"><?php echo Yii::t('app', 'Children under 12 years old');?> </span>
                       </div> 
                        </li>                       
                         <li >                          
                        <?php 
                           echo $form->field($modelform,'age_desc')->textarea(array("class"=>"uk-form-width-large","rows"=>"2","placeholder"=>Yii::t("app","Specify the age of the participants")));
                         ?>            
                        </li>     
                         <br /> 
                       <li class="uk-display-inline-block"> 
                           <div class="uk-width-1-1" style="padding-left:0px;margin-left: 0px;padding-top:0px;">
                             <label for="requestpriceform-traveldate_id2" style="cursor: pointer;"><?php echo Yii::t('app', 'Date / Time of arrival on the spot');?></label>
                             <select name="RequestpriceForm[arrivaldate_other_d]">
                                      <option value=""><?php echo Yii::t('app', 'Quelle date ?');?></option>
                                       <?php  
                                       for($i=1;$i<=31;$i++){
                                        if($i<10) $n = '0'.$i;
                                         else $n = $i;
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                       }                                      
                                     ?>                                    
                                </select>&nbsp;&nbsp; 
                             <select name="RequestpriceForm[arrivaldate_other_m]">
                              <option value=""><?php echo Yii::t('app', 'Quel mois ?');?></option>
                               <?php  
                               $tmp= array();
                               if($slcyear!=''){
                                //Novembre+2016
                                 $tmp =  explode(" ",$slcyear);                                
                               }
                                $arr = array("January","February","March","April","May","June","July","August","September","October","November","December");
                                foreach ($arr as $key => $value) {
                                        $v = $value;
                                        if(count($tmp)>0 && $tmp[0] == StringHelper::showMonthfr($v)){
                                             echo '<option selected="selected" value="'.StringHelper::showMonthfr($v).'">'.StringHelper::showMonthfr($v).'</option>';
                                        }else{
                                             echo '<option value="'.StringHelper::showMonthfr($v).'">'.StringHelper::showMonthfr($v).'</option>';
                                        }
                                       
                                  }
                                ?>
                        </select>&nbsp;&nbsp;
                        <select name="RequestpriceForm[arrivaldate_other_y]">
                         <option value=""><?php echo Yii::t('app', 'Quel an ?');?></option>  
                              <?php                             
                                  $n = 2;
                                  for ($i = 0; $i <= $n; $i++) {                                        
                                        $v = date("Y");
                                        if(count($tmp)>0 && (int)$tmp[1] == (int)($v+$i)){
                                            echo '<option value="'.($v+$i).'" selected="selected">'.($v+$i).'</option>';
                                        }else{
                                            echo '<option value="'.($v+$i).'">'.($v+$i).'</option>'; 
                                        }
                                        
                                    }
                                  ?> 
                        </select>
               </div>
               </li>  
               <br />
                 <li class="uk-display-inline-block contactmuti">                          
                             <label class="control-label" for="requestpriceform-hotel"><?php echo Yii::t('app', 'Start city');?></label> 
                             <div class="uk-form-row" style="float: right;">       
                             <?php
                                     $allage = $modelform->getAllCityStart();
                                     if(!empty($allage)){
                                        $i=1;
                                        foreach ($allage as $key => $value) {                                                                             
                                            ?>
                                             <div class="radio-item">
                                                <input type="radio" id="requestpriceform-start_city<?php echo $key;?>" name="RequestpriceForm[start_city]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-start_city<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                            <?php
                                            $i++;
                                       }                         
                                    }
                              ?> 
                              </div>                                        
                        </li> <br />
                      <li class="uk-display-inline-block contactmuti">                          
                             <label class="control-label" for="requestpriceform-hotel"><?php echo Yii::t('app', 'End city');?></label> 
                             <div class="uk-form-row" style="float: right;">       
                             <?php
                                     $allage = $modelform->getAllCityEnd();
                                     if(!empty($allage)){
                                        $i=1;
                                        foreach ($allage as $key => $value) {                                        
                                          //  $checked="";
                                           // if($i==1) $checked = 'checked="checked"';
                                            ?>
                                             <div class="radio-item">
                                                <input type="radio" id="requestpriceform-end_city<?php echo $key;?>" name="RequestpriceForm[end_city]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-end_city<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                            <?php
                                            $i++;
                                       }                         
                                    }
                              ?> 
                              </div>                                        
                        </li>      
                       <li class="uk-display-inline-block">                          
                             <label class="control-label" for="requestpriceform-hotel"><?php //echo Yii::t('app', 'Age');?></label> 
                            <!-- <div class="uk-form-row" style="float: right;">       
                             <?php
                                /*     $allage = $modelform->getAllAge();
                                     if(!empty($allage)){
                                        $i=1;
                                        while (list($key, $value) = each ($allage)) {
                                          //  $checked="";
                                           // if($i==1) $checked = 'checked="checked"';
                                            ?>
                                             <div class="radio-item">
                                                <input data-id="0" onclick="ChangeSlc(<?php echo $key;?>,'age');" type="radio" id="requestpriceform-age<?php echo $key;?>" name="RequestpriceForm[age<?php echo $key;?>]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-age<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                            <?php
                                            $i++;
                                       }                         
                                    }
                                    */
                              ?> 
                              </div>-->
                                        
                        </li> 
                      <li class="uk-display-inline-block" style="display: block;">                          
                             <label class="control-label" for="requestpriceform-hotel"><?php echo Yii::t('app', 'Meals');?></label> 
                             <div class="uk-form-row boxmeals" style="float: right;">       
                             <?php
                                     $allage = $modelform->getAllMeals();
                                     if(!empty($allage)){
                                        $i=1;
                                        foreach ($allage as $key => $value) {                                                                       
                                            ?>
                                             <div class="radio-item">
                                                <input data-id="0" onclick="ChangeSlc(<?php echo $key;?>,'meals');" type="radio" id="requestpriceform-meals<?php echo $key;?>" name="RequestpriceForm[meals<?php echo $key;?>]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-meals<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                             <br />
                                            <?php
                                            $i++;
                                       }                         
                                    }
                              ?> 
                              </div>                                        
                        </li> 
                        <br />
                       <li class="uk-display-inline-block">
                             <label class="control-label" for="requestpriceform-hotel"><?php echo Yii::t('app', 'Hotel');?></label> 
                             <div class="uk-form-row boxhotel" style="float: right;">       
                             <?php
                                     $allhotel = $modelform->getAllHotelType();
                                     if(!empty($allhotel)){
                                        $i=1;
                                        foreach ($allhotel as $key => $value) {                                        
                                          //  $checked="";
                                           // if($i==1) $checked = 'checked="checked"';
                                            ?>
                                             <div class="radio-item radioitem<?php echo $i;?>" style="margin-right: 10px;">
                                                <input data-id="0" onclick="ChangeSlc(<?php echo $key;?>,'hotel');" type="radio" id="requestpriceform-hotel<?php echo $key;?>" name="RequestpriceForm[hotel<?php echo $key;?>]" value="<?php echo $key;?>" />
                                                <label for="requestpriceform-hotel<?php echo $key;?>"><?php echo $value;?></label>
                                             </div>
                                             <br />
                                            <?php
                                            $i++;
                                       }                         
                                    }
                              ?> 
                              </div>
              
                        </li>
               
                         <li>
                          <?php echo $form->field($modelform,'mess')->textarea(array('class' =>'uk-display-inline-block','rows' =>6,'cols' =>50,'placeholder'=>Yii::t('app','To help our travel consultant make a first estimate that is as close as possible to your expectations, please specify all your wishes, your requests for the itinerary, your wishes for cultural activities, sports, etc.').' ... '));?>
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
                                    <?php echo $form->field($modelform,'howdidtxt')->textarea(array('class' =>'uk-display-inline-block','style'=>'width: 100%;','rows' =>2,'cols' =>58,'placeholder'=>Yii::t('app','Please tell us how you heard about us. Recommendation of a friend? Internet search ? If so, with what keywords? Social networks? Forums If yes, which ones ?')))->label(false);?>
                                </div>
                              </div>              
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
     $("#errorpriceid").show();
     $('html, body').animate({scrollTop: $("#errorpriceid").offset().top - 100},1000);
   }
});
</script>   