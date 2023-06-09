<?php
namespace common\models;
use Yii;
use yii\base\Model;
use common\models\Comment;
class CommentForm extends Model {
    public $user_id;
    public $title;
    public $message;
    public $type;
    public $ext_id;
    public $comment_id;
    public $verifyCode;
    public $fullname;
    public $youremail;
    public $url;
    public $itemext_id;
    
    /**
     * @dongta
     */
    public function rules(){
        return array(
             //array('title', 'filter', 'filter' => 'trim'),
             //array('title', 'required'),     
              array('message', 'filter', 'filter' => 'trim'),
              array('message', 'required'),
              array('fullname', 'filter', 'filter' => 'trim'),
              array('fullname', 'required'),
              array('youremail', 'filter', 'filter' => 'trim'),
              array('youremail', 'required'), 
              array('youremail', 'email', 'message'=>'Email is not valid'),            
              array('message', 'filter', 'filter' => 'trim'),
              array('message', 'required'),
              array( array('verifyCode'), 'captcha','message' =>Yii::t('app','You must enter an authentication captcha')),
           
        );
    }
 public function attributeLabels() {
        return array(
            'title' =>Yii::t('app','Title'),
            'message' =>Yii::t('app','Your Message'),
            'type' => 'Type',
            'fullname' =>Yii::t('app','Full name'),
            'youremail' =>Yii::t('app','Your e-mail'),
            'ext_id' => 'Extention ID',
            'verifyCode'=>Yii::t('app','Verify Code')
        );
    }
 public function SendAdminComment($model,$admin){
        return Yii::$app->mailer
            ->compose(
                array('html' =>'comment'),
                array('model' => $model,'admin'=>$admin)
            )
            ->setFrom(array(Yii::$app->params['supportEmail'] => 'Authentikvietnam'))
            ->setTo(Yii::$app->params['commentEmail'])
            ->setSubject('Comment new')
            ->send();
    }   
}
