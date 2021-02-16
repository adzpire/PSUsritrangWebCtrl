<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\Html;
//use yii\bootstrap\ActiveForm;

$this->title = 'select job '.$zone;
$this->params['breadcrumbs'][] = $this->title;
// $job = [
		// 'shutwin'=>'Shutdown(windows) shutdownspecial.sh', 
		// 'restartwin'=>'Restart(windows) restartspecial.sh',
		// 'Sendmessage(windows)'=>'Sendmessage(windows) sendmessagespecial.sh',
		// 'Sendfile(windows)'=>'Sendfile(windows) sendfilespecial.sh',
		// 'Getfile(windows)'=>'Getfile(windows) getfilespecial.sh',
		// 'Sendkey(windows)'=>'Sendkey(windows) sendkeyspecial.sh',
		// 'Wake-on-LAN-normal'=>'Wake-on-LAN-normal wakeonlanspecial.sh',
		// 'Wake-on-LAN-for-multicast'=>'Wake-on-LAN-for-multicast wakeonlanspecialformulticast.sh',
		// 'Changemenutimeout'=>'Changemenutimeout changemenutimeoutspecial.sh',
		// 'Changewindowstimedate'=>'Changewindowstimedate changewindowstimedatespecial.sh',
		// 'Stopdns'=>'Stopdns stopdnsspecial.sh',
		// 'Startdns'=>'Startdns startdnsspecial.sh'
	// ];

?>

<div class="invt-repair-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		</div>
		<div class="panel-body">
		<?php
			foreach ($job as $key=>$val){
				echo Html::a(' ' . Html::icon($val['icon']) . ' '.$val['name']. ' '.$val['sh'], ['operation', 'job'=>$key,'zone'=>$zone], ['class'=>'btn btn-success btn-lg btn-block']);
			}
		?>
		</div>
	</div>

</div>
