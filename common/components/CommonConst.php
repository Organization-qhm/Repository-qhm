<?php

namespace common\components;

use Yii;
use eeTools\common\eeDebug;

/**
 * common const class
 */
class CommonConst {
    const COMSTATUS_NO = 0; // no
    const COMSTATUS_NOTEXT = '否'; // no
    const COMSTATUS_YES = 1; // yes
    const COMSTATUS_YESTEXT = '是'; // yes
    
    /**
     * yes no or no yes list.
     * 
     * @param number $type,
     *            1 -yes/no, 0 - no/yes
     * @return multitype:string
     */
    public static function getYesNoList($type = 1) {
        $ls = [ ];
        if ($type == 0) {
            $ls [self::COMSTATUS_NO] = self::COMSTATUS_NOTEXT;
            $ls [self::COMSTATUS_YES] = self::COMSTATUS_YESTEXT;
        }
        if ($type == 1) {
            $ls [self::COMSTATUS_YES] = self::COMSTATUS_YESTEXT;
            $ls [self::COMSTATUS_NO] = self::COMSTATUS_NOTEXT;
        }
        if ($type == 2) {
            $ls [self::COMSTATUS_YES] = '有';
            $ls [self::COMSTATUS_NO] = '无';
        }
        if ($type == 3) {
            $ls [self::COMSTATUS_YES] = '需要';
            $ls [self::COMSTATUS_NO] = '不需要';
        }
        if ($type == 4) {
            $ls [self::COMSTATUS_YES] = '涉及';
            $ls [self::COMSTATUS_NO] = '不涉及';
        }
        if ($type == 5) {
            $ls [self::COMSTATUS_YES] = '适合';
            $ls [self::COMSTATUS_NO] = '不适合';
        }
        if ($type == 6) {
            $ls [self::COMSTATUS_YES] = 'Helpful';
            $ls [self::COMSTATUS_NO] = 'Useless';
        }
        if ($type == 7) {
            $ls [self::COMSTATUS_YES] = 'Success';
            $ls [self::COMSTATUS_NO] = 'Fail';
        }
        if ($type == 8) {
            $ls [self::COMSTATUS_YES] = 'Yes';
            $ls [self::COMSTATUS_NO] = 'No';
        }
        return $ls;
    }
    
    public static function getYesNoName($id) {
        $ls = self::getYesNoList ();
        
        $lsName = '';
        
        if (isset ( $ls [$id] )) {
            $lsName = $ls [$id];
        }
        
        return $lsName;
    }
    
    
    const COMSEXY_FEMALE = 0; // female
    const COMSEXY_MALE = 1; // male
    public static function getSexyList() {
        $ls = [ ];
        $ls [self::COMSEXY_MALE] = '男';
        $ls [self::COMSEXY_FEMALE] = '女';
        return $ls;
    }
    
    const MARRIAGESTATUS_SINGLE = 1;
    const MARRIAGESTATUS_MARRIED = 2;
    public static function getMarriageStatusList() {
        $ls = [ ];
        $ls [self::MARRIAGESTATUS_SINGLE] = '单身';
        $ls [self::MARRIAGESTATUS_MARRIED] = '已婚';
        return $ls;
    }

    const MSGSTATUS_NEW = 1;
    const MSGSTATUS_READ = 2;
    
    
    const LOCATIONTYPE_PROVINCE = 1;
    const LOCATIONTYPE_CITY = 2;
    const LOCATIONTYPE_DISTRICT = 3;
    const LOCATIONTYPE_STREET = 4;
    const LOCATIONTYPE_JWH = 5;
    
    public static function getLocationTypeList() {
        $ls = [];
        $ls[self::LOCATIONTYPE_PROVINCE] = '省';
        $ls[self::LOCATIONTYPE_CITY] = '市';
        $ls[self::LOCATIONTYPE_DISTRICT] = '区';
        $ls[self::LOCATIONTYPE_STREET] = '街道';
        $ls[self::LOCATIONTYPE_JWH] = '居委会';
        return $ls;
    }
    
    
    const SORT_NORMAL = 100;
    const SORT_TOP = 900;
    
    const AUTH_ADMIN = 1;
    const AUTH_ADMIN_NORMAL = 10;
    const AUTH_ADMIN_SP = 11;
    const AUTH_SP = 100;
    
    public static function getAuthList() {
        $ls = [ ];
        $ls [self::AUTH_ADMIN] = '超级管理员';
        $ls [self::AUTH_ADMIN_NORMAL] = '普通管理员';
//         $ls [self::AUTH_ADMIN_SP] = 'SP管理员';
//         $ls [self::AUTH_SP] = 'SP普通用户';
        return $ls;
    }
    
    
    const F_USERTYPE_NORMAL = 1;
    const F_USERTYPE_ENTERPRISE = 5;
    const F_USERTYPE_VOLUNTEER = 10;
    public static function getFUserTypeList() {
        $ls = [ ];
        $ls [self::F_USERTYPE_NORMAL] = '普通用户';
        $ls [self::F_USERTYPE_ENTERPRISE] = '企业用户';
        $ls [self::F_USERTYPE_VOLUNTEER] = '志愿者';
        return $ls;
    }
    
    

    ////Volunteer Teach Part
    
    //applicant work status
    const VT_APPLICANTSTATUS_WORKING = 1;
    const VT_APPLICANTSTATUS_STUDYING = 2;
    const VT_APPLICANTSTATUS_LOSEJOB = 3;
    const VT_APPLICANTSTATUS_RETIRED = 4;
    
    public static function getVtApplicantStatusList() {
        $ls = [ ];
        $ls [self::VT_APPLICANTSTATUS_WORKING] = '工作';
        $ls [self::VT_APPLICANTSTATUS_STUDYING] = '学习';
        $ls [self::VT_APPLICANTSTATUS_LOSEJOB] = '无业';
        $ls [self::VT_APPLICANTSTATUS_RETIRED] = '退休';
        return $ls;
    }
    

    const VT_FROM_INTERNET = 1;
    const VT_FROM_FRIEND = 2;
    const VT_FROM_ORG = 3;
    const VT_FROM_WW = 4;
    const VT_FROM_OT = 5;
    
    public static function getVtFromList() {
        $ls = [ ];
        $ls [self::VT_FROM_INTERNET] = '网络搜索';
        $ls [self::VT_FROM_FRIEND] = '朋友介绍';
        $ls [self::VT_FROM_ORG] = '机构推荐';
        $ls [self::VT_FROM_WW] = '微信/微博';
        $ls [self::VT_FROM_OT] = '其它';
        return $ls;
    }
    

    const VT_APPLYSTAUTS_APPLYING = 1;
    const VT_APPLYSTAUTS_FAIL = 9;
    const VT_APPLYSTAUTS_COMMIT = 10;
    const VT_APPLYSTAUTS_CHECKING = 11;
    const VT_APPLYSTAUTS_PASS = 100;
    
    public static function getVtApplyStatusList() {
        $ls = [ ];
        $ls [self::VT_APPLYSTAUTS_APPLYING] = '申请中';
        $ls [self::VT_APPLYSTAUTS_COMMIT] = '申请提交';
//         $ls [self::VT_APPLYSTAUTS_CHECKING] = '审核中';
        $ls [self::VT_APPLYSTAUTS_FAIL] = '不通过';
        $ls [self::VT_APPLYSTAUTS_PASS] = '通过';
        return $ls;
    }
    
    public static function getVtApprovalStatusList() {
        $ls = [ ];
        $ls [self::VT_APPLYSTAUTS_FAIL] = '不通过';
        $ls [self::VT_APPLYSTAUTS_PASS] = '通过';
        return $ls;
    }
    
    
    const VT_QUESTION_ONE = '请简述对于支教的理解';
    const VT_QUESTION_TWO = '请简述作为一名合格的教师应该具备的品质以及对您影响最大的教师的教学经验';
    const VT_QUESTION_THREE = '请简述您个性中最大的优点/缺点';
    const VT_QUESTION_FOUR = '请简述未来五年内的人生规划';
    
    const IDTYPE_ID = 1;
    const IDTYPE_PASSPORT = 2;
    
    public static function getIdTypeList() {
        $ls = [ ];
        $ls [self::IDTYPE_ID] = '身份证';
        $ls [self::IDTYPE_PASSPORT] = '护照';
        return $ls;
    }
    
    //applicant edu type
    const EDUTYPE_BASIC = 1;
    const EDUTYPE_PRO = 2;
    const EDUTYPE_BACHELOR = 3;
    const EDUTYPE_MASTER = 4;
    const EDUTYPE_DOCTOR = 5;
    
    public static function getEduTypeList() {
        $ls = [ ];
        $ls [self::EDUTYPE_BASIC] = '专科以下';
        $ls [self::EDUTYPE_PRO] = '专科';
        $ls [self::EDUTYPE_BACHELOR] = '本科';
        $ls [self::EDUTYPE_MASTER] = '硕士';
        $ls [self::EDUTYPE_DOCTOR] = '博士及以上';
        return $ls;
    }
    
    
    //applicant relations
    const RELATION_FATHER = 1;
    const RELATION_MOTHER = 2;
    const RELATION_WIFE = 3;
    const RELATION_SON = 4;
    const RELATION_DAUGHTER = 5;
    const RELATION_HUSBAND = 6;
    
    
    public static function getRelationList() {
        $ls = [ ];
        $ls [self::RELATION_FATHER] = '父亲';
        $ls [self::RELATION_MOTHER] = '母亲';
        $ls [self::RELATION_HUSBAND] = '丈夫';
        $ls [self::RELATION_WIFE] = '妻子';
        $ls [self::RELATION_SON] = '儿子(18周岁以上)';
        $ls [self::RELATION_DAUGHTER] = '女儿(18周岁以上)';
        return $ls;
    }
    

    const VERIFYSTATUS_NOTSTART = 1;
    const VERIFYSTATUS_FAIL = 9;
    const VERIFYSTATUS_COMMIT = 10;
    const VERIFYSTATUS_PASS = 100;
    
    public static function getVerifyStatusList() {
        $ls = [ ];
        $ls [self::VERIFYSTATUS_NOTSTART] = '未提交';
        $ls [self::VERIFYSTATUS_COMMIT] = '提交';
        $ls [self::VERIFYSTATUS_FAIL] = '失败';
        $ls [self::VERIFYSTATUS_PASS] = '通过';
        return $ls;
    }
    
    

    const PAGES_ZCXZ = 1;
    const PAGES_GYWM = 2;
    
    public static function getPagesList() {
        $ls = [ ];
        $ls [self::PAGES_ZCXZ] = '注册须知';
        $ls [self::PAGES_GYWM] = '关于我们';
        return $ls;
    }
    
    const PASSRATE_LOW = 1;
    const PASSRATE_MID = 5;
    const PASSRATE_HIGH = 10;
    
    public static function getPassRateList() {
        $ls = [ ];
        $ls [self::PASSRATE_LOW] = '低';
        $ls [self::PASSRATE_MID] = '中';
        $ls [self::PASSRATE_HIGH] = '高';
        return $ls;
    }
    

    //public actions
    public static function getName($id, $listFunctionName, $type = false) {
        if ($type != false) {
            $ls = self::{'get'.$listFunctionName.'List'} ($type);
        }else{
            $ls = self::{'get'.$listFunctionName.'List'} ();
            
        }
        
        
        $targetName = '';
    
        if (isset ( $ls [$id] )) {
            $targetName = $ls [$id];
        }
    
        return $targetName;
    }
}
