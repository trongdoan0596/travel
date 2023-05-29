<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm; 
$form = ActiveForm::begin(array(
    'id' => 'frmquestion',
    'enableClientValidation'=>true,
    'validateOnSubmit' => true, // this is redundant because it's true by default
    'options' =>array(
                    'class' => 'uk-form',
                   // 'enctype' => 'multipart/form-data'
      )
));
?>
<?php if(Yii::$app->session->getFlash('msg')):?>                    
    <div class="uk-alert uk-alert-success" data-uk-alert="">
        <a class="uk-alert-close uk-close"></a>
        <p><?php echo Yii::$app->session->getFlash('msg'); ?></p>
    </div>                        
<?php endif; ?>
<div class="boxquestion">
    <h3><?php echo Yii::t('app', 'Post your question');?></h3>
    <div class="uk-grid">
        <div class="uk-width-1-2">
              <div class="uk-form-row">
                  <?php echo $form->field($model,'title')->dropDownList(array('Mr'=>'Mr','Ms'=>'Ms'),array('class' =>'uk-form-width-mini'));?>
               </div>
               <div class="uk-form-row">
                  <?php echo $form->field($model,'name')->textInput(array('class' =>'uk-form-width-medium'));?>
              </div>
               <div class="uk-form-row">
                  <?php echo $form->field($model,'country')->textInput(array('class' =>'uk-form-width-medium'));?>
              </div>
               <div class="uk-form-row">
                  <?php echo $form->field($model,'phone')->textInput(array('class' =>'uk-form-width-medium'));?>
              </div>
               <div class="uk-form-row">
                  <?php echo $form->field($model,'email')->textInput(array('class' =>'uk-form-width-medium'));?>
              </div>
               <div class="uk-form-row">
                  <?php echo $form->field($model,'confirmemail')->textInput(array('class' =>'uk-form-width-medium'));?>
              </div>
              <div class="uk-form-row">
                  <?php echo $form->field($model,'verifyCode')->widget(Captcha::className(),array('template' =>'<div class="captchacode"><div class="col-code">{input}</div><div class="col-img">{image}</div></div>',)); ?>
              </div>
              <div class="uk-form-row">
                  <?php
                   $model->cat_id = $cat_id;
                   echo $form->field($model,'cat_id')->hiddenInput()->label(false);?>
              </div>              
        </div>
        <div class="uk-width-1-2">
          <?php 
           echo $form->field($model,'mess')->textarea(array("rows"=>"13","style"=>"100%","placeholder"=>"Enter your question here."));
           ?>
        </div>
    </div>
    
    <div class="control-group">
        <div class="controls" style="text-align: center !important;">
           <?php echo Html::submitButton(Yii::t('app', 'Send').' <i class="uk-icon-angle-double-right"></i>',array('class' =>'uk-button sendcontact', 'name' => 'sendquestion')) ?>
        </div>
    </div>
    <br />
</div>
<?php
ActiveForm::end();
?>  