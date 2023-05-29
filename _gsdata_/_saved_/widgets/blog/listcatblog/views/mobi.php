<?php
use yii\helpers\Html;
use common\helper\StringHelper;
use common\models\Blogcate;
if(!empty($rows)){
?>
<div class="blogright" style="padding-top:0px;">   
        <h2 style="text-align: center;"><?php echo Yii::t('app','Categories');?></h2>  
        <div class="uk-accordion" data-uk-accordion>
                <?php
                  foreach($rows as $row){
                        $id    = $row->id;
                        $title = Html::encode($row->title);                       
                         $rs = Blogcate::getAllBlogcate($id,'ordering asc');       
                       ?>
                        <div class="uk-accordion-title"><?php echo $title;?></div>
                        <div class="uk-accordion-content">
                        <?php
                        if(!empty($rs)){
                            ?>
                             <ul class="uk-list">
                            <?php
                            foreach($rs as $r){
                               $url   = $r->createUrl($r);
                               ?>
                                <li><a href="<?php echo $url;?>">- <?php  echo $r->title;?></a></li>
                               <?php
                            }
                            ?>
                            </ul>
                            <?php
                        }
                        ?>                        
                        </div>                       
                    <?php
                  }
                  ?>             
          </div>
</div>      
<?php
}
?>