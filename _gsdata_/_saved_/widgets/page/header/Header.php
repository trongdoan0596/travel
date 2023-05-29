<?php
namespace app\widgets\page\header;
use yii\base\Widget;
//use yii\helpers\Html;
use common\models\Menu;
//use common\models\Country;
class Header extends Widget{
	public $message;	
    public $view   = 'index';
    public $lang   = 'lang';
	public function init(){
		parent::init();	
	}	
	public function run(){
       $rows     = array();      
       if($this->view =='blog' || $this->view =='mobiblog'){        
         $rows   = Menu::getMenu(Menu::MENU_BLOG,['id','parent_id','cate_id','ext_id','alias','url','title','tmp','img','introtxt','type']);
       }else{
         $rows   = Menu::getMenu(Menu::MENU_TOP,['id','parent_id','cate_id','ext_id','alias','url','title','tmp','img','introtxt','type']);
       }
       $params['rows']     = $rows;
       return $this->render($this->view,$params);
	}
}
?>