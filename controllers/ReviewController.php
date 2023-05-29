<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Review;
use yii\data\Pagination;
use common\models\Article;
/**
 * Ourteam Review
 */
class ReviewController extends Controller {
   public $layout='main';
   public function Init() {
    parent::init();
            $cookies = Yii::$app->response->cookies;
            $lang = Yii::$app->request->get('language',''); 
            if($lang){
                if(isset(Yii::$app->params['languages'][$lang])){
                    Yii::$app->language = $lang;
                    $cookies->add(new \yii\web\Cookie(array('name'=>'language','value'=>$lang)));
                }
            }elseif($cookies->has('language')){
                Yii::$app->language = $cookies->getValue('language');
            }
   }
   public function actions()  {
        return array(
            'error' => array(
                'class' => 'yii\web\ErrorAction',
            ),
        );
    }
    public function actionIndex() {
         $lang = Yii::$app->language;    
         $url = '#';
         $pagesize = 10;   
         $detect = Yii::$app->mobileDetect;
         if($detect->isMobile()){
            $pagesize = 10;   
         }
         $info = Article::getDetailArticle(195);
         if(!empty($info)){
                $baseurl = 'https://authentiktravel.com'; 
                $title = $info->title;              
                if($info->metatitle!=''){
                    $title = $info->metatitle;
                }                
                $this->view->title = $title;
                if($info->metadesc!='') $metadesc = $info->metadesc;
                  else $metadesc = $title;
                $this->view->registerMetaTag(array('name'=>'description','content'=>$metadesc));
                if($info->metakey!='') $metakey = $info->metakey;
                  else $metakey = $title;
                $url=$baseurl.'/clients-reviews';
                $this->view->registerMetaTag(array('property'=>'og:url','content'=>$url));
                $this->view->registerMetaTag(array('property'=>'og:type','content'=>'website'));                                            
                $this->view->registerMetaTag(array('property'=>'og:title','content'=>$title));                                   
                $this->view->registerMetaTag(array('property'=>'og:description','content'=>$metadesc));
                $this->view->registerMetaTag(array('property'=>'og:site_name','content'=>'Authentik vietnam'));   
                if($info->img !=''){
                     $img = Article::getImage($info);
                     $this->view->registerMetaTag(array('property'=>'og:image','content'=>$baseurl.$img));       
                }      
         }      
        $query  = Review::find()->where("status =:status AND lang =:lang",array(":status" =>1,":lang" =>$lang));
        $count  = clone $query;
        $totalcount = $count->count();
        $pages  = new Pagination(array('totalCount' =>$totalcount,'pageSize'=>$pagesize));
        $rows   = $query->offset($pages->offset)->limit($pages->limit)->orderBy('last_update desc')->all();
        return $this->render('index',array('rows' =>$rows,'pages' =>$pages,'totalcount' =>$totalcount,'info' =>$info,'urlshare'=>$url));        
    }
   public function actionView() {       
       $id    = Yii::$app->request->get('id',0);
       $model = Review::getDetailReview($id);
       $model = '';
       if($id==0){    
           $alias = Yii::$app->request->get('title','');
           if(empty($alias)) $alias = Yii::$app->request->pathInfo;
           $model = Review::getDetailAlias($alias);
       }else{
            $model = Review::getDetailReview($id);
       }  
       
       $info = Article::getDetailArticle(195);
       $url  ='#';
       if(!empty($model)){
                $baseurl = 'https://authentikvietnam.com'; 
                $title = $model->title;   
                $this->view->title = $title;
                if($model->metadesc!='') $metadesc = $model->metadesc;
                  else $metadesc = $model->introtxt;
                $this->view->registerMetaTag(array('name'=>'description','content'=>$metadesc));
                if(!empty($info) && $info->metakey!='') $metakey = $model->metakey;
                  else $metakey = $title;
                $url   = $baseurl.$model->createUrl($model);  
                $this->view->registerMetaTag(array('property'=>'og:url','content'=>$url));
                $this->view->registerMetaTag(array('property'=>'og:type','content'=>'website'));                                            
                $this->view->registerMetaTag(array('property'=>'og:title','content'=>$title));                                   
                $this->view->registerMetaTag(array('property'=>'og:description','content'=>$metadesc));
                $this->view->registerMetaTag(array('property'=>'og:site_name','content'=>'Authentik vietnam'));   
       }
       
	   return $this->render('view',array(
            'model' => $model,
            'info' =>$info,
            'urlshare'=>$url
            ));
   }
    public function actionError() {
        return $this->render('error');
    } 
    

}
