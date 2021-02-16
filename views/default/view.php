<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\branch\models\Branch */

// $this->params['breadcrumbs'][] = ['label' => 'หน้าแรก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-view">

    <div class="box box-success">
	    <div class="box-header with-border">
		<span class="box-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
            <div class="box-tools pull-right">
                <?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'อัพเดต'), ['update', 'id' => $model->id], ['class' => 'btn btn-xs btn-primary']) ?>
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
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name_th',
                'name_en',
                'acronym',
                'status',
            ],
        ]) ?>
        </div>
    </div>

</div>
