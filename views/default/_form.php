<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\branch\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acronym')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->inline()->radioList([0 =>'ไม่เปิดใช้', 1 => 'เปิดใช้']) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php if(!$model->isNewRecord){
		 echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'รีเซ็ต') , ['class' => 'btn btn-warning']); 
		 } ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
