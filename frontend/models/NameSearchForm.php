<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\AppUser;
use common\models\Sms;
use common\eeTools\eeDate;
use common\models\Account;
use eeTools\common\eeDebug;
use common\models\Industry;
use common\models\AccountHotword;

/**
 * Login form
 */
class NameSearchForm extends Model
{
    public $city;
    public $industry;
    
    public $hotwords = [];
    
    


    private $_user;

    public function scenarios()
    {
        return [
                'web-search' => ['city', 'industry'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['city', 'industry'], 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'phone' => '手机号',
                'sms' => '验证码',
        ];
    }

    /**
     * save hotword check into db.
     */
    public function recordHotwordSearch(){
        
        
        $ah = new AccountHotword();
        $ah->scenario = 'web-record';
        $ah->ah_account_id = \Yii::$app->user->id;
        if (empty($ah->ah_account_id)) {
            return false;
        }
        $ah->ah_city = $this->city;
        $ah->ah_industry = $this->industry;
        $ah->save();
        
    }

    /**
     * load random hotword
     */
    public function loadHotword()
    {
//         $limit = (int)\Yii::$app->params['hotword.random.count'];
        //hardcode for online test.
        $limit = 10;
        
        //load params from session
        $this->loadSearchParams();
        
        $industry = Industry::find()->where(['i_title'=>$this->industry])->one();
        if (!empty($industry)) {
            //load random data by industry id
            
            
            
            //check count first
            $sql = 'select count(h_id) from hotword where h_industry_id = :industry_id';
            $cmd = \Yii::$app->db->createCommand($sql);
            $cmd->bindValue(':industry_id', $industry->i_id);
            $cnt = $cmd->queryScalar();
            if ($cnt < $limit) {
                //no enough data in db, direct load no need random
                
                $sql = 'select * from hotword where h_industry_id = :industry_id';
            }else{
                //random load
                $sql = 'select * from hotword where h_industry_id = :industry_id and h_id >= ((SELECT MAX(h_id) FROM hotword)-(SELECT MIN(h_id) FROM hotword)) * RAND() + (SELECT MIN(h_id) FROM hotword)  LIMIT '.$limit;
            }
            
            $cmd = \Yii::$app->db->createCommand($sql);
            $cmd->bindValue(':industry_id', $industry->i_id);
            $result = $cmd->queryAll();
            
            
            
            
            foreach ($result as $value) {
                $this->hotwords[] = $value['h_title'];
            }
            
            
            //do array random order in the end.
            shuffle($this->hotwords);
            
            
        }
        
        if (empty($this->hotwords)) {
            //load with out industry
            $sql = 'select * from hotword where h_id >= ((SELECT MAX(h_id) FROM hotword)-(SELECT MIN(h_id) FROM hotword)) * RAND() + (SELECT MIN(h_id) FROM hotword)  LIMIT '.$limit;
            $cmd = \Yii::$app->db->createCommand($sql);
            $result = $cmd->queryAll();
            foreach ($result as $value) {
                $this->hotwords[] = $value['h_title'];
            }
        }//for empty use random without industry info as result.
        
    }

    /**
     * load search params from session
     */
    public function loadSearchParams(){
        //get params from session
        $tmpSearchParams = \Yii::$app->session->get('web-name-search');
//         eeDebug::show($tmpSearchParams);
        $this->load($tmpSearchParams);
        
    }
    
}
