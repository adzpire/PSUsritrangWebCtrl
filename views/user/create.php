<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ControlHistory */

$this->title = 'Create Control History';
$this->params['breadcrumbs'][] = ['label' => 'Control Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
