<?php
//use yii\helpers\Html;
//use common\helper\StringHelper;
//use yii\helpers\Url;
?>
<li>       
     <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/silde/<?php echo $img;?>" alt="<?php echo Yii::t('app','Tailor made private tours');?>" />     
     <center>     
        <div class="uk-overlay-panel uk-vertical-align boxitem"> 
                 <div class="uk-vertical-align-middle">
                     <div class="uk-container-center travelplan">                           
                            <h3><?php echo Yii::t('app','A Local Travel Agent for Private Tours in Vietnam');?><br /></h3>  
                            <p><?php echo Yii::t('app','We design private trips to match your desires and budgets');?></p>            
                            <div class="boxbuttom"><br /><br /><br />
                              <a class="btn btn-warning btntravelplan" href="<?php echo $urlpost;?>"><?php echo Yii::t('app','Propose your travel plan');?></a>
                            </div>                            
                       </div>   
                </div>              
        </div>
    </center>   
</li>