<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\Html;
//use yii\bootstrap\ActiveForm;

$this->title = 'select zone';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invt-repair-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		</div>
		<div class="panel-body">
		 <?php
			foreach ($arrZone as $val){
				echo Html::a(' ' . Html::icon('fullscreen') . ' '.$val, ['job', 'zone'=>$val], ['class'=>'btn btn-primary btn-lg btn-block']);
			}
		?>
		</div>
	</div>

</div>
