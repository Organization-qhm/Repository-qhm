<?php

namespace common\components;

use Yii;

/**
 * based class for applocale model, will support formname change and return
 * !! it's for backend activefrom support only Apr 10, 2016 @ Lee
 */
class AppLocaleBased extends CommonBased {
    public $formname = '';
    public $curAL = [ ]; // appLocale for current language
    public $ALClassName = '';
    public $ALFKName = '';
    public $ALALName = '';
    
    // actions
    /**
     * custom formname function to return different type formname for project update case we need more than one appLocale there.
     * 
     * @see \yii\base\Model::formName()
     */
    public function formName() {
        if (empty ( $this->formname )) {
            // auto get class name for empty formname
            $classNameArr = explode ( '\\', $this->className () );
            $this->formname = $classNameArr [count ( $classNameArr ) - 1];
        }
        
        return $this->formname;
    }
    
    /**
     * load appLocale info for cur instant
     * 
     * @param integer $localeID
     *            given appLocale.al_id
     * @param boolean $emptyLoad
     *            load any avaiable AL without localeid if given localeid not found.
     */
    public function loadCurAL($localeID = false, $emptyLoad = true) {
        if ($localeID == false) {
            // load locale id from property
            $localeID = $this->localeID;
        }
        
        $this->ALClassName = '\common\models\\' . $this->ALClassName;
        $al = new $this->ALClassName ();
        
        $this->curAL = $al->find ()->where ( [ 
                $this->ALFKName => $this->getPrimaryKey (),
                $this->ALALName => $localeID 
        ] )->one ();
        
        if (empty ( $this->curAL ) && $emptyLoad) {
            // if not load try load any available AL
            $this->curAL = $al->find ()->where ( [ 
                    $this->ALFKName => $this->getPrimaryKey () 
            ] )->one ();
        }
        
        if (empty ( $this->curAL )) {
            $this->curAL = new $this->ALClassName ();
        } // always create a new one at the end. for proof
    }
}
