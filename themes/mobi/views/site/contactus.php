<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\widgets\slidebg\slidesub\Slidesub;
use common\models\ContactForm;     
use yii\captcha\Captcha;  
?>
<?php //echo Slidesub::widget(array('view' =>'index','class_ex'=>'slidesubbg_contact'));?>
<div id="main" class="main-content">
      <div class="boxcontactus">  
          <?php
           echo Breadcrumbs::widget(array(
                            'itemTemplate' => "<li>{link}</li>\n", // template for all links
                            'links' => array(
                                array(
                                    'label' =>Yii::t('app','Contact us'),
                                    'url' => array('site/contactus'),//, 'id' => 10
                                    'template' => "<li>{link}</li>\n", // template for this link only
                                ),  
                            ),
                   ));       
           ?>   
         <h1><?php echo Yii::t('app','Contact us');?></h1>
         <div class="introtxt">
         <?php echo Yii::t('app', 'If you have any questions or additional information, please send us an email at');?>: <b><a href="mailto:sales@authentiktravel.com" class="fixhover">sales@authentiktravel.com</a></b>, <?php echo Yii::t('app', 'or just fulfill the below form. Your request will be processed at soonest');?>.
<?php echo Yii::t('app','In case of requiring the tailor made proposal, please ');?> <a href="https://authentiktravel.com/propose-your-travel-plan" class="fixhover"><b>click here</b></a>
          </div>       
        <div class="boxaddress">
            <h2>Authentik Travel</h2>
            <font class="title"><?php echo Yii::t('app','Address');?>: </font><?php echo Yii::t('app','3 Phan Huy Ich, Nguyen Trung Truc, Ba Dinh District, Ha Noi, Vietnam (4th floor)');?>. 
              <br />
            <font class="title"><?php echo Yii::t('app','Tel');?>  : </font>+84 (0) 24 39 27 11 99 <br />+84 (0) 24 62 90 55 99<br />
            <font class="title"><?php echo Yii::t('app','Portable');?>  : </font>+84 (0) 96 9 72 99 83 (Whatsapp/viber)<br />
            <font class="title"><?php echo Yii::t('app','Skype');?>  : </font><a href="skype:sales@authentiktravel.com?call">sales@authentiktravel.com</a> <br />
            <font class="title"><?php echo Yii::t('app','Email');?>  : </font><a href="mailto:sales@authentiktravel.com">sales@authentiktravel.com</a><br />
            <font class="title"><?php echo Yii::t('app','Website');?>: </font><a href="https://authentiktravel.com">authentiktravel.com</a>
         </div>
         <div class="boxaddress" style="padding-top:20px;">
              <h2><?php echo Yii::t('app','Office Hours');?>:</h2>
               <font class="title"><?php echo Yii::t('app','Monday to Friday');?>:</font> 	8h30 AM to 6 PM <br />
               <font class="title"><?php echo Yii::t('app','Saturday');?>: </font>	8h30 AM to 12 AM
         </div>  
         <hr />
          <div style="text-align: left; padding-bottom: 20px;color:#8a8a8a;">
          * <?php echo Yii::t('app','Required fields');?> 
          </div> 
        
        <div class="infomation">
                    <h2><?php echo Yii::t('app','Your infomations');?></h2>
                    <?php if(Yii::$app->session->getFlash('msg')):?>                    
                            <div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a class="uk-alert-close uk-close"></a>
                                <p><?php echo Yii::$app->session->getFlash('msg'); ?></p>
                            </div>                        
                      <?php endif; ?>
                     <?php $form = ActiveForm::begin(
                              array('id' => 'contactfrm',
                                    'enableClientValidation'=>true,
                                    'validateOnSubmit' => true,
                                    'options' =>array(
                                        'class' => 'uk-form'
                                     )
                                   )
                             ); 
                      $model = new ContactForm();
                       ?>       
                    <?php echo $form->errorSummary($model,array("id"=>"errorctid","class"=>"uk-container-center errorsummary"));?>
                    <div class="uk-form-row" style="text-align: left;">
                        <select name="ContactForm[slcgender]" id="contactform-slcgender">
                             <option value="">---<?php echo Yii::t('app', 'Gender');?>---</option>
                             <option value="<?php echo Yii::t('app', 'Mr.');?>"><?php echo Yii::t('app', 'Mr.');?></option>
                             <option value="<?php echo Yii::t('app', 'Ms.');?>"><?php echo Yii::t('app', 'Ms.');?></option>
                        </select>
                    </div>                         
                      <div class="uk-form-row">
                                <?php echo $form->field($model,'title')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Full name')))->label(false);?>
                      </div>
                       <div class="uk-form-row">
                                <?php echo $form->field($model,'nationality')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Your nationality')))->label(false);?>
                      </div>
                      <div class="uk-form-row">
                                <?php echo $form->field($model,'phone')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Your phone number')))->label(false);?>
                      </div>
                      <div class="uk-form-row">
                                <?php echo $form->field($model,'email')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','E-mail')))->label(false);?>
                      </div>
                      <div class="uk-form-row">
                                <?php echo $form->field($model,'confirmemail')->textInput(array('class' =>'uk-form-width-medium','placeholder'=>Yii::t('app','Confirm E-mail')))->label(false);?>
                      </div>                     
                      <div class="uk-form-row">
                               <?php echo $form->field($model,'mess')->textarea(array('class' =>'uk-form-width-medium','rows' =>6,'placeholder'=>Yii::t('app','Enter your text here').' ... '))->label(false);?>
                      </div>
                      <div class="uk-form-row" style="text-align: left;padding-left: 0px;margin-left: -14px;">
                               <?php echo $form->field($model,'verifyCode')->widget(Captcha::className(),array('template' =>'<div class="captchacode" align="center"><div class="col-lg">{input}</div><div class="col-lg">{image}</div></div>'))->label(false); ?>
                     <div style="white-space: nowrap;padding-left:10px;padding-right: 5px;margin-top:0px;"><?php echo Yii::t('app','You must type the characters of the image in the text box');?></div>
                      </div>
                      <div class="uk-form-row">
                               <?php echo Html::submitButton(Yii::t('app','Send').'  <i class="uk-icon-angle-double-right"></i>',array('class' =>'uk-button sendcontact', 'name' => 'sendcontact')) ?>
                      </div>                                                              
              <?php ActiveForm::end(); ?>
           </div>
           <br />
         <div class="mapcontact" style="text-align: center !important;">
                 <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" height="320" src="https://maps.google.com/maps?hl=vi&q=Số 3 Phan Huy Ích, Nguyễn Trung Trực, Ba Đình, Hà Nội&ie=UTF8&t=roadmap&z=15&iwloc=B&output=embed"></iframe>
         </div>
        
      </div>
</div>    
<script language="javascript">
function ChangeSlc(id,name){
       var dataid = $("#contactform-"+name+id).attr("data-id");
       if(dataid==0){
           $("#contactform-"+name+id).attr("data-id","1");
           $("#contactform-"+name+id).attr("checked");
       }else{
           $("#contactform-"+name+id).attr("data-id","0");
           $("#contactform-"+name+id).removeAttr("checked");
       }     
}
$('#idcontact').on('click', function(e) { 
    $("#idcontact").hide().delay(3000).fadeIn();
    //e.preventDefault();
});
$('#contactfrm').on('afterValidate', function (event, messages) {
   if(typeof $('.has-error').first().offset() !== 'undefined') {        
     $("#errorctid").show();
     $('html, body').animate({scrollTop: $("#errorctid").offset().top - 100},1000);
   }
});
</script>         