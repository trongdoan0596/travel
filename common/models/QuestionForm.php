<?php
namespace common\models;
use Yii;
use yii\base\Model;
class QuestionForm extends Model {
    public $title;
    public $cat_id;
    public $name;
    public $country;
    public $phone;
    public $email; 
    public $confirmemail;
    public $mess;  
    public $verifyCode;    
    /**
     * @dongta
     */
    public function rules(){
        return array(
            // username and password are both required
            array('name', 'filter', 'filter' => 'trim'),
            array('name', 'string', 'min' => 4),
            array('name', 'required'),
            array('email', 'filter', 'filter' => 'trim'),
            array('email', 'required'), 
            array('email', 'email', 'message'=>'Email is not valid'),
            array('confirmemail', 'required'),
            array('confirmemail', 'compare', 'compareAttribute'=>'email'),
            array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
            array('mess', 'filter', 'filter' => 'trim'),
            array('mess', 'string', 'min' =>6),
            array('mess', 'required'),
            array(
                  array('title','cat_id','name','email','phone','country','mess','confirmemail','verifyCode'
                       ),
                  'safe'
             ),            
        );
    }
 public function attributeLabels() {
        return array(
            'title' =>Yii::t('app','Title'),  
            'name' =>Yii::t('app','Name'),  
            'country' =>Yii::t('app','Country'), 
            'phone' =>Yii::t('app','Phone'),        
            'email' =>Yii::t('app','E-mail'),
            'mess' => Yii::t('app','Message'),
            'confirmemail'=>Yii::t('app','Confirm E-mail'),
            'verifyCode'=>Yii::t('app','Verify Code')
        );
    }
   public function SendEmail($model,$article){
        return Yii::$app->mailer
            ->compose(
                array('html' => 'postquestion','text' => 'postquestion'),
                array('model' => $model,'article' =>$article)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Support Authentik Travel'))
            ->setTo(Yii::$app->params['contactEmail'])
            ->setSubject(Yii::t('app','Post your question'))
            ->send();            
        return true;
    }  
//send mail for account
public function SendEmailConfirm($model){
        return Yii::$app->mailer
            ->compose(
                array('text' => 'confirmcontact'),
                array('model' => $model)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Support Authentik Travel'))
            ->setTo($model->email)
            ->setSubject('Confirmation Receiving your message')
            ->send();
        return true;
    }
}
