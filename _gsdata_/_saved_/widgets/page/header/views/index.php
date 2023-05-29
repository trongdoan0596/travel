<?php
//use common\components\languageSwitcher;
//use yii\helpers\Url;
//use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
//use yii\captcha\Captcha;
use common\models\Menu;
//use common\models\AccountForm;
//use common\models\AccountFormLogin;
?>
<header id="header">
<div  class="bgleft">
<div  class="bgright">
  <div class="uk-container uk-container-center">
   <div class="uk-display-inline-block headicon">
            <div class="uk-grid">
            <div class="uk-width-4-5">
             <ul class="uk-grid">
              <li><?php echo Yii::t('app', 'Hotline');?></li>
            </ul>  
            </div>
            <div class="uk-width-1-5">
            <ul class="uk-grid uk-float-right">  
              <li style="float: right;">
                  <a target="_blank" href="https://authentiktravel.com"><img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/flag/en.png" alt="English" /> English</a>
                  <a target="_blank" href="https://authentiktravel.es" style="margin-left:20px;"><img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/flag/es.png" alt="Español" /> Español</a>
               </li>              
            </ul>
            
            </div>
        </div>

                      
            
          </div>  
  </div>
  <div class="uk-container uk-container-center">
          <div class="uk-float-left logo">
                 <a href="<?php echo Yii::$app->homeUrl;?>">
                    <img src="<?php echo Yii::$app->homeUrl;?>themes/web/img/authentikvietnam.png" alt="Authentik Vietnam" />
                </a>
          </div>                
          <div class="boxmenu">          
               <nav class="uk-navbar" id="menutop">
                    <ul class="uk-navbar-nav">  
                        <?php
                           if(!empty($rows)){
                               $rs = $rows;
                               $i=0;
                               foreach($rows as $row){                                   
                                    $parent_id = $row->parent_id;
                                    $tmp       = $row->tmp;
                                    $url = '#';
                                    if($row->url !=''){
                                         $url = $row->url;
                                    }else{
                                         $url = Menu::createUrl($row);
                                    } 
                                    if($parent_id==1){                                                                      
                                         switch ($tmp) {
                                               case "info": 
                                                     echo $this->render('justify/info',array('row'=>$row,'rs'=>$rs,'i'=>$i,'url'=>$url));                                                           
                                                    break;    
                                               default:
                                                     echo $this->render('justify/item',array('row'=>$row,'rs'=>$rs,'i'=>$i,'url'=>$url));  
                                                   break;          
                                          }
                                       
                                       $i++;
                                    }//end if($parent_id==1)
                               }
                            }
                          ?> 
                    </ul>
           </nav>
       </div>
  </div>
  </div>
 </div>  
</header>