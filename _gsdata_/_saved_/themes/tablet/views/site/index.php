<?php
use app\widgets\page\withus\Withus;
use app\widgets\page\boxourteam\Boxourteam;
use app\widgets\slidebg\slidehome\Slidehome;
use app\widgets\tour\featured\Featured;
use app\widgets\blog\recentblog\Recentblog;
use app\widgets\traveller\travellerreview\Travellerreview;
use app\widgets\video\lastvideo\Lastvideo;
use app\widgets\setting\settingdefault\Settingdefault;
use app\widgets\page\popup\Popup;
?>
<?php  echo Settingdefault::widget(array('view' =>'index'));?>
<?php echo Slidehome::widget(array('view' =>'tablet'));?>
<?php echo Withus::widget(array('view' =>'tablet'));?>
<?php echo Travellerreview::widget(array('view' =>'tablet'));?>
<?php echo Featured::widget(array('view' =>'tablet'));?>
<?php echo Boxourteam::widget(array('view' =>'tablet'));?>
<?php echo Lastvideo::widget(array('view' =>'tablet'));?>
<?php echo Recentblog::widget(array('view' =>'tablet','article_id'=>101));?>
<div id="modalcov19" class="uk-modal" aria-hidden="true" >
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
         <?php echo Popup::widget(array('view' =>'mobicov19'));?>     
    </div>
</div>
<script language="javascript">
 $.UIkit.modal('#modalcov19').show();//,{center:true}
</script>