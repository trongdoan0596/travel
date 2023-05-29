<?php
/*
author :: Pitt Phunsanit
website :: http://plusmagi.com
change language by get language=EN, language=TH,...
or select on this widget
*/ 
namespace common\components; 
use Yii;
use yii\base\Component;
use yii\base\Widget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\Cookie; 
class languageSwitcher extends Widget {     
    public $type='dropdown';
    public function init(){
        if(php_sapi_name() === 'cli'){
            return true;
        } 
        parent::init(); 
        $cookies = Yii::$app->response->cookies;
        $languageNew = Yii::$app->request->get('language','');       
        if($languageNew){
            if(isset(Yii::$app->params['languages'][$languageNew])){
                Yii::$app->language = $languageNew;
                $cookies->add(new \yii\web\Cookie([
                    'name'  => 'language',
                    'value' => $languageNew
                ]));
            }
        }elseif($cookies->has('language')){
            Yii::$app->language = $cookies->getValue('language');
        } 
    } 
    public function run($type=''){
        $languages = Yii::$app->params['languages'];
        $current = $languages[Yii::$app->language];
        if($this->type!='list'){
             unset($languages[Yii::$app->language]); 
        }       
        $items = [];
        $str='';
        foreach($languages as $code => $language){
            $url = Url::base().'/'.$code;
            $temp = [];
            $temp['label'] = $language;
            $temp['url'] = Url::current(['language' => $code]);
            array_push($items, $temp);
            $str .='<li style="float: right;"><a href="'.$url.'"><img src="'.Url::base().'/themes/web/img/flag/'.$code.'.png" alt="'.$language.'" /> '.$language.'</a></li>';
        } 
        if($this->type=='list'){
           //echo Yii::$app->language.'----'.$current;
            return $str.'<li style="float: right;"><a target="_blank" href="https://authentikvietnam.com"><img src="'.Url::base().'/themes/web/img/flag/fr.png" alt="Français" /> Français</a></li>';
        }else{
            echo ButtonDropdown::widget([
                    'label' => $current,
                    'dropdown' => [
                        'items' => $items,
                    ],
                ]);
        }
        
    } 
}