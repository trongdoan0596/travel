<?php
namespace app\widgets\slidebg\slidehome;
use yii\base\Widget;
//use common\models\Tour;
class Slidehome extends Widget{
	public $message;	
    public $view   = 'index';
	public function init(){
		parent::init();	
	}	
	public function run(){
      // $rows = array(0=>'vietnam-travel-agency-local-women.jpg',1=>'vietnam-travel-agency-bagan-myanmar.jpg',2=>'vietnam-travel-agency-halong-bay.jpg',3=>'vietnam-travel-agency-angkor-cambodia.jpg',4=>'vietnam-travel-agency-vientiane-laos.jpg');
      //$rows = array(0=>'vietnam-travel-agency-halong-bay.jpg',1=>'vietnam-travel-agency-hanoi-city.jpg',2=>'vietnam-travel-agency-hoian-ancient-town.jpg',3=>'vietnam-travel-agency-mekong-tour.jpg',4=>'vietnam-travel-agency-northern-vietnam.jpg');
      /*$rows = array(0=>'vietnam-travel-agency-vietnam-beach.jpg',
                    1=>'vietnam-travel-agency-north-vietnam-travel.jpg',     
                    2=>'vietnam-travel-agency-hanoi-city.jpg');
      */
        
      $rows = array(0=>'local-travel-agency-in-vietnam.jpg',
                    1=>'vietnam-travel-agecy-vietnam-holiday.jpg',
                    2=>'vietnam-travel-agency--along-bay-tour.jpg',     
                    3=>'vietnam-travel-agency-northern-vietnam-tour.jpg',
                    4=>'vietnam-travel-agency-north-of-vietnam.jpg',
                    5=>'vietnam-travel-agency-vietnam-beach.jpg'
                    
                    );  
                    
       $params['rows'] = $rows;
       return $this->render($this->view,$params);
	}
}
?>