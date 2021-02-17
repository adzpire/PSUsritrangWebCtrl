<?php

namespace app\modules\psusritrangwebctrl\controllers;

use Yii;
use app\modules\psusritrangwebctrl\models\ControlHistory;
use app\modules\psusritrangwebctrl\models\ShellData;
use app\modules\psusritrangwebctrl\models\ControlHistorySearch;

use app\modules\psusritrangwebctrl\components\AdzpireComponent;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\ArrayDataProvider;
/**
 * CtrlhisController implements the CRUD actions for ControlHistory model.
 */
class CtrlController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			'access' => [
                'class' => AccessControl::className(),
				//'only' => ['create', 'delete'],
                'rules' => [
                    [
                        //'actions' => ['create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	public $shellmodel;
	public function beforeAction($action){
			$this->shellmodel = new ShellData();

        return parent::beforeAction($action);
    }
	/* public $job = [
		'shutwin'=>['icon'=>'off', 'name'=>'Shutdown(windows)', 'sh'=>'shutspec.sh'], 
		'restartwin'=>['icon'=>'refresh', 'name'=>'Restart(windows)', 'sh'=>'restartspec.sh'], 
		'sendmsgwin'=>['icon'=>'send', 'name'=>'Sendmessage(windows)', 'sh'=>'sendmsgspec.sh'], 
		//'sendfilwin'=>['icon'=>'export', 'name'=>'Sendfile(windows)', 'sh'=>'sendfilspec.sh'], 
		//'getfilwin'=>['icon'=>'import', 'name'=>'Getfile(windows)', 'sh'=>'getfilspec.sh'], 
		//'sendkeywin'=>['icon'=>'pushpin', 'name'=>'Sendkey(windows)', 'sh'=>'sendkeyspec.sh'], 
		'wolnormal'=>['icon'=>'flash', 'name'=>'Wake-on-LAN-normal', 'sh'=>'wolnormal.sh'], 
		//'wolmulti'=>['icon'=>'flash', 'name'=>'Wake-on-LAN-for-multicast', 'sh'=>'wolmulti.sh'], 
		//'mentimeout'=>['icon'=>'time', 'name'=>'Changemenutimeout', 'sh'=>'mentimeout.sh'], 
		//'changewindate'=>['icon'=>'calendar', 'name'=>'Changewindowstimedate', 'sh'=>'changewindate.sh'], 
		'stopdns'=>['icon'=>'log-in', 'name'=>'StopDNS', 'sh'=>'stopdns.sh'], 
		'startdns'=>['icon'=>'log-out', 'name'=>'StartDNS', 'sh'=>'startdns.sh'], 
	]; */
	
    /**
     * Lists all ControlHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ControlHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ControlHistory model.
     * @param integer $id
     * @return mixed
     */
    /* public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    } */

    /**
     * Creates a new ControlHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /* public function actionCreate()
    {
        $model = new ControlHistory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    } */

    /**
     * Updates an existing ControlHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /* public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    } */

    /**
     * Deletes an existing ControlHistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    } */

    /**
     * Finds the ControlHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ControlHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* protected function findModel($id)
    {
        if (($model = ControlHistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } */
	
	public function actionZone()
    {
		/* $tmp = shell_exec('bash /var/www/basic/views/ctrl/zone.sh 2>&1');
		$arrZone = explode(" ",$tmp);*/
		$mdl = new ShellData();
         return $this->render('zone', [
            'arrZone' => $mdl->zonearray,
        ]); 
    }
	public function actionJob($zone)
    {
		//$tmp = shell_exec('bash /var/www/basic/views/ctrl/first.sh '.$zone);
		//$arrtmp = explode("<>",$tmp);
		//$listtmp = explode(" off ",$arrtmp[1]);
		$mdl = new ShellData();
		
		//AdzpireComponent::succalert('alert', 'select zone completed');
		
        return $this->render('job', [
            'zone' => $zone,
			'job' => $mdl->job
        ]);
    }
	public function actionOperation($job,  $zone)
    {		
		$mdl = new ShellData();	
		$arrpc = $mdl->getPcarray($zone);
        return $this->render('operation', [
            'job' => $job,
			'mdl' => $mdl,
			'tmpid' => $arrpc['tmpid'],
			'zone' => $zone,
			'provider' => $arrpc['provider']
        ]);
    }
	
	public function actionShutwin()
    {
		//$prog = 'shutspec.sh "Shutdown(windows)"';
		$job = $this->shellmodel->job['shutwin'];
		$prog = $job['sh'].' "'.$job['name'].'"';
		$time = Yii::$app->request->post()['time'];
		$pclist = Yii::$app->request->post()['objlist'];
		$tmpid = Yii::$app->request->post()['tmpid'];
		$text = str_replace(',', ' ', $pclist);
		$zone = Yii::$app->request->post()['zone'];		
		$this->addhistory([$zone, $pclist, $job['name']]);		
		
		$this->gentmp($tmpid, $text);
		$exectmp3 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.$time.' 2>&1');
		//echo shell_exec('whoami');
		//echo 'bash /var/www/basic/views/ctrl/'.$prog.' '.$tmp5.' '.$time.' 2>&1';
		// var_dump($exectmp3);
		// $exectmp4 = shell_exec('rm -f /tmp/bootmenu-temp*.'.Yii::$app->request->post()['tmpid'].' 2>&1');

		AdzpireComponent::succalert('alert', 'shut down pc: '.$pclist.' completed');
		
		$this->cleantmp($tmpid);
		return $this->redirect(['zone']);
		// if($exectmp4 == 'NULL' and $exectmp3 == 'NULL'){
			// return $this->redirect(['zone']);
		// }else {
            // throw new NotFoundHttpException('something error.');
        // }		
    }
	
	public function actionRestartwin()
    {
		$job = $this->shellmodel->job['restartwin'];
		$prog = $job['sh'].' "'.$job['name'].'"';
		$time = Yii::$app->request->post()['time'];
		$pclist = Yii::$app->request->post()['objlist'];		
		$tmpid = Yii::$app->request->post()['tmpid'];
		$text = str_replace(',', ' ', $pclist);
		$zone = Yii::$app->request->post()['zone'];
		$this->addhistory([$zone, $pclist, $job['name']]);
		
		$this->gentmp($tmpid, $text);
		// $tmp1 = '/tmp/bootmenu-temp1.'.Yii::$app->request->post()['tmpid'];
		// $tmp4 = '/tmp/bootmenu-temp4.'.Yii::$app->request->post()['tmpid'];
		// $tmp5 = '/tmp/bootmenu-temp5.'.Yii::$app->request->post()['tmpid'];		
		// $exectmp = shell_exec('echo "'.$text.'" > '.$tmp1);
		// $exectmp2 = shell_exec('bash /var/www/basic/views/ctrl/second.sh '.$tmp1.' '.$tmp4.' '.$tmp5.' '.Yii::$app->request->post()['time'].' 2>&1');
		$exectmp3 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.$time.' 2>&1');
		$this->cleantmp($tmpid);
		
		AdzpireComponent::succalert('alert', 'restart pc: '.$pclist.' completed!!');
		// $exectmp4 = shell_exec('rm -f /tmp/bootmenu-temp*.'.Yii::$app->request->post()['tmpid'].' 2>&1');
		return $this->redirect(['zone']);
    }
	
	public function actionSendmsgwin()
    {
		$job = $this->shellmodel->job['sendmsgwin'];		
		$prog = $job['sh'].' "'.$job['name'].'"';
		$time = Yii::$app->request->post()['time'];
		$message = Yii::$app->request->post()['message'];
		$tmpid = Yii::$app->request->post()['tmpid'];		
		$pclist = Yii::$app->request->post()['objlist'];
		$text = str_replace(',', ' ', $pclist);
		$zone = Yii::$app->request->post()['zone'];
		$this->addhistory([$zone, $pclist, $job['name']]);
		
		$this->gentmp($tmpid, $text);
		
		$execmessage = shell_exec('echo "'.$message.'" > /tmp/bootmenu-temp3.'.$tmpid);
		
		$exectmp3 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.$time.' /tmp/bootmenu-temp3.'.$tmpid.' 2>&1');
		
		AdzpireComponent::succalert('alert', 'send message pc: '.$pclist.'  completed!!');
		
		$this->cleantmp($tmpid);
		return $this->redirect(['zone']);
    }
	
	public function actionWolnormal()
    {
		$job = $this->shellmodel->job['wolnormal'];
		$prog = $job['sh'].' "'.$job['name'].'"';
		$pclist = Yii::$app->request->post()['objlist'];
		$text = str_replace(',', ' ', $pclist);
		$tmpid = Yii::$app->request->post()['tmpid'];
		$zone = Yii::$app->request->post()['zone'];
		$this->addhistory([$zone, $pclist, $job['name']]);
		
		$this->gentmp($tmpid, $text);
		
		$exectmp3 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' 2>&1');
		
		AdzpireComponent::succalert('alert', 'WoL pc: '.$pclist.' completed!!');
		
		$this->cleantmp($tmpid);
		return $this->redirect(['zone']);
    }
	
	public function actionStopdns()
    {
		$job = $this->shellmodel->job['stopdns'];
		$prog = $job['sh'].' "'.$job['name'].'"';
		$pclist = Yii::$app->request->post()['objlist'];		
		$text = str_replace(',', ' ', $pclist);		
		$tmpid = Yii::$app->request->post()['tmpid'];
		$zone = Yii::$app->request->post()['zone'];
		
		$this->addhistory([$zone, $pclist, $job['name']]);
		
		$this->gentmp($tmpid, $text);
		//echo 'bash /var/www/basic/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.Yii::$app->request->post()['zone'].' 2>&1';
		$exectmp = shell_exec('cp /etc/dhcp/dhcpd.conf /etc/dhcp/dhcpd.conf.$(date +%F-%H%M%S)');
		//var_dump($exectmp);
		$exectmp1 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.$zone.' 2>&1');
		$exectmp2 = shell_exec('sudo service isc-dhcp-server restart 2>&1');
		
		AdzpireComponent::succalert('alert', 'stop network pc: '.$pclist.'  completed!!');
		
		$this->cleantmp($tmpid);
		return $this->redirect(['zone']);
    }
	
	public function actionStartdns()
    {
		$job = $this->shellmodel->job['startdns'];
		$prog = $job['sh'].' "'.$job['name'].'"';
		$pclist = Yii::$app->request->post()['objlist'];		
		$text = str_replace(',', ' ', $pclist);	
		$tmpid = Yii::$app->request->post()['tmpid'];
		$zone = Yii::$app->request->post()['zone'];
		
		/* $model = new ControlHistory();
		$model->zone = $zone;
		$model->pclist = $pclist;
		$model->operation = $job['name'];
		if (!$model->save()) {
			print_r($model->getErrors());exit();
		} */
		$this->addhistory([$zone, $pclist, $job['name']]);
		$this->gentmp($tmpid, $text);
		
		$exectmp = shell_exec('cp /etc/dhcp/dhcpd.conf /etc/dhcp/dhcpd.conf.$(date +%F-%H%M%S)');
		$exectmp1 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/'.$prog.' /tmp/bootmenu-temp5.'.$tmpid.' '.$zone.' 2>&1');
		$exectmp2 = shell_exec('sudo service isc-dhcp-server restart 2>&1');
		
		AdzpireComponent::succalert('alert', 'start network pc: '.$pclist.'  completed!!');
		
		$this->cleantmp($tmpid);
		return $this->redirect(['zone']);
    }
	
	protected function gentmp($id, $text){
		$tmp1 = '/tmp/bootmenu-temp1.'.$id;
		$tmp4 = '/tmp/bootmenu-temp4.'.$id;
		$tmp5 = '/tmp/bootmenu-temp5.'.$id;		
		$exectmp = shell_exec('echo "'.$text.'" > '.$tmp1);
		$exectmp2 = shell_exec('bash '.Yii::getAlias('@app').'/modules/psusritrangwebctrl/views/ctrl/second.sh '.$tmp1.' '.$tmp4.' '.$tmp5.' 2>&1');
	}
	protected function cleantmp($id){
		$exec = shell_exec('rm -f /tmp/bootmenu-temp*.'.$id.' 2>&1');
	}	
	protected function addhistory($arr){
		$model = new ControlHistory();
		$model->zone = $arr[0];
		$model->pclist = $arr[1];
		$model->operation = $arr[2];
		if (!$model->save()) {
			print_r($model->getErrors());exit();
		}		
	}	
}
