<?php
namespace common\components;

use Yii;
use eeTools\common\eeUploadedFile;
use eeTools\common\eeDebug;
use eeTools\common\eeDate;
use eeTools\common\eeArray;

/**
 * based class for media model, support media file upload
 * !! it's for backend activefrom support only Apr 11, 2016 @ Lee
 */
class MediaBased extends CommonBased
{
    //$this->uploadFileAttrs['p_filePath'] = 'filePath';
    public $uploadFileAttrs = [];
    public $uploadFilePath = 'site/';
	
    ////actions

    /**
     * return full display url support CDN
     * @param string $attributeName
     * @return string
     */
    public function getDisplayUrl($attributeName){
        $displayUrl = '';
    
        if (!$this->hasAttribute($attributeName)) {
            //return empty for attribute not match
            return $displayUrl;
        }
        
        if (empty($this->attributes)) {
            return $displayUrl;
        }//return for empty value.
    
        //based
        $displayUrl = \Yii::$app->params['url.resourceBased'];
    
        $displayUrl .= $this->$attributeName;
    
        return $displayUrl;
    }
    
    
    ////Behavior
    /**
     * auto move and copy new upload file name b4 save
     *
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            
            //attribute will run check rules in this round.
            $activeAttr = eeArray::arrIndexAdd($this->activeAttributes());
            
            //need validate's new create obj list.
            $validateAttr = [];
            
            foreach ($this->uploadFileAttrs as $oneMappingAttr => $oneFileAttr) {

                if(!isset($activeAttr[$oneFileAttr])) {
                    continue;
                }//skip for not safe attribute
                
                //try load no need check upload file here.
                if (!is_object($this->{$oneFileAttr})) {
                    
                    //load for new upload.
                    $this->{$oneFileAttr} = eeUploadedFile::getInstance($this, $oneFileAttr);
                    
                    //add to validate attributes for batch validate in once.
                    $validateAttr[] = $oneFileAttr;
                }
            }
            
            //run batch validate for all new create obj in this section.
            if (!empty($validateAttr)) {
                if (!$this->validate($validateAttr)) {
                    return false;
                }//return false for not validate
            }
            
            foreach ($this->uploadFileAttrs as $oneMappingAttr => $oneFileAttr) {

                if(!isset($activeAttr[$oneFileAttr])) {
                    continue;
                }//skip for not safe attribute
                
                //move file
                if (!empty($this->{$oneFileAttr})) {
                    if($this->{$oneFileAttr}->moveUploadFile($this->uploadFilePath, $this->{$oneMappingAttr})){
                        //upload success, use new name update iconfile
                        $this->{$oneMappingAttr} = $this->{$oneFileAttr}->newName;
//                         eeDebug::varDump($this->{$oneMappingAttr});
                    }
                }
            }
    
            return true;
        }else{
            return false;
        };
    }
    
    
    //Actions
    public function savePic($savedAttr, $inputAttr){
        $tmpIns = eeUploadedFile::getInstanceByName($inputAttr);
        
//         eeDebug::varDump($tmpIns, false);
        //                 eeDebug::varDump($this->{$oneFileAttr}, false);
        //                 exit;
        
        if (!$this->validate()) {
            return false;
        }//return false for not validate
        
        if (!empty($tmpIns)) {
            if($tmpIns->moveUploadFile($this->uploadFilePath, $this->{$savedAttr})){
                //upload success, use new name update iconfile
                $this->{$savedAttr} = $tmpIns->newName;
//                 eeDebug::varDump($this->{$oneMappingAttr});
            }
        }
    }
}
