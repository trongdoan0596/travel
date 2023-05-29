<?php
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\captcha\Captcha;  
use common\helper\StringHelper;
?>
<div class="boxitem profile">
    <h1><?php echo Yii::t('app', 'Your Profile');?></h1>
    <div class="uk-form-row">       
    <?php
         $allprofile = $model->getAllProfile();
         //echo $form->field($model,'profile_id')->radioList($allprofile);
         if(!empty($allprofile)){
            $i=1;            
            $slccouple = Yii::$app->request->get('slccouple',0); 
            foreach ($allprofile as $key => $value) {            
                $checked="";
                if($i==1) $checked = 'checked="checked"';
                if($i==$slccouple) $checked = 'checked="checked"';
                ?>
                 <div class="radio-item">
                    <input type="radio" data="0" id="ritem<?php echo $key;?>" name="CustomizeForm[profile_id]" value="<?php echo $key;?>" <?php echo $checked;?> />
                    <label for="ritem<?php echo $key;?>"><?php echo $value;?></label>
                 </div>
                <?php
                $i++;
           }                         
        }
    ?>                
    </div> 
</div>
<div class="boxitem profile participants">
   <h1><?php echo Yii::t('app', 'The Participants');?></h1>
   <div class="uk-form-row">
             <div class="numberadults" style="padding-right:48px;float: left;">
                   <?php echo $form->field($model,'number_adults')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left: 10px;'));?>  
             </div>
             <div class="numberchildren">                    
                   <?php echo $form->field($model,'number_children')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left: 10px;'));?>  
             </div>  
                
   </div>
</div> 
<!--
<div class="boxitem profile">
           <h1><?php echo Yii::t('app', 'Tour PurPoses');?></h1>
            <div class="uk-form-row">   
              <?php
                     $rows = $model->getAllPurPoses();                     
                     if(!empty($rows)){
                        $i=1;
                        foreach ($rows as $key => $value) {                        
                            $checked="";
                            if($i==1) $checked = 'checked="checked"';
                            if($i<3){
                                ?>
                                 <div class="radio-item">
                                        <input type="radio" id="customizeform-purposes_id<?php echo $key;?>" name="CustomizeForm[purposes_id]" value="<?php echo $key;?>" />
                                        <label for="customizeform-purposes_id<?php echo $key;?>"><?php echo $value;?></label>
                                 </div>                             
                            <?php
                            }else{
                            ?>
                              <div class="radio-item">
                                    <input type="radio" id="customizeform-purposes_id<?php echo $key;?>" name="CustomizeForm[purposes_id]" value="<?php echo $key;?>"  />
                                    <label for="customizeform-purposes_id<?php echo $key;?>"><?php echo $value;?></label>
                                    <input type="text" value="" style="width: 410px;" name="CustomizeForm[purposesothertxt]" placeholder="<?php echo Yii::t('app','Enter you text here');?>" />
                             </div>                            
                            <?php
                            }
                            $i++;
                       }                         
                    }
                ?>                 
            </div>           
</div>-->
<div class="boxitem profile traveldate">
   <h1><?php echo Yii::t('app', 'Your Travel Dates');?></h1>
   <div class="uk-form-row">
           <div class="uk-grid" style="padding: 0px;margin: 0px;">
               <div class="uk-width-1-2" style="padding: 0px;margin: 0px;">
                   <div class="radio-itemdate" style="background: none !important;">                           
                           <label for="customizeform-traveldate_id1"><?php echo Yii::t('app', 'Arrival Date');?></label>   
                            <?php echo DatePicker::widget(array(
                                    'model' =>$model,
                                    'attribute' =>'arrivaldatetxt',
                                    'template' => '{input}{addon}',
                                    'clientOptions' => array(                               
                                            'autoclose' => true,
                                            'format' => 'dd M yyyy'
                                        )
                                ));
                            ?>   
                    </div>
               </div>                             
          </div>    
          <div class="uk-width-1-1" style="padding-left: 4px;margin-left: 0px;padding-top: 20px;">
                        <div class="radio-itemdate" style="width: 335px;float: left; white-space: nowrap;display: block;">                           
                            <label for="customizeform-traveldate_id2"><?php echo Yii::t('app','Otherwise, which month you prefer?');?></label>                       
                        </div>
                        <select name="CustomizeForm[arrivaldate_other_m]">
                               <?php  
                               $tmp= array();
                               if($slcyear!=''){
                                //Novembre+2016
                                 $tmp =  explode(" ",$slcyear);                                
                               }
                                  $arr = array("January","February","March","April","May","June","July","August","September","October","November","December");
                                  foreach ($arr as $key => $value) {                                 
                                        $v = $value;
                                        if(count($tmp)>0 && $tmp[0] == $v){
                                             echo '<option selected="selected" value="'.$v.'">'.$v.'</option>';
                                        }else{
                                             echo '<option value="'.$v.'">'.$v.'</option>';
                                        }
                                       
                                  }
                                ?>  
                          
                        </select>&nbsp;&nbsp;
                        <select name="CustomizeForm[arrivaldate_other_y]">
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
        <!--  <div class="serviceyesno">    
                <div class="radio-item">
                       <?php //echo Yii::t('app','Have you booked your international flight(We do not offer this service)');?>
                       <div class="radio-item">
                            <input type="radio" id="customizeform-flight_idyes" name="CustomizeForm[flight_id]" value="1" checked="checked"   />
                            <label for="customizeform-flight_idyes"><?php //echo Yii::t('app','Yes');?></label> 
                        </div>
                        <div class="radio-item">
                                <input type="radio" id="customizeform-flight_idno" name="CustomizeForm[flight_id]" value="2" />
                                <label for="customizeform-flight_idno"><?php //echo Yii::t('app','No');?></label>  
                      </div>                       
                  </div>
          </div>
          -->
          <div class="locallynight">
                <div class="radio-item1" style="display: inline-block;padding-left: 30px;">
                         <?php echo $form->field($model,'number_nights')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left:105px;margin-right: 12px;'));?>
                        <div style="float: right;padding-top: 4px;"><?php echo Yii::t('app', 'Nights');?></div>
                         
                  </div>
          </div>
          
   </div>
</div> 
<div class="boxitem profile">
         <h1><?php echo Yii::t('app', 'Your Accommodation types');?> <span>(<?php echo Yii::t('app','Several choices');?>)</span></h1>
       <div class="uk-form-row">       
             <?php
                     $allacc = $model->getAllAccType();
                     //echo $form->field($model,'profile_id')->radioList($allprofile);
                     if(!empty($allacc)){
                        $i=1;
                        foreach ($allacc as $key => $value) {                       
                          //  $checked="";
                           // if($i==1) $checked = 'checked="checked"';
                            ?>
                             <div class="radio-item itemprofile">
                                <input data-id="0" onclick="ChangeTypeAcc(<?php echo $key;?>,'typeacc');" type="radio" id="customizeform-typeacc<?php echo $key;?>" name="CustomizeForm[typeacc<?php echo $key;?>]" value="<?php echo $key;?>" />
                                <label for="customizeform-typeacc<?php echo $key;?>"><?php echo $value;?></label>
                             </div>
                            <?php
                            $i++;
                       }                         
                    }
                ?> 
    </div>
</div>

<div class="boxitem">
    <h1><?php echo Yii::t('app', 'Tour Type');?><span>(<?php echo Yii::t('app','Several choices');?>)</span></h1>
    <ul class="tourtype">
                <?php
                     $rows = $model->getAllType();                     
                     if(!empty($rows)){
                        $i=1;
                        foreach ($rows as $key => $value) {                        
                            $checked="";
                            if($i==1) $checked = 'checked="checked"';                           
                            ?>
                             <li>
                                 <div class="radio-item">
                                    <input data-id="0" onclick="ChangeTypeAcc(<?php echo $key;?>,'typetour');" type="radio" id="customizeform-typetour<?php echo $key;?>" name="CustomizeForm[typetour<?php echo $key;?>]" value="<?php echo $key;?>" />
                                    <label for="customizeform-typetour<?php echo $key;?>"><?php echo $value;?></label>
                                 </div> 
                               </li>                          
                            <?php                           
                            $i++;
                       }                         
                    }
                ?>  
    </ul>
</div>
<div class="boxitem profile">
   <h1><?php echo Yii::t('app', 'Your favorite activities');?><span>(<?php echo Yii::t('app','Several choices');?>)</span></h1>
   <div class="notetxt">
   <?php echo Yii::t('app', 'For better proposal to match your desire, please tick  according to your preferences of activities, - being the less interested and ++ the more interested');?>
   </div>
   <div class="uk-form-row boxgowith">
          <ul class="uk-list">      
                <?php
                     $rows = $model->getAllGoWith();                     
                     if(!empty($rows)){
                        $j=1;
                        foreach ($rows as $key => $value) {                      
                            $checked="";
                            if($j==1) $checked = 'checked="checked"';                           
                            ?>  
                             <li>                          
                                 <div class="boxitemgo">
                                    <label for="customizeform-gowith<?php echo $key;?>"  style="white-space: nowrap;"><?php echo $value;?></label>
                                    <?php
                                    $arr = $model->getAllGoWithLabel();
                                    for($i=1;$i<=4;$i++){
                                        ?>
                                         <div class="radio-item">
                                            <input id="customizeform-gowith<?php echo $i.$key;?>" name="CustomizeForm[gowith<?php echo $key;?>]" value="<?php echo $i;?>" type="radio" />
                                            <label for="customizeform-gowith<?php echo $i.$key;?>"><?php echo $arr[$i];?></label>
                                         </div> 
                                        <?php
                                    }
                                    ?>                                    
                                 </div> 
                              </li>                                                        
                            <?php                           
                            $j++;
                       }                         
                    }
                ?>  
           </ul>               
   </div>
</div>
<div class="boxitem profile boxmeals">       
            <h1><?php echo Yii::t('app', 'Meals');?><span>(<?php echo Yii::t('app','Several choices');?>)</span></h1>
            <div class="uk-form-row">      
               <?php
                     $rows = $model->getAllMeals();                     
                     if(!empty($rows)){
                        $i=1;
                        foreach ($rows as $key => $value) {                        
                            $checked="";
                            if($i==1) $checked = 'checked="checked"';                           
                            ?>                            
                             <div class="radio-item itemgowwith-<?php echo $i;?>">
                                <input type="radio" data-id="0" onclick="ChangeTypeAcc(<?php echo $key;?>,'meals');" id="customizeform-meals<?php echo $key;?>" name="CustomizeForm[meals<?php echo $key;?>]" value="<?php echo $key;?>" />
                                <label for="customizeform-meals<?php echo $key;?>"><?php echo $value;?></label>
                             </div>                                                        
                            <?php                           
                            $i++;
                       }                         
                    }
                ?> 
        </div>
</div>
    
<div class="boxitem">
    <h1><?php echo Yii::t('app', 'Your budget');?></h1>
     <ul class="yourbudget">
       <li>
        <?php echo $form->field($model,'budgettxt')->textInput(array('class' =>'uk-form-width-small'));?>&nbsp;&nbsp;<?php echo Yii::t('app', '$ per person (excluding international flights)');?> 
        </li>
    </ul>
</div>
<div class="boxitem">
    <h1><?php echo Yii::t('app', 'Travel descriptions ');?></h1>
    <div class="yourdescription">
     <?php 
       echo $form->field($model,'descriptiontxt')->textarea(array("rows"=>"4","style"=>"100%","placeholder"=>"To help our travel consultant to create the first proposal as close as possible to your expectations, please, specify your desires, request about the itinerary, cultural activities, sportive activities..."))->label(false);
       ?>    
    </div>
</div>
<div class="boxitem profile">
    <h1><?php echo Yii::t('app', 'How did you find us');?></h1>  
    <div class="uk-form-row"> 
               <?php
                     $rows = $model->getAllHowDidUs();                     
                     if(!empty($rows)){
                        $i=1;
                        foreach ($rows as $key => $value) {                      
                            $checked="";
                            if($i==1) $checked = 'checked="checked"';                           
                            ?>                            
                             <div class="radio-item">
                                <input type="radio" id="customizeform-how_did_id<?php echo $key;?>" onclick="ChangeHowDid(<?php echo $key;?>);" name="CustomizeForm[how_did_id]" value="<?php echo $key;?>" />
                                <label for="customizeform-how_did_id<?php echo $key;?>"><?php echo $value;?></label>
                             </div>                                                        
                            <?php                           
                            $i++;
                       }                         
                    }
                ?> 
    </div>  
    <div class="uk-form-row"> 
    <?php 
     echo $form->field($model,'howdidtxt')->textarea(array("rows"=>"2","style"=>"100%","placeholder"=>Yii::t('app','Please tell us how you find us? From your friend\'s recommendation? Internet searching? If so, what key word?, Social networks? Forums? If yes, which one?')))->label(false);
    ?>
    </div>
</div>
<div class="boxitem yourdetail">
    <h1><?php echo Yii::t('app', 'Your Details');?></h1>
     <ul class="uk-list">
       <li>
       <label> </label>* Required fields
       </li>
        <li>
        <label><?php echo Yii::t('app', 'Gender');?></label>
            <select name="CustomizeForm[slcgender]" id="customizeform-slcgender">
                 <option value="<?php echo Yii::t('app','Mr.');?>"><?php echo Yii::t('app','Mr.');?></option>
                 <option value="<?php echo Yii::t('app','Ms.');?>"><?php echo Yii::t('app','Ms.');?></option>
            </select> 
        </li>
       <li>     
         <?php echo $form->field($model,'firstname')->textInput(array('class' =>'uk-form-width-medium'));?>
        </li>
          <li>     
         <?php echo $form->field($model,'lastname')->textInput(array('class' =>'uk-form-width-medium'));?>
        </li>
        <li>
           <?php echo $form->field($model,'nationality')->textInput(array('class' =>'uk-form-width-medium'));?>           
        </li>
        <li>
           <?php echo $form->field($model,'address')->textInput(array('class' =>'uk-form-width-large'));?>
        </li>  
        <li>
          <?php echo $form->field($model,'phone')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>        
        <li>
           <?php echo $form->field($model,'email')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>
          <?php echo $form->field($model,'confirmemail')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>
          <?php echo $form->field($model,'skype')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>
          <?php echo $form->field($model,'whatsapp')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>
          <?php echo $form->field($model,'viber')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>         
             <label class="control-label" for="customizeform-contact-title"><?php echo Yii::t('app', 'Which communication do you prefer ?');?></label> 
              <?php
                  $allcontact = $model->getAllContact();
                     if(!empty($allcontact)){
                        $i=1;
                        foreach ($allcontact as $key => $value) {                       
                          //  $checked="";
                           // if($i==1) $checked = 'checked="checked"';
                            ?>
                             <div class="radio-item muticontact">
                                <input data-id="0" onclick="ChangeTypeAcc(<?php echo $key;?>,'contact');" type="radio" id="customizeform-contact<?php echo $key;?>" name="CustomizeForm[contact<?php echo $key;?>]" value="<?php echo $key;?>" />
                                <label for="customizeform-contact<?php echo $key;?>"><?php echo $value;?></label>
                             </div>
                            <?php
                            $i++;
                       }                         
                    }
              ?>                
        </li>
        <li>
          <?php echo $form->field($model,'contacttxt')->textInput(array('class' =>'uk-form-width-large','rows' =>2,'placeholder'=>Yii::t('app','Your available time for discussion with us on skype/telephone')));?>        
        </li>
       
         <li>
          <?php echo $form->field($model,'verifyCode')->widget(Captcha::className(),array('imageOptions'=>array('alt'=>'Captcha'),'template' =>'<div class="captchacode"><div class="col-code">{input}</div><div class="col-img">{image}<br /><div style="white-space: nowrap;">'.Yii::t('app','You must type the characters of the image in the text box').'</div></div></div>',)); ?>       
        </li>
         <?php echo $form->field($model,'postalcode')->hiddenInput(array('class' =>'uk-form-width-medium'))->label(false);?>      
         <?php echo $form->field($model,'city')->hiddenInput(array('class' =>'uk-form-width-medium'))->label(false);?>
    </ul> 
</div>     
<div class="control-group">
    <div class="controls" style="text-align: center !important;">
       <?php echo Html::submitButton(Yii::t('app','Send').'  <i class="uk-icon-angle-double-right"></i>',array('id' =>'idcustomize','class' =>'uk-button sendcontact', 'name' => 'sendcontact')) ?>
    </div>
</div>
<script language="javascript">
function ChangeTypeAcc(id,name){
   var dataid = $("#customizeform-"+name+id).attr("data-id");
   if(dataid==0){
       $("#customizeform-"+name+id).attr("data-id","1");
       $("#customizeform-"+name+id).attr("checked");
   }else{
       $("#customizeform-"+name+id).attr("data-id","0");
       $("#customizeform-"+name+id).removeAttr("checked");
   }     
}
function ChangeHowDid(id){ 
          switch(id){
                case 1:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");                
                    break;
                case 2:
                    $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
               case 3:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
               case 4:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Please tell us how you know us');?>");   
                    break;
                case 4:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");  
                    break;     
        }
}
$('#idcustomize').on('click', function(e) { 
    $("#idcustomize").hide().delay(3000).fadeIn();
});
</script>        