<style>
.boxitem{
    border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;
}
.boxitemh1{
    font-size: 16px;font-weight: bold;background: #e9ebee;
}
</style>
<?php
if($admin==1){
    ?>
    Hi Administrator,<br />
    <?php echo Yii::t('app', 'You received email request as below:');?>  <br />
    Full name : <?php echo $model->firstname;?> <?php echo $model->lastname;?><br />
    E-mail: <?php echo $model->email;?><br />
    Booking_id : <?php echo $booktour->id;?><br />
    IP : <?php echo Yii::$app->getRequest()->getUserIP();?><br /><br />
    <?php
}else{
    ?>
    <div style="text-align: center;">
     <?php echo Yii::t('app', 'Thank you for sending email to Authentik Travel');?><br />
     <?php echo Yii::t('app', 'This is auto reply email and our team will contact you within 24 hours!');?><br />
     <?php echo Yii::t('app', 'We would like to re-confirm your information as below:');?><br /><br />
    </div>
    <?php
}
?>

<div style="border:1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
        <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app','Interesting places');?></h1>
        <div>   
            <?php
             if($model->vietnammap!=''){
                echo '<br /><strong style="font-size: 16px;padding-right: 8px;">'.Yii::t('app', 'Vietnam').':</strong> '.$model->vietnammap;
             }
             //lao
             if($model->laosmap!=''){    
                echo  '<br /><strong style="font-size: 16px;padding-right: 8px;">'.Yii::t('app', 'Laos').':</strong> '.str_replace(","," - ",$model->laosmap);
             }
             //cambodia
              if($model->cambodiamap!=''){    
                 echo '<br /><strong style="font-size: 16px;padding-right: 8px;">'.Yii::t('app', 'Cambodia').':</strong>'.str_replace(","," - ",$model->cambodiamap);
             }
             //other
             if($model->mapother!=''){    
                echo '<br /><strong style="font-size: 16px;padding-right: 8px;">'.Yii::t('app', 'Other').':</strong> '.str_replace(","," - ",$model->mapother);
             }           
            ?>
        </div> 
</div>
<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
   <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'The Participants');?></h1>
   <div>
   <?php
           if($model->number_adults !=''){
               echo Yii::t('app', 'Number of Adults').': '.intval($model->number_adults);
           }
           if($model->number_children !=''){
              echo '<br /> '.Yii::t('app', 'Number of Children(1-11 years)').': '.intval($model->number_children);
           }  
            ?>               
   </div>
</div>

<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
    <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'Your Travel Dates');?></h1>
    <div>
     <?php
           
            if($model->arrivaldate_other_m !='' && $model->arrivaldate_other_y !=''){
                echo Yii::t('app', 'Travel date?').': '.$model->arrivaldate_other_m.'/'.$model->arrivaldate_other_y.'<br />';
            }  
            if($model->number_nights!=''){              
               echo Yii::t('app', 'Number of days: {numbernights} Days', array('numbernights' => $model->number_nights));   
             } 
         ?>          
   </div>
</div>   
<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
        <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'Your accommodation');?></h1>
        <div>    
              <?php
              if($model->typeacc1>0){
                   echo ' - '.$model->getAccType($model->typeacc1).'<br />';    
               }
              if($model->typeacc2>0){
                   echo ' - '.$model->getAccType($model->typeacc2).'<br />'; 
              }
              if($model->typeacc3>0){
                   echo ' - '.$model->getAccType($model->typeacc3).'<br />';   
              }
              if($model->typeacc4>0){
                   echo ' - '.$model->getAccType($model->typeacc4).'<br />';    
              }
              if($model->typeacc5>0){
                   echo ' - '.$model->getAccType($model->typeacc5).'<br />';    
              }
            ?>        
        </div>
</div>
<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
     <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'Travel descriptions');?></h1>
    <div>
     <?php
       if($model->descriptiontxt !=''){
                echo $model->descriptiontxt;    
        } 
      ?>        
   </div>
</div>
<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
    <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'How did you find us');?></h1>  
    <div> 
           <?php
            if($model->how_did_id>0){
               echo $model->getHowDidUs($model->how_did_id).'<br />';    
            }
            if($model->howdidtxt!=''){
               echo '-'.$model->howdidtxt.'<br />';    
             }
           ?>              
    </div>  
</div>
<div style="border: 1px solid #dcdcdc;padding-bottom: 14px;margin-bottom: 20px;text-align: center;">
        <h1 style="padding-top:8px;margin-top: 0px;height: 30px;font-size: 16px;font-weight: bold;background: #e9ebee;"><?php echo Yii::t('app', 'Your Details');?></h1>
            <div>
            <table width="100%" border="0">
                 <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'Title');?>:</td>
                     <td align="left"><?php echo $model->slcgender;?></td>
                 </tr>
                  <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'First name');?>:</td>
                     <td align="left"><?php echo $model->firstname;?></td>
                 </tr>
                  <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'Last name');?>:</td>
                     <td align="left"><?php echo $model->lastname;?></td>
                 </tr>
                  <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'Nationality');?>:</td>
                     <td align="left"><?php echo $model->nationality;?></td>
                 </tr>
                              
                  <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'Phone');?>:</td>
                     <td align="left"><?php echo $model->phone;?></td>
                 </tr>
                  <tr>
                     <td width="50%" align="right"><?php echo Yii::t('app', 'E-mail');?>:</td>
                     <td align="left"><?php echo $model->email;?></td>
                 </tr>                 
            </table>                               
            </div>   
</div>     
<div><?php echo Yii::t('app', 'Best regards,<br />Authentik Travel Team,');?></div>