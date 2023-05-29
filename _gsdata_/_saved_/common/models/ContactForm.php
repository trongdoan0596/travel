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
    public $whatsapp;
    public $viber;
    public $contact;
    public $contact1;//lien he qua email,phone or skype
    public $contact2;
    public $contact3;
    public $contact4;
    public $contact5;
    public $contacttxt;//thoi gian khach chon de lien lac
    public $how_did_id;
    /**
     * @dongta
     */
    public function rules(){
        return array(
            // username and password are both required
            array('title', 'filter', 'filter' => 'trim'),
            array('title', 'string', 'min'=>4,'message'=>'Votre Nom et Prénom doit comporter au moins 6 caractères.'),
            array('title', 'required','message'=>'Votre Nom et Prénom ne peut être vide.'),
            array('email', 'filter', 'filter' => 'trim'),
            array('email', 'required','message'=>'Votre Email ne peut être vide.'), 
            array('email', 'email', 'message'=>'Email is not valid'),
            //array('confirmemail', 'required','message'=>'Confirmer votre Email ne peut être vide.'),
           //array('confirmemail', 'compare', 'compareAttribute'=>'email','message'=>Yii::t('app','Confirmer votre Email doit être égal à Votre Email.')),
            array('phone', 'filter', 'filter' => 'trim'),
            array('phone', 'required','message'=>'Votre Téléphone ne peut être vide.'),
            array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
            array('mess', 'filter', 'filter' => 'trim'),
            array('mess', 'string', 'min' =>6),           
            array('mess', 'required','message'=>'Votre Message ne peut être vide.'),
           // array('nationality','required','message'=>'Votre pays de résidence ne peut être vide.'),
           /* array(
                  array('slcgender','title','email','confirmemail','mess','phone','subject','postalcode','nationality',
                        'contact1','contact2','contact3','contact4','contact5','contacttxt','skype','whatsapp','viber'),
                  'safe'
             ),    */    
              array(
                  array('slcgender','title','email','mess','phone','subject','contact','how_did_id'),
                  'safe'
             ),     
        );
    }
 public function attributeLabels() {
        return array(
            'title' =>Yii::t('app','Votre Nom et Prénom').'*',          
            'email' =>Yii::t('app','E-mail').'*',
            'mess' => Yii::t('app','Votre Message').'*',
            'phone' =>Yii::t('app','Votre Téléphone').'*',
            'subject' =>Yii::t('app','Subject'),
            'skype' =>Yii::t('app','Identifiant skype'),
            'whatsapp' =>Yii::t('app','Votre WhatsApp'),
            'viber' =>Yii::t('app','Votre Viber'),
            'confirmemail'=>Yii::t('app','Confirm E-mail').'*',
            'nationality' =>Yii::t('app','Votre  pays de résidence').'*',
            'contacttxt'=>Yii::t('app','Your availability for discussion with us on Skype / phone'),
            'verifyCode'=>Yii::t('app','Verify Code').'*'
        );
    }
 public function getAllContact_old() {
        return [
            1=> Yii::t('app','Email'),
            2=> Yii::t('app','Phone'),
            3=> Yii::t('app','Skype'),
            4=> Yii::t('app','WhatsApp') ,
            5=> Yii::t('app','Viber')           
        ];
    }
  public function getAllContact() {
        return [
            0=> Yii::t('app','Non'),
            1=> Yii::t('app','Oui')    
        ];
    }   
 public function getContact($id) {
        if ($id>=0) {
            $arr = self::getAllContact();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }     
   public function SendEmail($model,$admin){
        return Yii::$app->mailer
            ->compose(
                array('html' => 'contact'),
                array('model' => $model,'admin'=>$admin)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentikvietnam'))
            ->setTo(Yii::$app->params['contactEmail'])
            ->setSubject('Demande d\'infos')
            ->send(); 
    } 
 public function getAllHowDidUs() {
        return array(
            1=> Yii::t('app','Friends / Family'),
            2=> Yii::t('app','Search Engine'),
            3=> Yii::t('app','Internet Advertisement'),
            4=> Yii::t('app','Social Network'),
            5=> Yii::t('app','Other')                
         );
    }
 public function getHowDidUs($id) {
        if ($id) {
            $arr = self::getAllHowDidUs();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }       
//send mail for account
public function SendEmailConfirm($model,$admin){
        return Yii::$app->mailer
            ->compose(
                array('html' =>'contact'),
                array('model' => $model,'admin'=>$admin)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentikvietnam'))
            ->setTo($model->email)
            ->setSubject('Demande d\'infos')
            ->send();
    }
}
