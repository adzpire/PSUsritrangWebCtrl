<?php

namespace app\modules\psusritrangwebctrl\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
/**
 * ContactForm is the model behind the contact form.
 */
class ShellData extends Model
{
    public $zone;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
	public $job = [
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
	];

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function getZonearray(){
		$tmp = shell_exec('bash /var/www/basic/views/ctrl/zone.sh 2>&1');
		$arrZone = explode(" ",$tmp);
		
		return $arrZone;
	}
	public function getPcarray($zone){
		$tmp = shell_exec('bash /var/www/basic/views/ctrl/first.sh '.$zone.' 2>&1');
		$arrtmp = explode("<>",$tmp);
		$trimtmp = trim($arrtmp[5]);
		$trimedtmp = rtrim($trimtmp," off ");
		$listtmp = explode(" off ",$trimedtmp);
		$plist = [];
		// print_r($listtmp);
		foreach ($listtmp as $key => $value){
			// print_r($value);
			if(!empty($value)){
			$extmp = explode(" ",trim($value)); 
			/**/ 
				array_push($plist,['ip'=> trim($extmp[0]), 'mac' => trim($extmp[1])]);
			} 
		}
		//exit();
		$tmpid = substr($arrtmp[0],20);
		$provider = new ArrayDataProvider([
			'allModels' => $plist,
			'pagination' => false,
			'sort' => false,
		]);
		return ['tmpid' => $tmpid, 'provider' => $provider];
	}
}
