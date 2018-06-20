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
use yii\helpers\ArrayHelper;
use eeTools\common\eeNet;
use common\components\CommonConst;

/**
 * Check Name form
 */
class CheckNameSearchForm extends Model
{
    //user input by web form
    public $city;
    public $industry;
    public $hotword;
    
    //splited list for search
    public $hotwordList = [];
    
    
    //search result list
    public $nameList = [];
    
    


    private $_user;

    public function scenarios()
    {
        return [
                'web-search' => ['city', 'hotword', 'industry'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['city', 'industry', 'hotword'], 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//                 'phone' => '手机号',
        ];
    }

    /**
     * split keyword into array for use.
     */
    public function splitKeyword(){
        //empty at the end
        $tmpArr = [];
        
        
        //first one full name
        $tmpArr[] = $this->hotword;
        
        //split 2 words a group
        if (mb_strlen($this->hotword) > 2) {
            for ($i = 0; $i < mb_strlen($this->hotword)-1; $i++) {
                if ($i >= 7) {
                    break;
                }//only allow 8 times check
                
                $tmpArr[] = mb_substr($this->hotword, $i, 2);
                
            }
        }
        
        $this->hotwordList = $tmpArr;
        
    }
    
    /**
     * load result from given api
     */
    public function loadResultFromApi(){
        $basedApiUrl = 'http://open.api.tianyancha.com/services/v4/open/searchV2?word='.$this->city;
        
        $this->nameList = []; //clean at begin
        $uniqueNameList = []; //cache company title for unique check
        
        foreach ($this->hotwordList as $oneHT) {
//             var_dump($oneHT);
            
            //Load from api
            $result = eeNet::load($basedApiUrl.$oneHT, ['Authorization: 7a962f21-fc62-4979-94a4-de942debd0ae']);
            $result = json_decode($result);
//             eeDebug::show(isset($result->result11->ee1));
//             eeDebug::show($result);
            
            $tmpResult = [];
            if (isset($result->result->items) && !empty($result->result->items)) {
//                 var_dump($result->result->items);
//                 exit;
                //got result, loop and use
                
                $tmpRoundCnt = 0;
                foreach ($result->result->items as $key=>$oneItem) {
                    if ($tmpRoundCnt > 10) {
                        break;
                    }//for each keyword we only need 10 titles
                    
                    $tmpTitle = $oneItem->name;
                    
                    //check for location and industry type exist
                    if (strpos($tmpTitle, $this->city) === false || strpos($tmpTitle, $this->industry) === false ) {
                        continue;
                    }//no location or industry found in title.
                    
                    
                    $tmpTitle = str_replace('<em>', '', $tmpTitle);
                    $tmpTitle = str_replace('</em>', '', $tmpTitle);
                    $tmpTitle = str_replace('(', '', $tmpTitle);
                    $tmpTitle = str_replace(')', '', $tmpTitle);
                    $tmpTitle = str_replace('（', '', $tmpTitle);
                    $tmpTitle = str_replace('）', '', $tmpTitle);
                    $tmpTitle = str_replace($this->city, '', $tmpTitle);
                    $tmpTitle = str_replace($this->industry, '', $tmpTitle);
                    //@ee2 do something with fengongsi
                    
                    
//                     $tmpTitle = str_replace('分公司', '', $tmpTitle);
                    $tmpArr = explode('有限公司', $tmpTitle);
                    if (isset($tmpArr[1])) {
                        //has FenGongSi
                        $tmpTitle = $tmpArr[0];
                        
                    }
                    
//                     $tmpTitle = str_replace('有限公司', '', $tmpTitle);
//                     $tmpTitle = str_replace('公司', '', $tmpTitle);
                    
                    
                    //check name unique
                    if (!in_array($tmpTitle, $uniqueNameList)) {
                        //add to list
                        $tmpRoundCnt++;
                        $uniqueNameList[] = $tmpTitle;
                        $this->nameList[] = ['title'=>$tmpTitle, 'rate'=>CommonConst::PASSRATE_LOW]; 
                    }
                    
                    
                    
                }
                
                
                
            }
            
            
        }        
//         var_dump($uniqueNameList);
        
//         var_dump($this->nameList);
        
        
    }
    
    public function calculateNameRate(){
        //loop nameList to calcuate rate
        foreach ($this->nameList as &$oneName) {
            //do calculate and save result only for the highest value
            
            $tmpHScore = 0;
            
            foreach ($this->hotwordList as $oneHW) {
                
                //
                
                if (strpos($oneName['title'], $oneHW) === false) {
                    //not found.
                    continue;
                }
                
//                 var_dump($oneHW);
//                 var_dump(mb_strlen($oneHW));
//                 var_dump($this->hotword);
//                 var_dump(mb_strlen($this->hotword));
//                 var_dump($oneName['title']);
//                 var_dump(mb_strlen($oneName['title']));
                
                $tmpScore = mb_strlen($oneHW) / mb_strlen($this->hotword) * mb_strlen($oneHW) / mb_strlen($oneName['title'])*100;
//                 var_dump($tmpScore);
                
                if ($tmpScore > $tmpHScore) {
                    $tmpHScore = $tmpScore;
                }
            }
            
            $tmpHighRate = CommonConst::PASSRATE_HIGH;
            
            if ($tmpHScore > 33) {
                $tmpHighRate = CommonConst::PASSRATE_MID;
            }
            if ($tmpHScore > 66) {
                $tmpHighRate = CommonConst::PASSRATE_LOW;
            }
            
            
            
            
            
            
            $oneName['rate'] = $tmpHighRate;
        }
        
//         exit;
    }
    
    public function calculateRate($title){
        
    }
    
    
    /**
     * search from API
     * @return boolean
     */
    public function apiSearch(){
        
        //1. split keyword to array
        $this->splitKeyword();
        
        //2. use splited list run loop
        $this->loadResultFromApi();

        
        $this->calculateNameRate();
        
//         var_dump($this->nameList);
        
    }
    
    
    /**
     * load search params from session
     */
    public function loadSearchParams(){
        //get params from session
        $tmpSearchParams = \Yii::$app->session->get('web-check-name-search');
        //         eeDebug::show($tmpSearchParams);
        $this->load($tmpSearchParams);
    
    }
    
}
