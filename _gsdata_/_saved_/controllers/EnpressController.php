<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Enpress;
use yii\data\Pagination;
use common\models\Article;
/**
 * Enpress controller
 */
class EnpressController extends Controller {
   public $layout='main';
   public function actions()  {
        return array(
            'error' => array(
                'class' => 'yii\web\ErrorAction',
            ),
        );
    }
    public function actionIndex() {  
        $baseurl = 'https://authentikvietnam.com';
        $url  = $baseurl.'/authentik-vietnam-en-press'; 
        $info = Article::getDetailArticle(408);
        $infouser = Article::getDetailArticle(409);
        return $this->render('index',array('info'=>$info,'infouser'=>$infouser,'urlshare'=>$url));        
    }
  
    public function actionError() {
        return $this->render('error');
    } 
    

}
