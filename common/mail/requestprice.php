<?php
use yii\helpers\Html;
use common\models\RequestpriceForm;
use common\models\Tour;
$baseurl = 'https://authentiktravel.com';
$url = $baseurl.Tour::createUrl($modeltour);    
?>
<?php
if($admin==1){
    ?>
     Hi Administrator,<br />
    <?php echo Yii::t('app','Receive email from');?>: <?php echo $model->email;?><br /><br />
    <?php
}else{
     ?>
    <?php echo Yii::t('app','Hi');?> <?php echo $model->name;?>,<br /><br />
    <?php echo Yii::t('app','Thank you for sending email to Authentik Travel.<br />This is auto reply email and our team will contact you within 24 hours!<br />We are pleased to confirm your information as below:<br />');?>
    <br />
    <?php
}
?>
<div style="width: 100%;">
        <b><?php echo Yii::t('app','Title tour');?>: </b> <?php echo $model->title_tour;?> <br />
        <b><?php echo Yii::t('app','Tour ID');?>:</b>  <?php echo $model->tour_id;?> <br />
        <b><?php echo Yii::t('app','Sex');?>:</b>  <?php echo $model->title;?> <br />        
        <b><?php echo Yii::t('app','Name');?>:</b>  <?php echo $model->name;?> <br />
        <b><?php echo Yii::t('app','Nationality');?>: </b> <?php echo $model->nationality;?> <br />
        <b><?php echo Yii::t('app','Phone');?>: </b> <?php echo $model->phone;?> <br />
        <?php
        if($admin!=1){
            ?>
            <b><?php echo Yii::t('app','E-mail');?>: </b> <?php echo $model->email;?> <br />
            <?php
         }
         ?>  
        <?php 
        if($model->depart !=''){
            ?>
             <b><?php echo Yii::t('app','Arrival date');?>:</b> <?php echo $model->depart;?> <br />
         <?php
        }
        if($model->arrivaldate_other_m !='' && $model->arrivaldate_other_y !=''){
            ?>
            <b><?php echo Yii::t('app','Otherwise, which month you prefer?');?>:</b> <?php echo $model->arrivaldate_other_m;?> <?php echo $model->arrivaldate_other_y;?> <br />
            <?php
        }
        ?>         
        <br />
        <b><?php echo Yii::t('app','Adult');?>: </b> <?php echo $model->adult;?> <br />
        <b><?php echo Yii::t('app','Children');?>: </b> <?php echo $model->children;?> <br />       
        <b><?php echo Yii::t('app','Message');?>: </b> <?php echo $model->mess;?> <br /> 
        <?php
        if($model->how_did_id>0){
            ?>
            <b><?php echo Yii::t('app','How did you find us');?>: </b>
            <?php
              echo '<br />-'.$model->getHowDidUs($model->how_did_id);   
            if($model->howdidtxt!=''){
              echo '<br />-'.$model->howdidtxt;    
            }
        }
        ?>
        <br />
        <b><?php echo Yii::t('app','Link');?>: </b> <a href="<?php echo $url;?>"><?php echo $url;?></a><br />      
</div>
<div><br /><?php echo Yii::t('app', 'Best regards,<br />Authentik Travel Team,');?></div>