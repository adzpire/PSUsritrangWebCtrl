<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'select PC for '.$job;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invt-repair-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		</div>
		<div class="panel-body">
		<h2 class='text-center'>ZONE</h2>
		<div class="row">
		<?php 
			foreach($mdl->zonearray as $key => $value){
				// echo '<div class="col-md-2"><button type="button" class="btn btn-default btn-block">'.$value.'</button></div>';
				echo '<div class="col-md-2">'.Html::a($value, Url::current(['zone' => $value]), ['class' => (Yii::$app->request->get()['zone'] == $value) ? 'btn btn-primary btn-block active' : 'btn btn-primary btn-block']).'</div>';
			}
		?>
		</div>
		<h2 class='text-center'>JOB</h2>
		<div class="row">
		<?php 
			foreach($mdl->job as $key => $value){
				// echo '<div class="col-md-2"><button type="button" class="btn btn-default btn-block">'.$value.'</button></div>';
				echo '<div class="col-md-4">'.Html::a(Html::icon($value['icon']).' '.$value['name'], ['', 'job' => $key, 'zone' => $zone], ['class' => (Yii::$app->request->get()['job'] == $key) ? 'btn btn-success btn-block active' : 'btn btn-success btn-block' ]).'</div>';
			}
		?>
		</div>
		<p class='text-center'>
<?= Html::beginForm([$job], 'post',['id'=>'shut','class' => ""]); ?>
	<?php
	if($job == 'shutwin' or $job == 'sendmsgwin' or $job == 'restartwin') {
		echo Html::label('time :', 'settime', ['class' => 'control-label settime']);
		echo '<div class="input-group">	';
		echo Html::input('text', 'time', '5', [ 'label' => 'time:', 'placeholder' => 'insert time(second)', 'class'=> 'form-control']);
		echo '<span class="input-group-addon" id="basic-addon2">second</span></div>';
	}
	?>
	<?php
	if($job == 'sendmsgwin') {
		echo Html::label('message to window :', 'messagetowin', ['class' => 'control-label messagetowin']);
		echo Html::input('text', 'message', 'Computer will shutdown  Please backup your data', ['placeholder' => 'insert text', 'class'=> 'form-control']);
	}
	?>
	
	<h5 class="text-center">
	<?= Html::button(Html::icon('console').' process', ['class' => 'btn btn-danger btn-block  _selpc']) ?>
	</h5>
	<?= Html::input('hidden', 'objlist', '', ['id'=>'hidelist']) ?>
	<?= Html::input('hidden', 'tmpid', $tmpid) ?>
	<?php echo Html::input('hidden', 'zone', $zone); ?>
	<?= Html::endForm() ?>
	<?php // Html::button(Html::icon('floppy-disk').' เลือก', ['class' => 'btn btn-success _selpc']) ?>
		</p>
		 <?= GridView::widget([
			'dataProvider' => $provider,
			'id' => 'grid',
			'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
				return ['data' => ['key' => $model['ip']]];
			},
			'columns' => [
				'ip',
				'mac',
				['class' => 'yii\grid\CheckboxColumn'],
				// ...
			],
		]) ?>
		</div>
	</div>

</div>
<?php
$this->registerJs("
$(document).on('click', '._selpc', function(event){
	//event.preventDefault();
	var keys = $('#grid').yiiGridView('getSelectedRows');
	$('#hidelist').val(keys);
    document.forms['shut'].submit();
	//alert(keys);
});
", View::POS_END);
?>