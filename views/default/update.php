<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\branch\models\Branch */

$this->params['breadcrumbs'][] = ['label' => 'หน้าแรก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="branch-update">

    <div class="box box-warning">
	    <div class="box-header with-border">
		<span class="box-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <div class="box-tools pull-right">
            <?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'สร้างใหม่'), ['create'], ['class' => 'btn btn-xs btn-info']) ?>
                <?= Html::a( Html::icon('fire').' '.Yii::t('app', 'ลบ'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-xs btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
                </div>
		</div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
