<?php
namespace common\models;//app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
//use common\helper\StringHelper;
/**
 *
 * The followings are the available columns in table 'au_service_photo':
 * @property string  $id
 * @property string  $service_id
 * @property string  $img
 * @property integer $status
 * @property string  $create_date
 * @property string  $last_update
 */
class Servicephoto extends ActiveRecord {
    public $imgitem;
    public static function tableName() { 
         return 'au_service_photo'; 
    }
  public function rules()	{		
         return array(
            // array('country_id,featured,status,ordering','integerOnly'=>true),
            // array('title', 'length', 'max'=>255),
            // array('img', 'file', 'extensions' =>array('png', 'jpg', 'gif'),'maxSize' =>2*1024),
            // array( array('title'), 'required'),
            // array( array('country_id'), 'required','message' => 'Please choose a Country name.'),
             array(
                  array('id','service_id','img','status','last_update','create_date'
                       ),
                  'safe'
             ),
             array(array('id','service_id','status'),'safe', 'on' => 'search'),
        );     
	}
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'service_id'=>'Service ID',
            'img'=>'Image',
            'status' => 'Status',
            'create_date' => 'Create date',          
            'last_update' => 'Last update' 
        );
    }
  public function search($params) {
      	$query =  Servicephoto::find();//loai truong hop root
            $dataProvider = new ActiveDataProvider(array(
                'query' => $query,
                'pagination'=>array(
                   'pageSize'=>30,
                 ),
            ));
            if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }
          return $dataProvider;
    }
    public function getAllStatus() {
        return array(0 => 'Hide', 1 => 'Show');
    }
    public function getStatus($n) {
        if ($n) {
            $arr = self::getAllStatus();
            return isset($arr[$n]) ? $arr[$n] : '--No--';
        } else {
            return '--No--';
        }
    }
 public function getDetailServicePhoto($id){	 
      $model = Servicephoto::findOne($id);  
      return $model;     
   }
 public function getImg($width = 0, $height = 0) {    
        $retUrl = '../../media/no_img.png';
        if($this->img){
          $retUrl = '../../media/service/'. $this->img;
        }
        return $retUrl;
    }  
 //cap nhat lai trang thai hinh anh gallery     
  public function UpdateServicePhotoStatus($id){	
       $model = Servicephoto::findOne($id);   
       if(!empty($model)){
          $model->status = 1;
          $model->update();
       } 
       return true;
  }    
 //Front end
  public function getListAllPhoto($service_id,$status=1,$orderby='id DESC'){	
        $rows = Servicephoto::find()
                    ->where('service_id=:service_id AND status=:status',array(':service_id' =>$service_id,':status' =>$status))
                    ->orderBy($orderby)
                    ->all();
        return $rows;
	}
 //tra ve duong dan cua anh
 public function getImage($row,$width = 0, $height = 0) {    
        $retUrl = Url::base().'/media/no_img.png';
        if($row->img){
          $retUrl = Url::base().'/media/service/'.$row->img;
        }
        return $retUrl;
    }
}