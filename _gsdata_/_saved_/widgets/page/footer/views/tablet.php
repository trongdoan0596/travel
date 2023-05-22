<?php
use yii\helpers\Url;
use common\models\Logip;
?>
<div id="footer">
 <div class="uk-panel1 uk-clearfix1">
    <div class="uk-container-center headfooter paddlr">
        <div class="uk-grid">
            <div class="uk-width-1-4" style="padding-right: 20px; padding-left: 20px;">              
                   <a href="<?php echo Yii::$app->homeUrl;?>">
                       <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/logofooter.png" alt="Authentik vietnam" />
                    </a>
              
            </div>
             <div class="uk-width-1-4">
                   <h3 class="uk-h3 titlefooter">
                    <?php echo Yii::t('app','Mentions légales');?>
                    </h3>
            </div>
             <div class="uk-width-1-4">
                <h3 class="uk-h3 titlefooter">                    
                    <?php echo Yii::t('app','Nous contacter');?>
                </h3>
            </div>
             <div class="uk-width-1-4">
                <h3 class="uk-h3 titlefooter">                    
                    <?php echo Yii::t('app','Get Update');?>
                </h3>
            </div>
        </div>
    </div> 
    <div class="uk-container-center contentfooter paddlr">
        <div class="uk-grid">
            <div class="uk-width-1-4">
              Agence de voyage locale basée à Hanoi, spécialiste No 1 du VOYAGE SUR MESURE au Vietnam. Pour personnes seules, couples, familles, groupes d'amis.
              
            </div>
             <div class="uk-width-1-4">
                AUTHENTIK VIETNAM CO. ,LTD<br /><br />
                Entreprise enregistrée sous le N° 010591826 au département des plans et d’investissements de Hanoi.<br /><br />
                Licence Tour-opérateur N° 01-611/2014/TCDL-GPLHQT. <br /><br />
                Agréée par l’Administration vietnamienne du tourisme.<br /><br />
            </div>
             <div class="uk-width-1-4">
               <ul class="uk-grid">
                  <li style="height:70px;" class="address-footer"><i class="uk-icon-home uk-icon-small"></i> <?php echo Yii::t('app','3 Phan Huy Ich, Nguyen Trung Truc, Ba Dinh District, Ha Noi, Vietnam (4th floor)');?>.</li>   
                  <li style="margin-bottom: 14px;"><i class="uk-icon-phone uk-icon-small"></i>+84 (0) 24 39 27 11 99 ou <br /><font style="padding-left: 18px;padding-bottom: 10px;"> +84 (0) 24 62 90 55 99</font></li> 
                  <li><i class="uk-icon-mobile-phone uk-icon-small"></i>+84 (0) 91 2 12 10 91</li>                   
                  <li><a href="skype:authentikvietnam?call"><i class="uk-icon-skype uk-icon-small"></i>Skype: Authentikvietnam</a></li>
                  <li><i class="uk-icon-envelope-o"></i>info@authentikvietnam.com</li>
                  <li><i class="internet"></i> &nbsp;&nbsp;<a href="<?php echo Yii::$app->homeUrl;?>" target="_blank">www.authentikvietnam.com</a></li>
                  <li style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::$app->homeUrl;?>sitemap.html" target="_blank">Sitemap</a></li>
                </ul>
            </div>
             <div class="uk-width-1-4 boxgetupdate">
                        <a href="https://www.facebook.com/authentikvietnamtravel" target="_blank"><i class="uk-icon-facebook uk-icon-small">  </i></a>
                        <a href="https://twitter.com/Authentikvn" target="_blank"><i class="uk-icon-twitter uk-icon-small">  </i></a>
                        <a href="https://plus.google.com/u/0/+AuthentikVietnamVoyages" target="_blank"><i class="uk-icon-google-plus uk-icon-small"> </i></a>
                        <a href="https://www.youtube.com/user/authentikvietnam" target="_blank"><i class="uk-icon-youtube-play uk-icon-small"></i></a>                        
                        <div class="boxsubscribe">
                        <?php echo Yii::t('app','Subscribe to our newsletter and we will send you our unique holiday and travel inspiration!');?>                         
                        </div>                       
                        <form class="uk-form">                                  
                                <div class="uk-form-row">
                                    <input class="uk-form-width-medium" id="emailsubcribe" name="emailsubcribe" placeholder="Your email address" type="text" />
                                </div>                        
                                 <button class="btn btn-warning subcribe" type="button" id="sendsubcribe"><?php echo Yii::t('app','Subscribe');?></button>
                         </form>
            </div>
        </div>
    </div>              
    <div id="copyright" >
        <div class="clscopyright uk-container-center">               
                <i class="uk-icon-copyright"></i> Copyright 2016 Authentik Vietnam  
        </div>
    </div>
     </div>
</div> 
<script language="javascript">
$('#sendsubcribe').click(function() {
      var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
      var url    = urlbase+"/newsletters/addnewsletter";
      var e_mail =  $("#emailsubcribe").val();       
      if (expression.test(e_mail)) {
           $.ajax({
        			type: "POST",
        			url: url,
        			data: ({"e_mail":e_mail}),
        			dataType: "json"			
        			}).done(function(data){
        			    alert(data['msg']);
            			if(data['error'] == 1){
            			   $("#emailsubcribe").val('');  
            		    }
                        
        	    });
        }else {
           alert('<?php echo Yii::t('app','Error validate email!');?>'); 
           return false;
        } 
});
</script>
<?php
/*
$ip ='';
if(getenv('HTTP_CLIENT_IP')){
    $ip = 'CLIENT_IP-'.getenv('HTTP_CLIENT_IP');
}else if(getenv('HTTP_X_FORWARDED_FOR')){
    $ip = 'PROXY-'.getenv('HTTP_X_FORWARDED_FOR');
}else if(getenv('HTTP_X_FORWARDED')){
    $ip = getenv('HTTP_X_FORWARDED');
}else if(getenv('HTTP_FORWARDED_FOR')){
    $ip = getenv('HTTP_FORWARDED_FOR');
}else if(getenv('HTTP_FORWARDED')){
   $ip = getenv('HTTP_FORWARDED');
}else if(getenv('REMOTE_ADDR')){
    $ip = 'REMOTE_ADDR-'.getenv('REMOTE_ADDR');
}else{
    $ip = 'UNKNOWN';  
}               
$model = new Logip();      
$model->created_at = date("Y-m-d H:i:s");
$model->ip = Yii::$app->getRequest()->getUserIP();
$model->remoteip = $ip;//Yii::$app->getRequest()->getRemoteIP();
$model->user_agent = Yii::$app->request->userAgent;
$model->save(false); */
?>     