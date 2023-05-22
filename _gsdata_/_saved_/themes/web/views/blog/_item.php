 <?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use common\helper\StringHelper;
use common\models\User;
use common\models\Blogcate;
$title = Html::encode($row->title);
$url   = $row->createUrl($row);
$img   = $row->getImage($row,450,230);
$create_date = $row->last_update;
$introtxt = HtmlPurifier::process($row->introtxt);
$blog = Blogcate::getDetailBlogcate($row->catblog_id);
$urlblog ='#';$catblog_name='--No--';
if(!empty($blog)){$catblog_name = $blog->title;$urlblog = Blogcate::createUrl($blog);}
$date_fr = StringHelper::showDateMfr($create_date,1);
?><div class="item">
<h2 class="title"><a href="<?php echo $url;?>"><?php echo $title;?></a></h2>
<div class="boxinfo"><font class="datetxt"><?php echo Yii::t('app','Last update');?> <?php echo $date_fr;?></font> Dans <a href="<?php echo $urlblog;?>"><font class="catetxt"><?php echo $catblog_name;?></font></a> <font class="catetxt"><!--Comment (52)--></font></div>
<div class="uk-grid">
<div class="uk-width-2-5"><a class="hover-effect" href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $title;?>" /></a></div>
<div class="uk-width-3-5"><?php echo $introtxt.'<br /> <a href="'.$url.'">'.Yii::t('app', 'Read more').' &nbsp;<i class="uk-icon-long-arrow-right"></i></a>';//StringHelper::Subwords($introtxt,26);?></div>
</div>
</div>