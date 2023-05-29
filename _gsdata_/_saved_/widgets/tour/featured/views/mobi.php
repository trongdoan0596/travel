<?php
//use common\models\Tour;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
if(!empty($rows)){
      $urlall = Url::toRoute(array('tour/alltour'));
      $i = 0;$title="Hightlights Tours";$fulltxt="";
      if(!empty($info)){
            $title   = $info->title;
            $fulltxt = HtmlPurifier::process(strip_tags($info->fulltxt));
      }
    //  $info
?>            
<div class="boxhightlight">
     <div class="uk-container-center boxhome">    
              <h1 class="uk-h1 uk-text-center"><?php echo $title;?></h1>  
              <div class="uk-text-center txthome"><?php echo $fulltxt;?></div>
              <div  class="listitem">            
               <ul>                    
                <?php
                      $i=0;
                      foreach($rows as $row){                          
                         $title = $row->title;
                         $url   = $row->createUrl($row);
                         $num_day = $row->num_day;
                         if($row->num_day<=9){
                            $num_day = '0'.$row->num_day;
                         } 
                         $img = '';
                         //$img = $row->getImage($row);  
                         $img = $row->getImage($row,430,270,'img2');
             ?>
             <li>
                <center>
                  <div class="boxitem"> 
                      <div class="boxday uk-border-circle">
                          <span class="numdays"><?php echo $num_day;?></span>
                          <span class="txtday"><?php echo Yii::t('app', 'days');?></span>
                      </div>        
                      <a class="border-top-left-img-4" href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $title;?>" class="mobifuture<?php echo $i;?>" /></a>
                      <p class="readmore uk-container-center"><a class="btnreadmore" href="<?php echo $url;?>"><?php echo Yii::t('app', 'Read more');?> <i class="uk-icon-caret-right"></i></a></p>
                      <div class="content">
                          <h2 class="caption-title">
                               <span class="boxcaption">
                                <a href="<?php echo $url;?>" class="title-heightlight"><?php echo $title;?></a>   
                               </span>                                 
                           </h2>
                           <p class="shorttxt"><?php echo $row->shorttxt;?></p>
                       </div>
                  </div>      
                </center>             
             </li>
            <?php
             $i++;
          }
          ?>     
          </ul>
    </div>
    <div class="viewall"><a href="<?php echo $urlall;?>"><?php echo  Yii::t('app','Voir tous nos voyages');?></a></div>
</div>
</div>
 <?php
}
?>