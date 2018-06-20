<?php

namespace common\components;

use Yii;
use eeTools\common\eeDate;
use common\models\Client;
use eeTools\common\eeDebug;
use yii\helpers\ArrayHelper;

/**
 * AppLocale
 */
class CommonBased extends \yii\db\ActiveRecord {
    public $_user_id = 0;
    
    
    // 't_cntComment'=>0
    public $_defaultValue = [];
    
    
    public function init() {
        parent::init ();
    }
    
    // create update
    public function beforeSave($insert) {
        if (parent::beforeSave ( $insert )) {
            
            if (!isset(\Yii::$app->user)) {
                return true;
            }//for console or other not login condition, direct skip

            if ($this->_user_id == 0 && !empty ( \Yii::$app->user->identity )) {
                // try set correct user.id
                $this->_user_id = \Yii::$app->user->id;
            }
            
//             eeDebug::varDump(\Yii::$app->user);
            
            
//             if (empty($this->_user_id)) {
//                 //use wechat client.c_id as c_id for this project only!!
//                 $client = Client::find()->where(['c_openId'=>\Yii::$app->session->get('wechat.openId')])->one();
//                 if (!empty($client)) {
//                     $this->_user_id = $client->c_id;
//                 }
                
//             }
            
            $pkName = $this->tableSchema->primaryKey;
            if (is_array ( $pkName )) {
                $pkName = $pkName [0];
            }
            
            $userIdCreation = str_replace ( '_', '_creationUser_', $pkName );
            $userIdUpdate = str_replace ( '_', '_updateUser_', $pkName );
            $keySort = str_replace ( 'id', 'sortOrder', $pkName );
            
            if ($this->isNewRecord) {
                // update x_user_id & x_creationDate for new record
                $creationDate = str_replace ( '_id', '_creationDate', $pkName );
                
                if ($this->hasAttribute ( $userIdCreation )) {
                    if (! empty ( $this->_user_id ) && empty ( $this->$userIdCreation )) {
                        $this->$userIdCreation = $this->_user_id;
                    }
                } // update x_creationUser_id
                
                if ($this->hasAttribute ( $creationDate )) {
                    if (empty ( $this->$creationDate )) {
                        $this->$creationDate = eeDate::f ();
                    }
                } // update x_creationDate
                
                if ($this->hasAttribute ( $keySort )) {
                    if (empty ( $this->$keySort )) {
                        $this->$keySort = CommonConst::SORT_NORMAL;
                    }
                } // update x_sortOrder = 100 for default
            } else {
                // update x_updateDate for all model update
                $updateDate = str_replace ( '_id', '_updateDate', $pkName );
                
                if ($this->hasAttribute ( $updateDate )) {
                    $this->$updateDate = eeDate::f ();
                }
                
                if ($this->hasAttribute ( $userIdUpdate )) {
                    if (! empty ( $this->_user_id )) {
                        $this->$userIdUpdate = $this->_user_id;
                    }
                } // update x_updateUser_id
            }
            
            //default values
            foreach ($this->_defaultValue as $key => $value) {
                if (empty($this->{$key})) {
                    $this->{$key} = $value;
                }
            }
            
            return true;
        } else {
            
            return false;
        }
    }
    
    /**
     * load jfield list for dropdown
     * @return ActiveQuery
     */
    public static function loadDDList($showHide = false, $blackTitle = false){
        
        $pkName = self::getTableSchema()->primaryKey;
        if (is_array($pkName)) {
            $pkName = $pkName[0];
        }
        $titleName = str_replace ( 'id', 'title', $pkName );
        $shownName = str_replace ( 'id', 'shown', $pkName );
        $sortName = str_replace ( 'id', 'sortOrder', $pkName );
        
        
        $cols = self::getTableSchema()->columns;
        
        $models = self::find();
        if ($showHide === false && is_array($cols)) {
            // do not load hide if the AR have shown attributes
            if (isset($cols[$shownName])) {
                $models->where([$shownName => 1]);
            }
        }
        
        $models = $models->orderBy("$sortName Desc")->all();
        
        
        $returnArr = [];
        if ($blackTitle !== false) {
            if ($blackTitle === true) {
                $blackTitle = '请选择';
            }// default title
            $returnArr[''] = $blackTitle;
        }
        $returnArr += ArrayHelper::map($models, $pkName, $titleName);
        
        
        return $returnArr;
    }
}
