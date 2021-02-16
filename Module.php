<?php

namespace app\modules\psusritrangwebctrl;

/**
 * branch module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\psusritrangwebctrl\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        //$this->layout = 'main';

        parent::init();

        $this->params['title'] = 'ควบคุมผ่านเวปไซต์';
        // $this->params['engtitleshort'] = 'BRANCH';
        // $this->params['ModuleVers'] = '1.1';
        // $this->params['modulecookies'] = 'branchck';
        
        // custom initialization code goes here
    }
}
