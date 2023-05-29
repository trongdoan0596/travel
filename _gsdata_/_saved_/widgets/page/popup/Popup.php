<?php
namespace app\widgets\page\popup;
use yii\base\Widget;
class Popup extends Widget{	
    public $view   = 'index';   
	public function init(){
		parent::init();	
	}	
	public function run(){
       $rows     = array(); 
       $params['rows']     = $rows;
       return $this->render($this->view,$params);
	}
}
?>