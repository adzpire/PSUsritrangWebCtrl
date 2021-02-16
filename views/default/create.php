<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\branch\models\Branch */

// $this->title = 'Create Branch';
$this->params['breadcrumbs'][] = ['label' => 'หน้าแรก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">

    <div class="box box-success">
	    <div class="box-header with-border">
		<span class="box-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		</div>
        <div class="box-body">
			<?= $this->render('_form', [
				'model' => $model,
			]) ?>
        </div>
    </div>

</div>
