<?php
use app\modules\webcontrol\components\PanelLinkWidget;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>
<?= PanelLinkWidget::widget([
    'setdiv' => [
        'divwidth' => 'col-lg-2 col-sm-3',
        //'divoffset' => 'col-sm-offset-1 col-lg-offset-2',
    ],
    'items' => [
        ['label' => 'จัดการด่วน', 'icon' => 'forward', 'url' => ['ctrl/zone']],
        ['label' => 'จัดการ', 'icon' => 'play', 'url' => ['ctrl/']],        
        ['label' => 'user', 'icon' => 'user', 'url' => ['user/']],        
        ['label' => 'รายงาน', 'icon' => 'stats', 'url' => ['report/']],        
    ],
]); ?>