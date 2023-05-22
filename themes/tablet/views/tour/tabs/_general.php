<?php
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\captcha\Captcha;  
use common\helper\StringHelper;
?>
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
<div class="boxitem profile traveldate">
   <h1><?php echo Yii::t('app', 'Your Travel Dates');?></h1>
   <div class="uk-form-row">
          
          <div class="uk-width-1-1" style="padding-left: 4px;margin-left: 0px;padding-top: 20px;">
                        <div class="radio-itemdate" style="width: 335px;float: left; white-space: nowrap;display: block;">                           
                            <label for="customizeform-traveldate_id2"><?php echo Yii::t('app','Travel date');?>:</label>                       
                        </div>
                        <select name="CustomizeForm[arrivaldate_other_m]">
                               <?php  
                               $tmp= array();
                               if($slcyear!=''){
                                //Novembre+2016
                                 $tmp =  explode(" ",$slcyear);                                
                               }
                                  $arr = array("January","February","March","April","May","June","July","August","September","October","November","December");
                                  foreach ($arr as $key => $value){                                 
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
                        <div style="float: right;padding-top: 4px;"><?php echo Yii::t('app', 'Days');?></div>
                         
                  </div>
          </div>
          
   </div>
</div> 
<div class="boxitem profile">
       <h1><?php echo Yii::t('app', 'You prefer to stay');?>:</h1>
       <div class="uk-form-row">       
             <?php
                     $allacc = $model->getAllAccType();
                     //echo $form->field($model,'profile_id')->radioList($allprofile);
                     if(!empty($allacc)){
                        $i=1;
                        foreach ($allacc as $key => $value){                        
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
    <h1><?php echo Yii::t('app', 'Your message');?>:</h1>
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
                        foreach ($rows as $key => $value){
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
          <?php echo $form->field($model,'phone')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>        
        <li>
           <?php echo $form->field($model,'email')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>
        <li>
          <?php echo $form->field($model,'confirmemail')->textInput(array('class' =>'uk-form-width-medium'));?>          
        </li>      
         <li>
          <?php echo $form->field($model,'verifyCode')->widget(Captcha::className(),array('template' =>'<div class="captchacode"><div class="col-code">{input}</div><div class="col-img">{image}<br /><div style="white-space: nowrap;">'.Yii::t('app','You must type the characters of the image in the text box').'</div></div></div>',)); ?>       
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