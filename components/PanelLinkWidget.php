<?php
/**
 * Created by PhpStorm.
 * User: cmmsNetAdmin
 * Date: 14/10/2559
 * Time: 14:49 
 */
namespace app\modules\webcontrol\components;
use Yii;
use yii\base\Widget;
use yii\web\JqueryAsset;
class PanelLinkWidget extends Widget
{
    public $items = [];
    public $setdiv = [];
    public function init()
    {
        parent::init();
        JqueryAsset::register($this->getView());
    }

    public function run()
    {
        return $this->render('panellink', [
            'items' => $this->items,
            'setdiv' => $this->setdiv,
        ]);
    }
}
