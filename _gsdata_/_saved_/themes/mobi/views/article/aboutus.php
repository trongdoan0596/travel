<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use app\widgets\page\withus\Withus;
use app\widgets\page\boxourteam\Boxourteam;
use app\widgets\page\servicework\Servicework;
use app\widgets\slidebg\slidesub\Slidesub;
?>
<?php //echo Slidesub::widget(array('view' =>'index','class_ex'=>'slidesubbg_aboutus'));?>
<div id="main" class="boxaboutus"> 
    <div class="aboutus">
          <?php             
            if(!empty($model)){                
                ?>
                <h1 class="title"><?php echo Html::encode($model->title);?></h1>
                  <?php
                  if($model->introtxt!=""){
                    ?>
                       <div class="introtxt">
                        <?php
                            echo HtmlPurifier::process($model->introtxt);
                        ?>
                       </div>  
                  <?php
                  }
                 ?>               
                <div class="content">               
                  <?php                   
                  echo str_replace('<iframe', '<iframe class="uk-responsive-width" ',$model->fulltxt);
                  //echo HtmlPurifier::process($model->fulltxt);
                  ?>
                </div>   
           <?php
             }else{
                echo "Updating!";
             }
           ?>   
            <!-- This is the modal -->
            <div id="giayphepid" class="uk-modal">
                 <div class="uk-modal-dialog uk-modal-dialog-lightbox">
                    <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                    <img alt="" src="https://authentikvietnam.com/media/licence-tour-operateur-international-authentik-vietnam.jpg" />
                </div>
            </div>
            <script>
            function ModelLicense(){
                var modal = UIkit.modal("#giayphepid");
                 modal.show();
            }
            </script>  
     </div>  
     <?php echo Withus::widget(array('view' =>'aboutmobi'));?>
     <?php echo Servicework::widget(array('view' =>'mobi'));?>
     <?php echo Boxourteam::widget(array('view' =>'mobi'));?>
</div>       