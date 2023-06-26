<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\widgets\slidebg\slidesub\Slidesub;
use common\models\ContactForm;     
use yii\captcha\Captcha;  
?>
<?php echo Slidesub::widget(array('view' =>'index','class_ex'=>'slidesubbg_contact'));?>
<div id="main" class="main-content"> 
      <div class="boxcontactus">     
          <div class="uk-container uk-container-center">  
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
          <div class="uk-grid">
                <div class="uk-width-2-3">  
                  <div class="infomation">
                    <div class="introtxt">
          Si vous avez la moindre question ou information complémentaire à nous faire parvenir, merci de nous envoyer un mail à <b>info@authentikvietnam.com</b>, ou remplissez le formulaire ci-dessous. Votre demande sera traitée dans les plus brefs délais.<br />
En cas de demande de devis sur-mesure ? <a href="https://authentikvietnam.com/creer-votre-voyage-sur-mesure"><b>Cliquez ici</b></a>
          </div>
          <hr />
          <div style="text-align: left; padding-bottom: 20px;color:#8a8a8a;">
          * Champs obligatoires
          </div>
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
                                    'options' =>array('class'=>'uk-form')
                                   )
                             ); 
                      $model = new ContactForm();
                       ?>         
                       <?php echo $form->errorSummary($model,array("id"=>"errorctid","class"=>"uk-container-center errorsummary"));?>        
                        <div class="uk-form-row">
                              <label style="padding-right: 10px;color: #4a4a4a;"><?php echo Yii::t('app', 'Civilité');?></label>
                                            <select name="ContactForm[slcgender]" id="contactform-slcgender">
                                                 <option value="<?php echo Yii::t('app', 'M');?>"><?php echo Yii::t('app', 'M');?></option>
                                                 <option value="<?php echo Yii::t('app', 'Mme');?>"><?php echo Yii::t('app', 'Mme');?></option>
                               </select>
                         </div>
                         <div class="uk-form-row">                                
                             <?php echo $form->field($model,'title')->textInput(array('class'=>'form-control','placeholder'=>''));?> 
                         </div>                         
                         <div class="uk-form-row">
                              <?php echo $form->field($model,'phone')->textInput(array('class' =>'form-control'));?>
                         </div>
                         <div class="uk-form-row">
                              <?php echo $form->field($model,'email')->textInput(array('class' =>'form-control'));?>
                         </div>                                        
                         <div class="uk-form-row">
                             <label class="control-label" for="contactform-contact-title"><?php echo Yii::t('app', 'How would you like to be connected ?');?></label> 
                                       <?php
                                          $allcontact = $model->getAllContact();
                                             if(!empty($allcontact)){
                                                $i=1;
                                                foreach ($allcontact as $key => $value) {                                                
                                                  //  $checked="";
                                                   // if($i==1) $checked = 'checked="checked"';
                                                    ?>
                                                     <div class="radio-item muticontact">
                                                        <input data-id="0" type="radio" id="contactform-contact<?php echo $key;?>" name="ContactForm[contact]" value="<?php echo $key;?>" />
                                                        <label for="contactform-contact<?php echo $key;?>"><?php echo $value;?></label>
                                                     </div>
                                                    <?php
                                                    $i++;
                                               }                         
                                            }
                                      ?> 
                         </div>                            
                          <div class="uk-form-row">
                              <?php echo $form->field($model,'subject')->textInput(array('class' =>'form-control'));?>
                         </div>   
                         <div class="uk-form-row"> 
                         <?php echo $form->field($model,'mess')->textarea(array('rows' =>10,'cols' =>50,'placeholder'=>Yii::t('app','Enter your text here').' ... '));?>
                         </div>     
                         <br />
                         <div class="control-group">
                            <div class="controls" style="text-align: center !important;">
                               <?php echo Html::submitButton(Yii::t('app','Send').'  <i class="uk-icon-angle-double-right"></i>',array('id' =>'idcontact','class' =>'uk-button sendcontact', 'name' => 'sendcontact')) ?>
                            </div>
                        </div>
                                           
              <?php ActiveForm::end(); ?>
                   </div>                
                 
                </div>
                <div class="uk-width-1-3" style="padding-left: 15px;">                     
                   <div class="mapcontact">
                     <div class="uk-width-1-1" style="padding: 15px;">
                        <h2>Authentik Vietnam Co.,Ltd</h2>
                         <ul class="uk-grid contactbox">
                              <li class="address-footer"><label><i class="uk-icon-home uk-icon-small"></i></label><font style="padding-left:0px;margin-top: -30px;">62 Yen Phu road, Nguyen Trung Truc ward, <br> Ba Dinh district, Ha Noi, Vietnam.</font></li>   
                              <li><label><i class="uk-icon-phone uk-icon-small"></i></label>+84 (0) 24 39 27 11 99 / <font style="padding-bottom: 10px;">+84 (0) 24 62 90 55 99</font></li> 
                              <li><label><i class="uk-icon-mobile-phone uk-icon-small"></i></label>+84 (0) 91 2 12 10 91</li>                   
                              <li><label><a href="skype:authentikvietnam?call"><i class="uk-icon-skype uk-icon-small"></i></label>Authentikvietnam</a></li>
                              <li><label><i class="uk-icon-envelope-o"></i></label>info@authentikvietnam.com</li>
                              <li><label><i class="internet"></i></label>www.authentikvietnam.com</li>
                        </ul>                      
                     </div>
                      <div class="uk-width-1-1" style="padding: 15px;">
                      <h2><?php echo Yii::t('app','Office Hours');?>:</h2>
                       <font class="title titleoffice"><?php echo Yii::t('app','Monday to Friday');?>:</font> 	8h30 AM to 6 PM <br />
                       <font class="title titleoffice"><?php echo Yii::t('app','Saturday');?>: </font>	8h30 AM to 12 AM
                     </div> 
                     <div class="mapright">
                         <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="348"  height="344" src="https://maps.google.com/maps?hl=vi&q=62 Yen Phu road, Nguyen Trung Truc ward, Ba Dinh district, Ha Noi, Vietnam&ie=UTF8&t=roadmap&z=15&iwloc=B&output=embed"></iframe>
                      </div>
                   </div>
                </div>
            </div>
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