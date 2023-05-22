<?php
namespace common\models;
use Yii;
use yii\base\Model;
class RequestpriceForm extends Model {
    public $title;
    public $title_tour;
    public $tour_id;
    public $name;
    public $address;        
    public $nationality;    
    public $phone;
    public $email;
    public $skype;
    public $whatsapp;
    public $viber;   
    public $confirmemail;
    public $adult;
    public $children;
    public $age1;
    public $age2;
    public $age3;
    public $age4;
    public $age5;
    public $age6;
    public $hotel1;
    public $hotel2;
    public $hotel3;
    public $hotel4;
    public $hotel5;
    public $depart;//ngay khoi hanh    
    /*meals2*/
    public $meals1;
    public $meals2;
    public $meals3;
    public $traveldate_id;
    public $arrivaldate_other_m;
    public $arrivaldate_other_y;
    public $mess;  
    public $verifyCode;    
    public $contact1;//lien he qua email,phone or skype
    public $contact2;
    public $contact3;
    public $contact4;
    public $contact5;
    public $contacttxt;//thoi gian khach chon de lien lac    
    public $start_city;//bat dau vao tu TP ?
    public $end_city;//khi ve nuoc thi o TP?
    /*how did you dinf us*/
    public $how_did_id;
    public $howdidtxt;
    /**
     * @dongta
     */
    public function rules(){
        return array(
            // username and password are both required
            array('name', 'filter', 'filter' => 'trim'),
            array('name', 'string', 'min' =>3),
            array('name', 'required','message'=>Yii::t('app','Name cannot be blank.')),
           // array('address', 'required'),
            array('phone', 'filter', 'filter' => 'trim'),
            array('phone', 'required','message'=>Yii::t('app','Phone cannot be blank.')),
            array('email', 'filter', 'filter' => 'trim'),
            array('email', 'required','message'=>Yii::t('app','Email cannot be blank.')),
            array('email', 'email', 'message'=>Yii::t('app','Email is not valid')),   
            array('confirmemail', 'required','message'=>Yii::t('app','Confirm E-mail cannot be blank.')),
            array('confirmemail', 'compare', 'compareAttribute'=>'email','message' =>Yii::t('app','Confirm your email must be equal to E-mail')),         
            array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
            array('adult', 'filter', 'filter' => 'trim'),        
            array('adult', 'required','message'=>Yii::t('app','Adult cannot be blank.')),
            array(
                  array('title','tour_id','name','address','email','phone','nationality','mess','adult','children',
                        'age1','age2','age3','age4','age5','age6','hotel1','hotel2','hotel3','hotel4','hotel5','depart',
                        'traveldate_id','arrivaldate_other_m','arrivaldate_other_y','meals1','meals2','meals3',
                        'skype','whatsapp','viber','contact1','contact2','contact3','contact4','contact5','contacttxt','title_tour','verifyCode',
                        'start_city','end_city','how_did_id','howdidtxt'
                       ),
                  'safe'
             ),            
        );
    }
 public function attributeLabels() {
        return [
            'title' =>Yii::t('app','Sex'),  
            'title_tour' =>Yii::t('app','Title tour'),  
            'name' =>Yii::t('app','Name'), 
            'tour_id' =>Yii::t('app','Tour ID'),  
            'nationality' =>Yii::t('app','Nationality'), 
            'phone' =>Yii::t('app','Phone'),         
            'email' =>Yii::t('app','E-mail'), 
            'address' =>Yii::t('app','Address'), 
            'mess' => Yii::t('app','Message'),
            'age' => Yii::t('app','Age'),
            'adult' => Yii::t('app','Number of participants'),
            'children' => Yii::t('app','Children'),
            'hotel' => Yii::t('app','Hotel'),
            'depart' => Yii::t('app','Arrival'),
            'confirmemail'=>Yii::t('app','Confirm E-mail'), 
            'verifyCode'=>Yii::t('app','Verify Code'),
            'skype'=>Yii::t('app','Skype account'),
            'whatsapp' =>Yii::t('app','Your WhatsApp'),
            'viber' =>Yii::t('app','Your Viber'),
            'contacttxt'=>Yii::t('app','Best time for telephone call or skype'),   
            'start_city'=>Yii::t('app','Start city'),
            'end_city'=>Yii::t('app','End city'),        
        ];
    }
     public function getAllAge() {
        return [
            1=> Yii::t('app','20-30'),
            2=> Yii::t('app','31-40'),
            3=> Yii::t('app','41-50'),
            4=> Yii::t('app','51-60'),
            5=> Yii::t('app','61-70'),
            6=> Yii::t('app','70 ( above )'),
         ];
    }
 public function getAge($id) {
        if ($id) {
            $arr = self::getAllAge();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }   
   public function getAllHotelType() {
        return [
            1=> Yii::t('app','Homestay'),
            2=> Yii::t('app','3***(45 - 65 USD/room/night)'),
            3=> Yii::t('app','4****(65 - 100 USD/room/night)'),
            4=> Yii::t('app','4****+ (100 - 180 USD/room/night)'),   
            5=> Yii::t('app','5*****(>180 USD /room/night)'),       
         ];
    }
 public function getHotelType($id) {
        if ($id) {
            $arr = self::getAllHotelType();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '-No-';
        }
    }  
  public function getAllMeals() {
        return [
            1=> Yii::t('app','Breakfast'),
            2=> Yii::t('app','Half Board'),
            3=> Yii::t('app','Full Board')         
         ];
    }
 public function getMeals($id) {
        if ($id) {
            $arr = self::getAllMeals();
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
  public function getAllCityStart() {
        return [1=>'Hanoi',2=>'HCM Ville',3=>'Danang'];
    }
 public function getCityStart($id) {
        if ($id) {
            $arr = self::getAllCityStart();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }
  public function getAllCityEnd() {
        return [1=>'Hanoi',2=>'HCM Ville'];
    }
 public function getCityEnd($id) {
        if ($id) {
            $arr = self::getAllCityEnd();
            return isset($arr[$id]) ? $arr[$id] : '--No--';
        } else {
            return '--No--';
        }
    }   
  public function getAllHowDidUs() {
        return [
            1=> Yii::t('app','Friends / Family'),
            2=> Yii::t('app','Search Engine'),
            3=> Yii::t('app','Internet Advertisement'),
            4=> Yii::t('app','Social Network'),
            5=> Yii::t('app','Other')                
         ];
    }
 public function getHowDidUs($id) {
        if ($id) {
            $arr = self::getAllHowDidUs();
            return isset($arr[$id]) ? $arr[$id] : '-No-';
        } else {
            return '-No-';
        }
    }       
   public function SendEmailAdmin($model,$modeltour){
        return Yii::$app->mailer
            ->compose(['html'=>'requestprice'],['model'=>$model,'admin'=>1,'modeltour'=>$modeltour])
            ->setFrom([Yii::$app->params['supportEmail']=>'Authentik Travel'])
            ->setTo(Yii::$app->params['contactEmail'])
            ->setSubject(Yii::t('app','Booking Request'))
            ->send();            
        return true;
    }  
//send mail for account
public function SendEmailConfirm($model,$modeltour){
        return Yii::$app->mailer
            ->compose(['html' => 'requestprice'],['model' => $model,'admin' =>0,'modeltour' =>$modeltour])
            ->setFrom([Yii::$app->params['supportEmail'] => 'Authentik Travel'])
            ->setTo($model->email)
            ->setSubject('AuthentikTravel/booking request')
            ->send();
        return true;
    }
}
