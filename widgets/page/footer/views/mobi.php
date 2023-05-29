<?php
use yii\helpers\Url;
?>
<style>
#mfesecure-ts-image{
    display: none;
}
</style>
 <div id="footer">
    <div class="uk-container uk-container-center headfooter">
        <div class="uk-width-*">
             <div class="footerlogo">
                <a href="<?php echo Yii::$app->homeUrl;?>">
                   <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/logofooter.png" alt="Authentik Travel" />
                </a>
             </div>
              <div class="footercontact" style="padding-top: 30px;">
              A local travel agent based in Hanoi, specialized in tailor-made tours in Indochina and Myanmar for solo traveler, a couple, family or a group of friends.
              </div>
             <div class="footercontact">
                  <h6><?php echo Yii::t('app','Legal notes ');?></h6>
                 AUTHENTIK VIETNAM CO. ,LTD<br />
                Company registered number 010591826 in Hanoi department of planning and investment.<br />
                International tour operation license number: 01-611/2014/TCDL-GPLHQT.<br />
                Approved by Vietnam national administration of tourism.<br />
             </div>
             <div class="footercontact">
                  <h6><?php echo Yii::t('app','Contact Us');?></h6>
                  <font class="footertitle">Add:</font> <?php echo Yii::t('app','Room 406, 4th floor, 62 Yen Phu road, Nguyen Trung Truc ward, Ba Dinh district, Ha Noi, Vietnam');?>.<br />
                    <font class="footertitle">Tel:</font> +84 (0) 24 39 27 11 99<br />+84 (0) 24 62 90 55 99<br />
                    <font class="footertitle">Cellphone:</font> +84 (0) 96 9 72 99 83 (Whatsapp/viber)<br />
                    <font class="footertitle">Skype:</font> sales@authentiktravel.com<br />
                    <font class="footertitle">W:</font><a href="<?php echo Yii::$app->homeUrl;?>" target="_blank"> www.authentiktravel.com.</a><br />
                    <font class="footertitle">E:</font><a href="mailto:sales@authentiktravel.com"> sales@authentiktravel.com</a>
             </div>
              <div class="footercontact">
                  <h6><?php echo Yii::t('app','Get Update');?></h6>
                      <a href="https://www.facebook.com/authentiktravel" target="_blank"><i class="uk-icon-facebook uk-icon-small"> </i></a>
                      <a href="https://twitter.com/Authentikvn" target="_blank"><i class="uk-icon-twitter uk-icon-small">  </i></a>
                      <a href="https://plus.google.com/u/0/+AuthentikVietnamVoyages" target="_blank"><i class="uk-icon-google-plus uk-icon-small"> </i></a>
                      <a href="https://www.youtube.com/user/authentikvietnam" target="_blank"><i class="uk-icon-youtube-play uk-icon-small"></i></a>  
                  <br /><br />    
                 <?php echo Yii::t('app','Subscribe our newsletters to get unique holiday and travel inspiration!');?>
                  <br />   <br />  
                   <form class="uk-form">                                  
                                <div class="uk-form-row">
                                    <input class="uk-form-width-medium" id="emailsubcribe" name="emailsubcribe" placeholder="Your email address" type="text" />
                                </div>                        
                                 <button class="btn btn-warning subcribe" type="button" id="sendsubcribe"><?php echo Yii::t('app','Subcribe');?></button>
                   </form>
                 <br />
                <!-- <a href="#header" class="uk-button" style="float: right;background: #2a2a2a;" data-uk-smooth-scroll><i class="uk-icon-angle-double-up uk-icon-medium" style="color:#009933;"></i></a>-->
              </div>
        </div>
         <div align="center">
             <a rel="nofollow" href="https://www.tripadvisor.com/Attraction_Review-g293924-d11641267-Reviews-Authentik_Vietnam_Travel-Hanoi.html" target="_blank">
                   <img style="margin-top:8px !important;" src="<?php echo Yii::$app->homeUrl;?>themes/web/img/Authentik-Certificate-Tripbt.png" alt="Authentik Vietnam Certificate Tripbt" />
              </a>
        </div> 
         <br />   
        <div style="display: none;"><a href="<?php echo Yii::$app->homeUrl;?>sitemap.html" target="_blank">Sitemap</a></div>
        <div>  <i class="uk-icon-copyright"></i> Copyright 2017 Authentik Travel  </div>
         <br /> 
         <br />
         <br />
         <br />     
    </div>    
 </div>
<div id="menufooter" >
        <div class="uk-container-center">               
              <div class="uk-grid">
                    <div class="uk-width-1-4"><a href="<?php echo Url::toRoute(array('tour/alltour'));?>" class="linktxt"><i class="uk-icon-search uk-icon-medium"></i> <br />Search</a></div>
                    <div class="uk-width-1-4"><a href="<?php echo Url::toRoute(array('tour/customize'));?>" class="linktxt"><i class="uk-icon-pencil-square-o uk-icon-medium"></i><br />Customize Trip</a></div>
                    <div class="uk-width-1-4"><a href="<?php echo Url::toRoute(array('site/contactus'));?>" class="linktxt"><i class="uk-icon-phone uk-icon-medium"></i><br />Contact us</a></div>
                    <div class="uk-width-1-4" style="text-align: right !important;float: right !important;"> 
                     	<a href="#offcanvas" class="uk-navbar-toggle uk-navbar-right" data-uk-offcanvas="{mode:'reveal'}"></a>
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