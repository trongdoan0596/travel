<?php
namespace common\models;
use Yii;
use yii\base\Model;
class ContactForm extends Model {    
    public $slcgender;
    public $title;
    public $nationality;
    public $email;
    public $confirmemail;
    public $mess;  
    public $phone;
    public $subject;  
    public $verifyCode;
    public $skype;
    public $contact1;//lien he qua email,phone or skype
    public $contact2;
    public $contact3;
    public $contact4;
    public $contact5;
    public $contacttxt;//thoi gian khach chon de lien lac
    public $whatsapp;
    public $viber;
    /**
     * @dongta
     */
    public function rules(){
        return array(
            // username and password are both required
            array('title', 'filter', 'filter' => 'trim'),
            array('title', 'string', 'min' => 6),
            array('title', 'required','message'=>'Full name cannot be blank.'),
            array('email', 'filter', 'filter' => 'trim'),
            array('email', 'required','message'=>'E-mail cannot be blank.'), 
            array('email', 'email','message'=>'Email is not valid.'),
            array('confirmemail', 'required','message'=>'Confirm E-mail cannot be blank.'),
            array('confirmemail', 'compare', 'compareAttribute'=>'email','message'=>'Confirm E-mail must be equal to "E-mail".'),
            array('phone', 'filter', 'filter' => 'trim'),
            array('phone', 'required','message'=>'Your phone number cannot be blank.'),
            array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
            array('mess', 'filter', 'filter' => 'trim'),
            array('mess', 'string', 'min' =>6),
            array('nationality', 'required','message'=>'Your nationality cannot be blank.'),
            array('mess', 'required','message'=>'Your message cannot be blank.'),
            array(
                  array('slcgender','title','email','confirmemail','mess','phone','subject','postalcode','nationality',
                        'contact1','contact2','contact3','contact4','contact5','contacttxt','skype','whatsapp','viber'),
                  'safe'
             ),            
        );
    }
 public function attributeLabels() {
        return array(
            'title' =>Yii::t('app','Full name').'*',          
            'email' =>Yii::t('app','E-mail').'*',
            'mess' => Yii::t('app','Your message').'*',
            'phone' =>Yii::t('app','Your phone number').'*',
            'subject' =>Yii::t('app','Subject'),
            'skype' =>Yii::t('app','Skype account'),
            'whatsapp' =>Yii::t('app','Your WhatsApp'),
            'viber' =>Yii::t('app','Your Viber'),
            'confirmemail'=>Yii::t('app','Confirm E-mail').'*',
            'nationality' =>Yii::t('app','Your nationality').'*',
            'contacttxt'=>Yii::t('app','Your availability for discussion with us on Skype / phone'),
            'verifyCode'=>Yii::t('app','Verify Code').'*'
        );
    }
 public function getAllContact() {
        return array(
            1=> Yii::t('app','Email'),
            2=> Yii::t('app','Phone'),
            3=> Yii::t('app','Skype'),
            4=> Yii::t('app','WhatsApp') ,
            5=> Yii::t('app','Viber')           
         );
    }
 public function getContact($id) {
        if ($id) {
            $arr = self::getAllContact();
            return isset($arr[$id]) ? $arr[$id] : '-No-';
        } else {
            return '-No-';
        }
    }     
   public function SendEmail($model,$admin){
        return Yii::$app->mailer
            ->compose(
                array('html' => 'contact'),
                array('model' => $model,'admin'=>$admin)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentik Travel'))
            ->setTo(Yii::$app->params['contactEmail'])
            ->setSubject('Request info')
            ->send(); 
    }  
//send mail for account
public function SendEmailConfirm($model,$admin){
        return Yii::$app->mailer
            ->compose(
                array('html' =>'contact'),
                array('model' => $model,'admin'=>$admin)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentik Travel'))
            ->setTo($model->email)
            ->setSubject(' Authentik Travel/ Request information')
            ->send();
    }
}
