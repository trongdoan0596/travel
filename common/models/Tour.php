<?php
namespace common\models;//thu muc hien tai cua app : app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\helpers\Url;
use common\helper\StringHelper;
/**
 * This is the model class for table "au_tour".
 * @property integer $id
 * @property integer $cat_id
 * @property string  $title
 * @property string  $alias
 * @property string  $shorttxt
 * @property string  $introtxt
 * @property string  $metakey
 * @property string  $metadesc
 * @property string  $code
 * @property string  $num_day
 * @property string  $price_include
 * @property string  $price_not_include
 * @property string  $price_from //gia tu
 * @property string  $embedcode_map
 * @property string  $pdf 
 * @property integer $status
 * @property string  $featured 
 * @property integer $start
 * @property integer $country_ids
 * @property integer $destination_ids
 * @property string  $img
 * @property string  $img1
 * @property string  $img2
 * @property string  $img3
 * @property string  $imgmap
 * @property string  $img_path
 * @property integer $ordering
 * @property string  $last_update
 * @property string  $crcountry_idseate_date
 * @property string  $metatitle
 * @property string  $lang
 * @property integer $user_id
 * @property integer $user_modify
 * @property string  $pax1
 * @property string  $pax2
 * @property string  $pax3
 * @property string  $pax4
 * @property string  $pax5
 * @property string  $pax_single
 * 
 */ 
 
class Tour extends ActiveRecord { 
    //khai them su dung cho detailer program
    public $day_id;
    public $day_title;
    public $day_title_fr;
    public $day_fulltxt;
    public $day_fulltxt_fr;
    //tour extentions
    public $ext_tour_id;
    public $ext_status;
    public $ext_ordering;
    
    
    public static function tableName(){
        /*$language = Yii::$app->request->get('language','');
         if(empty($language)){
             $language = Yii::$app->request->cookies->getValue('language');
         }
         if($language=='en'){
              return 'au_tour';
           }else{
             return 'fr_tour';            
         } */   
          return 'au_tour';   
    }
    public function getTourcate(){
        return $this->hasOne(Tourcate::className(),array('id' =>'cat_id'));
    }
	public function rules()	{		
         return array(
            // array('country_id,featured,status,ordering','integerOnly'=>true),
            // array('title', 'length', 'max'=>255),
            // array('img', 'file', 'extensions' =>array('png', 'jpg', 'gif'),'maxSize' =>2*1024),
            // array( array('title'), 'required'),
            // array( array('country_id'), 'required','message' => 'Please choose a Country name.'),
             array(
                  array('id','cat_id','title','alias','shorttxt','introtxt','metakey','metadesc','code',
                          'num_day','price_include','price_not_include','price_from','embedcode_map','status','featured','start',
                          'img','img1','img2','img3','imgmap','pdf','metatitle',
                          'country_ids','destination_ids','ordering','last_update','create_date','lang','user_id',
                          'user_modify','pax1','pax2','pax3','pax4','pax5','pax_single'
                       ),
                  'safe'
             ),
             array(array('id','cat_id','title','status'),'safe', 'on' => 'search'),
        );     
	}
	public function attributeLabels(){
          /* $langbackend  = Yii::$app->request->cookies->getValue('langbackend');
           if($langbackend=='fr'){}else{} */
          $labels = array(
                        'id' => 'ID',                       
                        'cat_id' => 'Category tour',
                        'title' => 'Title',
                        'alias' => 'Alias',                        
                        'imgmap' => 'Image map(600x810)',
                        'img' => 'Image(740x442)',
                        'img1' => 'Image1 (340x270)',
                        'img2' => 'Image2 (430x270)',
                        'img3' => 'Image3 (610x270)',
                        'price_include' => 'Price include',
                        'price_not_include'=>'Price not include',
                        'embedcode_map'=>'Embedcode map',
                        'introtxt'=>'Intro text',                        
                        'pdf'=>'PDF',
                        'num_day' => 'Number day',
                        'metakey' => 'Metakey',
                        'metadesc' => 'Meta Desc(max :160 char)',
                        'metatitle' => 'Metatitle',                        
                        'featured' => 'Featured',   
                        'code' => 'Code',      
                        'status' => 'Status',    
                        'start'=>'Start',
                        'country_ids'=>'Country IDs',
                        'destination_ids'=>'Destination IDs',
                        'ordering' => 'Ordering',  
                        'create_date' => 'Create date',      
                        'last_update' => 'Last update',
                        'pax1' => '1 pax',  
                        'pax2' => '2 pax',
                        'pax3' => '3 - 4  pax',
                        'pax4' => '5 - 7 pax',
                        'pax5' => '>8 pax',
                        'pax_single' => 'Single Supplement',
            		);
		return $labels;
	}

	public function search($params){
	        $lang = Yii::$app->request->cookies->getValue('language');	   
            if(empty($lang)){
               $lang = Yii::$app->request->get('language','');
            }       
        	$sql =  Tour::find();
            $sql->andWhere('lang = "'.$lang.'"');
            $dataProvider = new ActiveDataProvider(array(
                'query' => $sql,
                'pagination'=>array(
                   'pageSize'=>20,
                 ),
            ));
             $dataProvider->setSort(array(
                'defaultOrder' =>array('id'=>SORT_DESC),
                'attributes' => array('id','title','status')
            ));
            if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }
            if($this->title !=''){
               $sql->andWhere('title LIKE "%'.$this->title.'%"');
            }     
            if($this->id>0){
               $sql->andWhere('id = "'.$this->id.'"');
            }
            if($this->cat_id !=''){
               $sql->andWhere('cat_id = "'.$this->cat_id.'"');
            }
            if($this->status !=''){
               $sql->andWhere('status = "'.$this->status.'"');
            }           
          return $dataProvider;
	}
    public static function getAllStatus() {
        return array(0 => 'Ẩn', 1 => 'Hiện');
    }
    public static function getStatus($status) {
        if ($status) {
            $arrStatus = self::getAllStatus();
            return isset($arrStatus[$status]) ? $arrStatus[$status] : ' ';
        } else {
            return 'Ẩn';
        }
    }
 //dung trong backend
 public static function getImg($row,$imgfield='img',$width = 0, $height = 0) {    
        $retUrl = '../../media/no_img.png'; 
        $img    = $row->img; 
        switch ($imgfield) {
                case 'img1':
                    $img = $row->img1; 
                    break;
                 case 'img2':
                     $img = $row->img2; 
                    break;
                 case 'img3':
                     $img = $row->img3; 
                    break;
                    
         }
      
        if($img){
              if($width>0 && $height>0){
                $retUrl = '../../media/tour/'.$width.'_'.$height.'/'.$img;
              }else{
                $retUrl = '../../media/tour/'.$img;
              }    
          
        }
        return $retUrl;
    }  
  public static function getImgmap($row,$width = 0, $height = 0) {    
        $retUrl = '../../media/no_img.png';
        if($row->imgmap){
          $retUrl = '../../media/tour/imgmap/'. $row->imgmap;
        }
        return $retUrl;
    }     
   public static function getPdf($row,$width = 0, $height = 0) {    
        $retUrl = '../../media/no_img.png';
        if($row->pdf){
           $retUrl = '../../media/tour/pdf/'. $row->pdf;
        }
        return $retUrl;
    }   
  //tra ve danh sach cac tour
   public static function getListTour(){
            $dataProvider = Tour::find();
            $dataProvider->where('status =:status',array(':status' => 1));
            $dataProvider->orderBy('title asc');
            $result = $dataProvider->all();    
        return $result;
	}    
   public static function getAllParentsTree(&$arr=array(),$parent_id=0,$level=0){
        $model = Tourcate::find()
                    ->where('status =:status AND parent_id =:parent_id',array(':parent_id' =>$parent_id,':status' => 1))
                    ->orderBy('ordering asc')
                    ->all();
                    
        $prefix = ($parent_id==0)? '':'--';
        $prefix = str_repeat($prefix,$level);
        if($model){
            $level++;
            foreach($model as $item){
                $arr[$item->id] = $prefix . ' ' . $item->title;
                Tour::getAllParentsTree($arr,$item->id,$level);
            }
        }
        return $arr;
    } 
//Front End      
  public static function createUrl($data=array(),$params = array()){		
        if(is_array($data)){
           $params['tid']    = $data['id'];           
           $params['language']    = $data['lang'];
           $params['title']  = StringHelper::formatUrlKey($data['alias']); 
        }else{
           $params['tid']    = $data->id;
           $params['language']   = $data->lang; 
           $params['title']  = StringHelper::formatUrlKey($data->alias);                     
        } 
        //$language = Yii::$app->request->get('language','');
       // if(empty($language)){
        //   $language = Yii::$app->request->cookies->getValue('language');
        //}
        //$params['language'] = $language;
        if($params['language']!='en'){
            return Url::toRoute(array('tour/view','title'=>$params['title'],'language'=>$params['language']));
        }else{
            return Url::toRoute(array('tour/view','title'=>$params['title']));
        }
	
	} 
   public static function getDetailTour($id){     
        $lang = Yii::$app->language;       
        $sql = self::find(); 
        $sql->where('id =:id AND lang =:lang',array(':id' =>$id,':lang' =>$lang));      
        $model = $sql->one();
        return $model;     
      return $model;     
   }   
   public static function getDetailAlias($alias){
      $model = self::find()->where(['alias'=>$alias])->one();     
      return $model;     
   }
   //tra ve duong dan cua anh
   public static function getImage($row,$width = 0, $height = 0,$imgfield='img') {  
        $retUrl = Url::base().'/media/no_img.png';
        $img    = $row->img; 
        switch ($imgfield) {
                case 'img1':
                    $img = $row->img1; 
                    break;
                 case 'img2':
                     $img = $row->img2; 
                    break;
                 case 'img3':
                     $img = $row->img3; 
                    break;
                    
         }
        if($img){
              if($width>0 && $height>0){
                $retUrl = Url::base().'/media/tour/'.$width.'_'.$height.'/'.$img;
              }else{
                $retUrl = Url::base().'/media/tour/'.$img;
              }           
        }
        return $retUrl;
    }
   public static function getImageMap($row,$width = 0, $height = 0) {    
        $retUrl = Url::base().'/media/no_img.png';
        if($row->imgmap){
          $retUrl = Url::base().'/media/tour/imgmap/'.$row->imgmap;
        }
        return $retUrl;
    }  
  //tra ve danh sach cac tour theo country id
   public static function ListAllTour($catid = 0,$limit=0){     
        $sql = Tour::find();
        if($catid>0){
             $sql->where('status =:status and cat_id =:cat_id',array(':status' =>1,':cat_id' =>$catid));
        }else{
             $sql->where('status =:status ',array(':status' => 1));
        }
        if($limit>0) $sql->limit($limit);
        $sql->orderBy('id desc');
        $result = $sql->all();    
        return $result;
        
	}       
    //tra ve danh sach cac tour theo country id va feature
   public static function ListAllFeatureTour($cat_id = 0,$limit=0,$orderby='ordering asc',$fields=''){   
        $lang = Yii::$app->language;  
        $sql  = Tour::find();
        if($fields!=''){$sql->select($fields);}   
        $lang = Yii::$app->language;
        if($cat_id>0){
             $sql->where('status =:status and featured =:featured and cat_id =:cat_id and lang =:lang',
                            array(':status' =>1,':featured' =>1,':cat_id' =>$cat_id,':lang' =>$lang));
        }else{
             $sql->where('status =:status and featured =:featured and lang =:lang',
                            array(':status' => 1,':featured' => 1,':lang' =>$lang));
        }  
        if($limit>0) $sql->limit($limit);
        $sql->orderBy($orderby);
        $result = $sql->all();    
        return $result;
	} 
  //Other tour   
 public static function ListOtherTour($cat_id = 0,$tour_id = 0,$limit=3){     
        $sql = Tour::find();
        $sql->where('status =:status and cat_id =:cat_id AND id !="'.$tour_id.'"',array(':status' =>1,':cat_id' =>$cat_id));
        if($limit>0) $sql->limit($limit);
        $sql->orderBy('rand()');
        $result = $sql->all();    
        return $result;        
	} 
/********End Class************/
}