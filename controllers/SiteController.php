<?php
namespace app\controllers;
use Yii;
//use yii\base\InvalidParamException;
//use yii\web\BadRequestHttpException;
use yii\web\Cookie; 
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use common\components\languageSwitcher;
use common\models\ContactForm;   
use common\models\Booktour;
/**
 * Site controller
*/
class SiteController extends Controller {
   public $layout='main';
   public $enableCsrfValidation = false;
   public function Init() {
    parent::init();
            $cookies = Yii::$app->response->cookies;
            $lang = Yii::$app->request->get('language',''); 
            if($lang){
                if(isset(Yii::$app->params['languages'][$lang])){
                    Yii::$app->language = $lang;
                    $cookies->add(new \yii\web\Cookie(array('name'  => 'language','value' => $lang)));
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
             'captcha' => array(
                 'class' => 'yii\captcha\CaptchaAction',
                // 'class' => 'common\components\MathCaptchaAction',
                // 'fixedVerifyCode' => YII_ENV_TEST ? '42' : null,
                 'minLength' => 4,
                 'maxLength' => 5,
                 'foreColor'=>0x833921,
                 'padding'=>5,
               // 'width'=>'380',
                 'height'=>'60',
                //'backColor'=>0xFFFFFF,
                //'testLimit'=>'3',
                 'offset'=>'3'
            ),
        );
    }
    public function beforeAction($action){
        if(in_array($action->id, ['error'])) {            
            Yii::$app->response->redirect(['404.html']);
            Yii::$app->end();
        }        
        return parent::beforeAction($action);
    }  
    public function actionIndex(){         
        echo 111;die;  
        $baseurl = 'https://authentiktravel.com/';
        $title   = 'Private Tours with a Local Travel Agency in Vietnam';
        $this->view->title = $title; 
        $this->view->registerMetaTag(array('name'=>'keywords','content'=>'Private tours Vietnam, Vietnam travel agency, Vietnam tours, Vietnam Tour, Private tours Myanmar, Myanmar Travel Agency, Myanmar Tours, Myanmar Tour'));  
        $metadesc='A local Travel Agency, specialized in Tailor-made Private Package tours in Vietnam, Laos, Cambodia & Myanmar for Couple, Family and group of Friends.';                    
        $this->view->registerMetaTag(array('name'=>'description','content'=>$metadesc));  
        $this->view->registerMetaTag(array('name'=>'title','content'=>$title));        
        $i    = rand (1, 3);
        switch ($i) {
            case 1:
                $name =  'vietnam-travel-agency-halong-bay.jpg';
                break;
            case 2:
                $name =  'vietnam-travel-agency-local-women.jpg';
                break;
            case 3:
                $name =  'vietnam-travel-agency-angkor-cambodia.jpg';
                break;
        }
        $img     = '/themes/web/img/silde/'.$name;
        $this->view->registerMetaTag(array('property'=>'og:image','content'=>$baseurl.$img));    
        $this->view->registerMetaTag(array('property'=>'og:url','content'=>$baseurl));
        $this->view->registerMetaTag(array('property'=>'og:type','content'=>'website'));                                            
        $this->view->registerMetaTag(array('property'=>'og:title','content'=>$title));                               
        $this->view->registerMetaTag(array('property'=>'og:description','content'=>$metadesc));                                                                      
        return $this->render('index');
    }
    public function actionContactus() {
        $model = new ContactForm();
        $post  = Yii::$app->request->post();
        $this->view->title = Yii::t('app', 'Contact Authentik Travel');
	    if($model->load($post)) {  
            $model->attributes  = $post['ContactForm'];
            $booktour = new Booktour();
            if(strpos($model->mess,'http://')!== false || strpos($model->mess,'https://')!== false ){
                //spam , thong tin khong hop le
                $msg = Yii::t('app', 'Error! http:// or https://');         
                return $this->render('msg',array('msg'=>$msg,'model'=>$model,'booktour'=>$booktour)); 
            }else{ 
                $booktour->title  = Yii::t('app', 'Request from contact tour on Authentik Travel');
                $requesttxt = '<br />'.Yii::t('app', 'Contact us');   
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Gender').':</b>'.$model->slcgender; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Fullname').':</b>'.$model->title; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Your nationality').':</b>'.$model->nationality; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Your phone number').':</b>'.$model->phone; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'E-mail').':</b>'.$model->email;             
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Skype account').':</b>'.$model->skype; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Your WhatsApp').':</b>'.$model->whatsapp; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Your Viber').':</b>'.$model->viber;  
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Which communication do you prefer?').':</b>';            
                if($model->contact1 !=''){
                    $requesttxt .=  $model->getContact($model->contact1).' ,';
                }
                if($model->contact2 !=''){
                    $requesttxt .=  $model->getContact($model->contact2).' ,';
                 }
                if($model->contact3 !=''){
                   $requesttxt .=  $model->getContact($model->contact3);
                } 
                if($model->contact4 !=''){
                   $requesttxt .=  $model->getContact($model->contact4);
                } 
                if($model->contact5 !=''){
                   $requesttxt .=  $model->getContact($model->contact5);
                }    
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Your availability for discussion with us on Skype / phone').':</b>'.$model->contacttxt; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Subject').':</b>'.$model->subject; 
                $requesttxt .= '<br /><b>'.Yii::t('app', 'Message').':</b>'.$model->mess; 
                $booktour->requesttxt  = $requesttxt;
                $booktour->type        = 1;//kieu la tour
                $booktour->source      = 5;//nguon tu web chinh
                $remoteip = ''; 
                if (getenv('HTTP_CLIENT_IP')){
                    $remoteip = 'CLIENT_IP-'.getenv('HTTP_CLIENT_IP');
                }else if(getenv('HTTP_X_FORWARDED_FOR')){
                    $remoteip = 'PROXY-'.getenv('HTTP_X_FORWARDED_FOR');
                }else if(getenv('HTTP_X_FORWARDED')){
                    $remoteip = getenv('HTTP_X_FORWARDED');
                }else if(getenv('HTTP_FORWARDED_FOR')){
                    $remoteip = getenv('HTTP_FORWARDED_FOR');
                }else if(getenv('HTTP_FORWARDED')){
                   $remoteip = getenv('HTTP_FORWARDED');
                }else if(getenv('REMOTE_ADDR')){
                    $remoteip = 'REMOTE_ADDR-'.getenv('REMOTE_ADDR');
                }else{
                    $ip = 'UNKNOWN';  
                }            
                $booktour->remoteip = $remoteip;                
                $booktour->ip          = Yii::$app->getRequest()->getUserIP();
                $booktour->create_date = date("Y-m-d H:i:s");
                $booktour->last_update = date("Y-m-d H:i:s");
                $detect = Yii::$app->mobileDetect;
                $booktour->is_mobile = 0;//la web
                $msg2 = Yii::t('app', '<br /><br /><div class="uk-text-warning">NOTE: Incase, you have not received our response within 24 hours, please check your spam/junk box folder.<br /> For further assistance, please email us: <a href="mailto:sales@authentiktravel.com">sm@authentiktravel.com</a> or message/call us: +84 96 9 72 99 83.</div>');
                if($detect->isMobile()){
                     $booktour->is_mobile = 1;//la mobi
                     $msg2 = Yii::t('app', '<br /><br /><div class="uk-text-warning">NOTE: Incase, you have not received our response within 24 hours,<br /> please check your spam/junk box folder.<br /> For further assistance, please email us:<br /> <a href="mailto:sales@authentiktravel.com">sm@authentiktravel.com</a> <br />or message/call us: <br />+84 96 9 72 99 83.</div>');
                }
                if($detect->isTablet()){
                     $booktour->is_mobile = 2;//la Tablet
                }
                if ($booktour->save(false)) {
                    //$model->SendEmail($model,1);
                    //$model->SendEmailConfirm($model,0);   
                    $msg1 = Yii::t('app', 'Thank you for sending email to Authentik Travel! <br />Our team will reply you within 12 – 24 hours.');
                    $msg = $msg1.$msg2;
                    return $this->render('msg',array('msg'=>$msg,'model'=>$model,'booktour'=>$booktour)); 
                } 
                
            }  
        }             
        return $this->render('contactus');
    }   
   public function actionTestmail() {
       //support@authentiktravel.com , sales.authentiktravel@gmail.com
       echo  Yii::$app->mailer->compose(['html' =>'testmail'])
            ->setFrom([Yii::$app->params['supportEmail']])
            ->setTo('donggv@gmail.com')->setSubject('Test email')->send();
       die('-:-Test');
    }  
    public function actionError() {
        return $this->render('error');
    }  

}
