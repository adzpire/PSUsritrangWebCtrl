<?php
namespace app\modules\psusritrangwebctrl\components;

use Yii;
use yii\base\Component;
use yii\bootstrap\Html;

class AdzpireComponent extends Component{
	public $content;
	
	public function init(){
		parent::init();
		$this->content= 'Hello Yii 2.0 ';
	}
	
	public function display($content=null){
		if($content!=null){
			$this->content= $content;
		}
		echo Html::encode($this->content);
	}
	
	public static function listDataWithEmpty($list, $emptyText){
        $listCat = array(''=>$emptyText);
        foreach ($list as $key => $item) {
            $listCat[$key] = $item;
        }
        return $listCat;
    }
	 
	public static function checkadminModule($a = ''){

	  /*if(!in_array(Yii::app()->user->id, Yii::app()->controller->module->adminModule)){
			if($a != ''){
				 Yii::app()->user->setFlash('redmsg', Cmpnt::t('th', 'norights'));
				 $this->redirect(array($a));
			}
			return false;
	  }else{
			
	  }*/
		return true;
	}
	 
	public static function fileuploaddir($path = NULL){
		if(isset($path)){
			$dir = Yii::app()->basePath.$path;
		}else{
			$dir = Yii::app()->basePath.'/../files/courseEval/';
		}	  
		return $dir;
	}
	
	/*public static function chckhead(){
        $tmpjob = array();
        $jobstff = MainStaffJob::model()->findAll('sj_stid=:sj_stid', array(':sj_stid' => Yii::app()->user->id));
        foreach($jobstff as $key => $value){
            array_push($tmpjob, $value->sj_jid);
        }
        $chckhead = array('head'=>0,'major'=>0);
        if(in_array("24", $tmpjob, TRUE)){
            $chckhead['head'] = 1;
        }else if(in_array("25", $tmpjob, TRUE)){
            $chckhead['head'] = 1;
        }else if(in_array("26", $tmpjob, TRUE)){
            $chckhead['head'] = 1;
        }

        if(in_array("27", $tmpjob, TRUE)){
            $chckhead['major'] = 3;
        }else if(in_array("28", $tmpjob, TRUE)){
            $chckhead['major'] = 2;
        }else if(in_array("29", $tmpjob, TRUE)){
            $chckhead['major'] = 1;
        }

        return $chckhead;
    }*/
	
	public function budgetyear($input)
	{
		$inputdate = strtotime($input);
		$bdgtYstart = strtotime(date('Y') . '-10-1');
        if($inputdate >= $bdgtYstart){
            return date('Y')+1;
        }else{
            return date('Y');
        }
	}
		
	public static function succalert($id, $message, $glyp = 'ok-circle')
    {
		/* return Yii::$app->getSession()->setFlash($id, [
            'type' => 'success',
            'duration' => 4000,
            'icon' => 'glyphicon glyphicon-'.$glyp,
            'message' => $message,
        ]); */
        return Yii::$app->getSession()->setFlash($id,[
			'body'=> $message,
			'options'=>['class'=>'alert-success']
		]);
    }
    public static function dangalert($id, $message, $glyp = 'remove-circle')
    {
        return Yii::$app->getSession()->setFlash($id, [
            'type' => 'danger',
            'duration' => 4000,
            'icon' => 'glyphicon glyphicon-'.$glyp,
            'message' => $message,
        ]);
    }
	
	public function thaibath($number){
	$return_text ="";
	//$number=400.56;
	$number=sprintf("%01.2f",($number)) ;
	$num2text_2=array("","สิบ","ยี่สิบ","สามสิบ","สี่สิบ","ห้าสิบ","หกสิบ","เจ็ดสิบ","แปดสิบ","เก้าสิบ");
	$num2text_1=array("","เอ็ด","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");
	
	$num2text1=array("","เอ็ด","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");
	$num2text2=array("","สิบ","ยี่สิบ","สามสิบ","สี่สิบ","ห้าสิบ","หกสิบ","เจ็ดสิบ","แปดสิบ","เก้าสิบ");
	$num2text3=array("","หนึ่งร้อย","สองร้อย","สามร้อย","สี่ร้อย","ห้าร้อย","หกร้อย","เจ็ดร้อย","แปดร้อย","เก้าร้อย");
	$num2text4=array("","หนึ่งพัน","สองพัน","สามพัน","สี่พัน","ห้าพัน","หกพัน","เจ็ดพัน","แปดพัน","เก้าพัน");
	$num2text5=array("","หนึ่งหมื่น","สองหมื่น","สามหมื่น","สี่หมื่น","ห้าหมื่น","หกหมื่น","เจ็ดหมื่น","แปดหมื่น","เก้าหมื่น");
	$num2text6=array("","หนึ่งแสน","สองแสน","สามแสน","สี่แสน","ห้าแสน","หกแสน","เจ็ดแสน","แปดแสน","เก้าแสน");
	$num2text7=array("","หนึ่งล้าน","สองล้าน","สามล้าน","สี่ล้าน","ห้าล้าน","หกล้าน","เจ็ดล้าน","แปดล้าน","เก้าล้าน");

		$num_split=explode(".",$number);
		for ($i=(strlen($num_split[0]));$i>0;$i--){
			$text=substr(strrev($num_split[0]),$i-1,1);
			switch ($i){
				case 1 : $return_text .=$num2text1[$text] ; break;
				case 2 : $return_text .=$num2text2[$text] ; break;
				case 3 : $return_text .=$num2text3[$text] ; break;
				case 4 : $return_text .=$num2text4[$text] ; break;
				case 5 : $return_text .=$num2text5[$text] ; break;
				case 6 : $return_text .=$num2text6[$text] ; break;
				case 7 : $return_text .=$num2text7[$text] ; break;
			}
	//echo "หลักที่=".$i."มีค่า=".$text. "<br>";
   	}
		if (strlen($num_split[0]) == 0) $return_text .=""; 
		else $return_text .="บาท"; 
		
		for ($i=(strlen($num_split[1]));$i>0;$i--){
			$text=substr(strrev($num_split[1]),$i-1,1);
			switch ($i){
				case 1 : $return_text .=$num2text_1[$text] ; break;
				case 2 : $return_text .=$num2text_2[$text] ; break;
			}
   	}
		if ($num_split[1] == 0) $return_text .="ถ้วน"; else $return_text .="สตางค์";
	return $return_text;
	}
}
?>
