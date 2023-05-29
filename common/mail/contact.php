<?php
if($admin==1){
    ?>
      Hi Administrator,<br />
     <?php echo Yii::t('app','You received email from clients as below:');?><br /><br />
    <?php
}else{
    ?>
     <?php echo Yii::t('app','Hi');?> <?php echo $model->title;?>,<br /><br />
     <?php echo Yii::t('app','Thank you for sending email to Authentik Travel');?><br />
     <?php echo Yii::t('app','This is auto reply email and our team will contact you within 24 hours!');?><br />
     <?php echo Yii::t('app','We would like to re-confirm your information as below:');?><br /><br />
    <?php
}
?>
<?php echo Yii::t('app','Gender');?> : <?php echo $model->slcgender;?><br />
<?php echo Yii::t('app','Full name');?> : <?php echo $model->title;?><br />
<?php echo Yii::t('app','Your nationality');?>: <?php echo $model->nationality;?><br />
<?php echo Yii::t('app','Your phone number');?>: <?php echo $model->phone;?><br />
<?php echo Yii::t('app','E-mail');?>: <?php echo $model->email;?><br />
<?php echo Yii::t('app','Message');?>: <?php echo $model->mess;?><br />
<?php
if($admin==1){
    ?>
      IP : <?php echo Yii::$app->getRequest()->getUserIP();?><br />
    <?php
}else{
    ?><br />
    <?php echo Yii::t('app','Thank you for your interest!');?><br />
    <?php echo Yii::t('app','Authentik Travel team,');?>
  <?php  
}
?>
<br /><br />