<?php
namespace common\models;
use Yii;
use yii\base\Model;
use common\models\Tour;
class CustomizeForm extends Model {
    /*your profile*/
    public $profile_id;   
    /*the participants*/
    public $number_adults; 
    public $number_children; 
    /*your accommodation types*/
    public $typeacc1;
    public $typeacc2;  
    public $typeacc3;  
    public $typeacc4;  
    public $typeacc5;    
    /*tour purposes*/
    public $purposes_id;//Tourism,Honeymoon,Other and tourothertxt
    public $purposesothertxt;
    /*tour type*/
    //public $type_id;      
    public $typetour1;
    public $typetour2;  
    public $typetour3;  
    /*Meals*/
    //public $meals_id;
    public $meals1;
    public $meals2;
    public $meals3;
    /*go with*/
    //public $go_with_id;
    public $gowith1;
    public $gowith2;
    public $gowith3;
    public $gowith4;
    public $gowith5;
    public $gowith6;
    public $gowith7;
    public $gowith8;
    public $gowith9;
    /*your description of the journey*/
    public $descriptiontxt;
    /*your travel dates*/
    
    public $traveldate_id;
    public $arrivaldatetxt;
   // public $arrivaldate_other_id;
    public $arrivaldate_other_m;//month
    public $arrivaldate_other_y;//year
    public $flight_id;//yes or no   
    public $number_nights;
    /*your budget*/
    public $budgettxt;
    /*how did you dinf us*/
    public $how_did_id;
    public $howdidtxt;
    /*detail*/
    public $slcgender;
    public $firstname;
    public $lastname;
    public $address;
    public $postalcode;
    public $city;
    public $phone;
    public $nationality;
    public $email;
    public $skype;
    public $confirmemail;  
    public $verifyCode;
    
    public $contact1;//lien he qua email,phone or skype
    public $contact2;
    public $contact3;
    public $contact4;
    public $contact5;
    public $contacttxt;//thoi gian khach chon de lien lac
    /*map*/
    public $vietnammap;
    public $laosmap;
    public $cambodiamap;
    public $mapother;
    public $whatsapp;
    public $viber;    
    /**
     * @dongta
     */
    public function rules(){
        return array(
            //array('descriptiontxt', 'filter', 'filter' => 'trim'),
           // array('descriptiontxt', 'required'),
            array('number_adults', 'filter', 'filter' => 'trim'),
            array('number_adults', 'required'),
            array('number_nights', 'filter', 'filter' => 'trim'),
            array('number_nights', 'required'),
            array('firstname', 'filter', 'filter' => 'trim'),            
            array('firstname', 'required','message' =>Yii::t('app','First name can not be empty.')),
            
            array('lastname', 'filter', 'filter' => 'trim'),
            array('lastname', 'required','message' =>Yii::t('app','Last name can not be empty.')),
            //array('address', 'filter', 'filter' => 'trim'),
            //array('address', 'required','message' =>Yii::t('app','Address can not be empty.')),
            array('phone', 'filter', 'filter' => 'trim'),
            array('phone', 'required','message' =>Yii::t('app','Phone can not be empty.')),
            array('nationality', 'filter', 'filter' => 'trim'),
            array('nationality', 'required','message' =>Yii::t('app','Nationality can not be empty.')),
            array('email', 'filter', 'filter' => 'trim'),
            array('email', 'required','message' =>Yii::t('app','Your email can not be empty.')), 
            array('email', 'email', 'message'=>'Email is not valid'),
            array('confirmemail', 'required','message' =>Yii::t('app','Confirming your email can not be empty.')),
            array('confirmemail', 'compare', 'compareAttribute'=>'email','message' =>Yii::t('app','Confirm your email must be equal to E-mail')),
            array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
            array(
                  array('profile_id','slcgender','firstname','lastname','address','phone','nationality','postalcode','city',
                        'email','confirmemail','number_adults','number_children','typeacc1','typeacc2',
                        'typeacc3','typeacc4','typeacc5','purposesothertxt','descriptiontxt',
                        'gowith1','gowith2','gowith3','gowith4','gowith5','gowith6','gowith7','gowith8','gowith9',
                        'meals1','meals2','meals3',
                        'typetour1','typetour2','typetour3','traveldate_id','arrivaldatetxt','purposes_id','arrivaldate_other_id','arrivaldate_other_m',
                        'arrivaldate_other_y','flight_id','number_nights_id','number_nights','budgettxt','how_did_id',
                        'howdidtxt','vietnammap','laosmap','cambodiamap','mapother',
                        'skype','whatsapp','viber','contact1','contact2','contact3','contact4','contact5','contacttxt'
                       ),
                  'safe'
             ),
        );  
    }
 public function attributeLabels() {
        return [
            'firstname' => Yii::t('app','First name').' *',
            'lastname' => Yii::t('app','Last name').' *',
            'nationality' => Yii::t('app','Nationality').' *',
            'address' => Yii::t('app','Address'),
            'phone' => Yii::t('app','Phone').' *',          
            'email' =>Yii::t('app','E-mail').' *',
            'confirmemail' =>Yii::t('app','Confirm your email').' *',
            'verifyCode' =>Yii::t('app','Verify Code').' *',
            'profile_id' =>Yii::t('app','Profile ID'),
            'skype'=>Yii::t('app','Skype account'),
            'whatsapp' =>Yii::t('app','Your WhatsApp'),
            'viber' =>Yii::t('app','Your Viber'),
            'number_adults'=>Yii::t('app','Number of Adults'),
            'number_children'=>Yii::t('app','Number of Children(1-11 years)'),
            'number_nights'=>Yii::t('app','Length of your trip'),
            'budgettxt'=>Yii::t('app','Your budget'),
            'descriptiontxt'=>Yii::t('app','Description'),
            'postalcode'=>Yii::t('app','Postal code'),
            'contacttxt'=>Yii::t('app','Best time for telephone or skype'),        
        ];
    }
  public function getAllProfile() {
        return array(
            1=> Yii::t('app','Alone'),
            2=> Yii::t('app','Couple'),
            3=> Yii::t('app','With Friends'),
            4=> Yii::t('app','Family'),
            5=>Yii::t('app','Association / Club')
         );
    }
 public function getProfile($id) {
        if ($id) {
            $arr = self::getAllProfile();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }  
public function getAllAccType() {
        return array(
            1=> Yii::t('app','Homestay'),
            4=> Yii::t('app','4****+ (100 - 180 USD/room/night)'),
            2=> Yii::t('app','3***(45 - 65 USD/room/night)'),
            5=> Yii::t('app','5*****(>180 USD /room/night)'),   
            3=> Yii::t('app','4****(65 - 100 USD/room/night)'),
         );
    }     
 public function getAccType($id) {
        if ($id) {
            $arr = self::getAllAccType();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    } 
 public function getAllPurPoses() {
        return array(
            1=> Yii::t('app','Traveling '),
            2=> Yii::t('app','Honeymoon'),
            3=> Yii::t('app','Others')          
         );
    }
 public function getPurPoses($id) {
        if ($id) {
            $arr = self::getAllPurPoses();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }  
 public function getAllType() {
        return array(
            1=> Yii::t('app','Classic and Culture discovery'),
            2=> Yii::t('app','Off the beaten track and human encounter ( away from the crowd)'),
            3=> Yii::t('app','Adventure – Trekking in the mountain')                
         );
    }
 public function getType($id) {
        if ($id) {
            $arr = self::getAllType();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    } 
 public function getAllMeals() {
        return array(
            1=> Yii::t('app','Breakfast'),
            2=> Yii::t('app','Half Board'),
            3=> Yii::t('app','Full Board')          
         );
    }
 public function getMeals($id) {
        if ($id) {
            $arr = self::getAllMeals();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }    
  public function getAllGoWith() {
        return array(
            1=> Yii::t('app','Discover temples and Pagodas'),
            2=> Yii::t('app','Visiting Museums'),
            3=> Yii::t('app','Visit the traditional craft villages'),
            4=> Yii::t('app','Walking tour'),
            5=> Yii::t('app','Hiking and trekking'),
            6=> Yii::t('app','Cycling tour (2-3 hours)'),
            7=> Yii::t('app','Meeting the locals'),
            8=> Yii::t('app','Traditional Massage'),
            9=> Yii::t('app','Beach break')            
         );
    }
 public function getGoWith($id) {
        if ($id) {
            $arr = self::getAllGoWith();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    } 
   public function getAllGoWithLabel() {
        return array(
            1=>'--',
            2=>'-',
            3=>'+',           
            4=>'++'            
         );
    }
 public function getGoWithLabel($id) {
        if ($id) {
            $arr = self::getAllGoWithLabel();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
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
 public function getAllContact() {
        return [1=>Yii::t('app','Email'),2=>Yii::t('app','Phone'),3=>Yii::t('app','Skype'),4=>Yii::t('app','WhatsApp'),5=> Yii::t('app','Viber')];
    }
 public function getContact($id) {
        if ($id) {
            $arr = self::getAllContact();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }     
//send mail to Administrator
  public function SendEmailAdmin($model,$booktour){
        return Yii::$app->mailer
            ->compose(
                array('html' => 'customizeaccount'),
                array('model' => $model,'booktour' => $booktour,'admin' => 1)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentik Travel'))
            ->setTo(Yii::$app->params['contactEmail']) 
            ->setSubject('Tailor-made email request')
            ->send();
        return true;
    } 
 //send mail to account
  public function SendEmailAccount($model,$booktour){
         return Yii::$app->mailer
            ->compose(
                array('html' => 'customizeaccount'),
                array('model' => $model,'booktour' => $booktour,'admin' =>0)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentik Travel'))
            ->setTo($model->email)
            ->setSubject('AuthentikTravel/Tailor-made email request')
            ->send();
        return true;
    }  
    
       
}
