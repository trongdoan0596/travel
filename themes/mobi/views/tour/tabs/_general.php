<?php
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\captcha\Captcha;  
use common\helper\StringHelper;
use common\models\Destination;
?>
<div class="boxitem profile participants">
   <h1><?php echo Yii::t('app', 'The Participants');?></h1>
   <div class="uk-form-row">
             <div class="numberadults" style="padding-right:48px;width: 100%; margin-bottom:12px !important;float: left;">
                   <?php echo $form->field($model,'number_adults')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left: 10px;'));?>  
             </div>
             <div class="numberchildren" style="margin-bottom: 12px !important;">                    
                   <?php echo $form->field($model,'number_children')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left: 10px;'));?>  
             </div>  
                
   </div>  
</div> 
<div class="boxitem profile traveldate">
   <h1><?php echo Yii::t('app', 'Your Travel Dates');?></h1>
   <div class="uk-form-row">             
          <div class="uk-width-1-1" style="margin-left: 0px;padding-top: 20px;">
                        <div class="radio-itemdate1" style="width: 315px;padding-left: 0px !important;margin-left: 0px !important; float: left; white-space: nowrap;display: block;margin-bottom: 12px !important;">                          
                            <label for="customizeform-traveldate_id2" style="text-align: left; margin-left: 0px !important; padding-left: 0px !important;"><?php echo Yii::t('app', 'Travel date');?>:</label>                       
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
          <div class="locallynight" style="padding-top: 20px !important;margin-top: 12px !important; width: 100%;">
                 <div class="radio-item1">
                       <label for="customizeform-number_nights" style="float: left !important;padding-right: 14px;"><?php echo Yii::t('app','Length of your trip');?></label>  
                        <?php echo $form->field($model,'number_nights')->textInput(array('class' =>'uk-form-width-mini','style'=>'margin-left:0px;margin-right:12px;'))->label(false);?>
                        <label class="nights"><?php echo Yii::t('app', 'Days');?></label>
                  </div>
          </div>
          
   </div>
</div> 
<div class="boxitem profile">
       <h1><?php echo Yii::t('app', 'You prefer to stay');?>:</h1>
       <div class="uk-form-row">       
             <?php
                     $allacc = $model->getAllAccType();
                    // asort($allacc);
                     ksort($allacc);
                     //echo $form->field($model,'profile_id')->radioList($allprofile);
                     if(!empty($allacc)){
                        $i=1;
                         foreach ($allacc as $key => $value) {                       
                          //  $checked="";
                           // if($i==1) $checked = 'checked="checked"';
                            ?>
                             <div class="radio-item itemprofile" style="margin-bottom: 8px !important;">
                                <input data-id="0" onclick="ChangeTypeAcc(<?php echo $key;?>,'typeacc');" type="radio" id="customizeform-typeacc<?php echo $key;?>" name="CustomizeForm[typeacc<?php echo $key;?>]" value="<?php echo $key;?>" />
                                <label for="customizeform-typeacc<?php echo $key;?>" style="padding-left:5px !important;"> <?php echo $value;?></label>
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
       echo $form->field($model,'descriptiontxt')->textarea(array("rows"=>"4","style"=>"margin-bottom: 12px !important;width:100%","placeholder"=>"To help our travel consultant to create the first proposal as close as possible to your expectations, please, specify your desires, request about the itinerary, cultural activities, sportive activities..."))->label(false);
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
                             <div class="radio-item" style="margin-bottom: 5px !important;">
                                <input type="radio" id="customizeform-how_did_id<?php echo $key;?>" onclick="ChangeHowDid(<?php echo $key;?>);" name="CustomizeForm[how_did_id]" value="<?php echo $key;?>" />
                                <label for="customizeform-how_did_id<?php echo $key;?>" style="padding-left: 5px !important;"> <?php echo $value;?></label>
                             </div>                                                        
                            <?php                           
                            $i++;
                       }                         
                    }
                ?> 
    </div>  
   
</div>
<div class="boxitem">
    <h1><?php echo Yii::t('app', 'Your Details');?></h1>
     <ul class="uk-list yourdetail">
       <li>
       <label>* Required fields</label>
       </li>
       <li style="padding-top: 15px;">
        <!--<label><?php //echo Yii::t('app', 'Sex');?></label>-->
            <select name="CustomizeForm[slcgender]" id="customizeform-slcgender">
                 <option value="<?php echo Yii::t('app','Mr.');?>"><?php echo Yii::t('app','Mr.');?></option>
                 <option value="<?php echo Yii::t('app','Ms.');?>"><?php echo Yii::t('app','Ms.');?></option>
            </select> 
        </li>
       <li>     
         <?php echo $form->field($model,'firstname')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','First name').'*'))->label(false);?>
        </li>
          <li>     
         <?php echo $form->field($model,'lastname')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Last name').'*'))->label(false);?>
        </li>
        <li>
           <?php echo $form->field($model,'nationality')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Nationality')))->label(false);?>        
        </li>       
        <li>
          <?php echo $form->field($model,'phone')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Phone').'*'))->label(false);?>        
        </li>
        
        <li>
           <?php echo $form->field($model,'email')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Email').'*'))->label(false);?>         
        </li>
         <li>
          <?php echo $form->field($model,'confirmemail')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Confirm email').'*'))->label(false);?>        
        </li>        
         <li style="padding-top: 15px;">
          <?php echo $form->field($model,'verifyCode')->widget(Captcha::className(),array('template' =>'<div class="captchacode" align="center"><div class="col-lg">{input}</div><div class="col-lg">{image}</div></div>'))->label(false); ?>
          <?php echo Yii::t('app','You must type the characters of the image in the text box');?>       
        </li>
         <?php echo $form->field($model,'postalcode')->hiddenInput(array('class' =>'uk-form-width-medium'))->label(false);?>      
         <?php echo $form->field($model,'city')->hiddenInput(array('class' =>'uk-form-width-medium'))->label(false);?>
    </ul> 
</div>     
<div class="control-group">
    <div class="controls" style="text-align: center !important;">
       <?php echo Html::submitButton(Yii::t('app','Send').'  <i class="uk-icon-angle-double-right"></i>',array('class' =>'uk-button sendcontact', 'name' => 'sendcontact')) ?>
    </div>
</div>
<script language="javascript">
function ChangeDest(txtdes,id,country_id){
   var dataid = $("#ritemdest"+id).attr("data-id");
   if(dataid==0){
       $("#ritemdest"+id).attr("data-id","1");
       $("#ritemdest"+id).attr("checked");
       switch (country_id) {
              case 232://vn
                    var vietnammap = $('#customizeform-vietnammap').val();
                    if(vietnammap!=''){
                         var arr = vietnammap.split('[-|-]');
                         var tmp = arr.indexOf(txtdes); 
                         if(tmp==-1){                            
                            //chua co trong mang
                             var vietnamid = parseInt($('#vietnamid').val())+1; 
                             $('#vietnamid').val(vietnamid);                             
                             $('#customizeform-vietnammap').val(vietnammap+'[-|-]'+txtdes);
                         }                       
                    }else{
                         var vietnamid = parseInt($('#vietnamid').val())+1; 
                         $('#vietnamid').val(vietnamid);
                         $('#customizeform-vietnammap').val(txtdes);
                    }
                    
                 break;
              case 116://laos
                    var laosmap = $('#customizeform-laosmap').val();
                    if(laosmap!=''){
                         var arr = laosmap.split('[-|-]');
                         var tmp = arr.indexOf(txtdes); 
                         if(tmp==-1){                            
                            //chua co trong mang
                             var laosid = parseInt($('#laosid').val())+1; 
                             $('#laosid').val(laosid);
                             $('#customizeform-laosmap').val(laosmap+'[-|-]'+txtdes);
                         }else{
                             alert('Désolé, cet élément existe déjà!');
                         }
                    }else{
                        $('#customizeform-laosmap').val(txtdes);
                        var laosid = parseInt($('#laosid').val())+1; 
                        $('#laosid').val(laosid);                         
                    }           
                 break;
              case 36://cambodia
                    var cambodiamap = $('#customizeform-cambodiamap').val();
                    if(cambodiamap!=''){
                         var arr = cambodiamap.split('[-|-]');
                         var tmp = arr.indexOf(txtdes); 
                         if(tmp==-1){                            
                            //chua co trong mang
                             var cambodiaid = parseInt($('#cambodiaid').val())+1;                    
                             $('#cambodiaid').val(cambodiaid);                            
                             $('#customizeform-cambodiamap').val(cambodiamap+'[-|-]'+txtdes);
                        }else{
                             alert('Désolé, cet élément existe déjà!');
                         }                        
                    }else{
                        $('#customizeform-cambodiamap').val(txtdes);
                        var cambodiaid = parseInt($('#cambodiaid').val())+1;                    
                        $('#cambodiaid').val(cambodiaid);                         
                    }
                 break;    
                    
         }        
   }else{
       //remove 
       $("#ritemdest"+id).attr("data-id","0");
       $("#ritemdest"+id).removeAttr("checked");
       switch (country_id) {
              case 232://vn                    
                      var vietnamtxt = $("#customizeform-vietnammap").val(); 
                      if(vietnamtxt!=''){
                         var arr = vietnamtxt.split('[-|-]');      
                         for (var i in arr){                              
                               if(arr[i] == txtdes) {
                                  delete arr[i];
                               }
                         }                        
                         var txtnew =  arr.join('[-|-]');
                         $('#customizeform-vietnammap').val(txtnew);                         
                     }
              break;
              case 116://laos
                      var laostxt = $("#customizeform-laosmap").val();                 
                      if(laostxt!=''){
                         var arr = laostxt.split('[-|-]');   
                         for (var i in arr){                              
                               if(arr[i] == txtdes) {
                                   delete arr[id];
                               }
                         }
                         var txtnew =  arr.join('[-|-]');
                         $('#customizeform-laosmap').val(txtnew);
                      }
              break;
              case 36://cambodia
                      var cambodiatxt = $("#customizeform-cambodiamap").val();
                      if(cambodiatxt!=''){
                         var arr = cambodiatxt.split('[-|-]');    
                         for (var i in arr){                              
                               if(arr[i] == txtdes) {
                                   delete arr[id];
                               }
                         }  
                         var txtnew =  arr.join('[-|-]');
                         $('#customizeform-cambodiamap').val(txtnew);                         
                      }
              break;
       }       
   }  
}
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
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");                
                    break;
                case 2:
                    $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");   
                    break;
               case 3:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");   
                    break;
               case 4:
                     $("#customizeform-howdidtxt").attr("placeholder","<?php echo Yii::t('app','Enter you text here');?>");   
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