<?php
namespace backendplus\components;

use yii\web\HttpException;
use common\models\AppUser;
use common\models\AppUserService;
use common\models\AppUserServiceFile;
use common\models\AppUserServiceInfo;
use common\models\AppUserServiceSalary;
use common\models\AppUserMessage;
/**
 * access token check
 * @author boylee
 *
 */
class AuthCheckFilter extends BasedFilter{
    
    public $adminValidateAction = [];
    public $auValidateAction = [];
    public $aumValidateAction = [];
    public $ausValidateAction = [];
    public $ausfValidateAction = [];
    public $ausiValidateAction = [];
    public $aussValidateAction = [];

    
    /**
     * @see \yii\base\ActionFilter::beforeAction()
     */
    public function beforeAction($action) {
        $loginUser = \Yii::$app->user->identity; 
        
        if ($loginUser->u_authRole_id < 10) {
            //admin user can do everything.
            return true;
        }
        
        
        $request = \Yii::$app->getRequest();
        
        //step 1. action only admin user can access
        if (in_array($action->id, $this->adminValidateAction)) {
            if ($loginUser->u_authRole_id > 10) {
                throw new HttpException(403, '只有管理员用户才可访问');
            }
        }
        
        //step 2. client manager appuser relation validate
        if (in_array($action->id, $this->auValidateAction)) {
            $id = $request->getQueryParam('id', false);
            if ($id == false) {
                //try load au_id
                $id = $request->getQueryParam('au_id', false);
            }
            
            $au = AppUser::find()->where(['au_id'=>$id, 'au_adminUser_id'=>$loginUser->u_id])->one();
            if (empty($au)) {
                throw new HttpException(403, '并非目标账号客户经理.');
            }

        }
        
        //step 2.1. client manager + appUserMessage relation validate
        if (in_array($action->id, $this->aumValidateAction)) {
            $id = $request->getQueryParam('id', false);
            
            //load aum
            $aum = AppUserMessage::find()->where(['aum_id'=>$id])->one();
            if (empty($aum)) {
                throw new HttpException(403, '并非目标账号客户经理.. .');
            }
            
            //validate aum.appUser's client manager relationship
            if ($aum->aumAppUser->au_adminUser_id != $loginUser->u_id) {
                throw new HttpException(403, '并非目标账号客户经理.. ..');                
            }

        }
        
        //step 3. client manager appuserservice relation validate
        if (in_array($action->id, $this->ausValidateAction)) {
            $id = $request->getQueryParam('aus_id', false);
            $aus = AppUserService::findOne($id);
            if (empty($aus)) {
                throw new HttpException(403, '数据错误, 请联系管理员.');
            }
            
            if ($aus->ausAppUser->au_adminUser_id != $loginUser->u_id) {
                throw new HttpException(403, '并非目标账号客户经理..');
            }

        }
        
        
        //step 4. client manager AppUserServiceFile relation validate
        if (in_array($action->id, $this->ausfValidateAction)) {
            $id = $request->getQueryParam('id', false);
            $ausf = AppUserServiceFile::findOne($id);
            if (empty($ausf)) {
                throw new HttpException(403, '数据错误, 请联系管理员..');
            }
            
            if ($ausf->ausfAppUserService->ausAppUser->au_adminUser_id != $loginUser->u_id) {
                throw new HttpException(403, '并非目标账号客户经理..');
            }

        }
        
        
        //step 5. client manager AppUserServiceInfo relation validate
        if (in_array($action->id, $this->ausiValidateAction)) {
            $id = $request->getQueryParam('id', false);
            
            if ($id === false) {
                //try get ausi id from url for given ausi_id in url condition
                $id = $request->getQueryParam('ausi_id', false);
            }
            
            $ausi = AppUserServiceInfo::findOne($id);
            
            if (empty($ausi)) {
                throw new HttpException(403, '数据错误, 请联系管理员...');
            }
            
            if ($ausi->ausiAppUserService->ausAppUser->au_adminUser_id != $loginUser->u_id) {
                throw new HttpException(403, '并非目标账号客户经理...');
            }

        }
        
        
        //step 6. client manager AppUserServiceSalary relation validate
        if (in_array($action->id, $this->aussValidateAction)) {
            $id = $request->getQueryParam('id', false);
            $auss = AppUserServiceSalary::findOne($id);
            
            if (empty($auss)) {
                throw new HttpException(403, '数据错误, 请联系管理员....');
            }
            
            if ($auss->aussAppUserService->ausAppUser->au_adminUser_id != $loginUser->u_id) {
                throw new HttpException(403, '并非目标账号客户经理....');
            }

        }

        

        
        return true;
    }
    
    

    
    
}
