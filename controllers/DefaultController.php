<?php

namespace app\modules\webcontrol\controllers;

use Yii;
// use backend\modules\webcontrol\models\Branch;
// use backend\modules\branch\models\BranchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\webcontrol\components\AdzpireComponent;
use yii\helpers\Url;
use app\modules\webcontrol\models\LoginForm;
/**
 * DefaultController implements the CRUD actions for Branch model.
 */
class DefaultController extends Controller
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
                'only' => ['update', 'delete', 'create'],
                'rules' => [
                        // allow authenticated users
                        [
                            'allow' => true,
                            'roles' => ['branchstaff'],
                        ],
                ],
            ],
        ];
    }

    public $moduletitle;
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
            // $this->lineprog = Linetokenprogram::findOne(2);
            return true;
        } else {
            return false;
        }
    }    
    /**
     * Lists all Branch models.
     * @return mixed
     */
    public function actionIndex()
    {
		
        Yii::$app->view->title = ' รายการ - '.$this->moduletitle;

        return $this->render('index');
    }

     public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionReadme()
    {
        return $this->render('readme');
    }
    public function actionChangelog()
    {
        return $this->render('changelog');
    }
    public function actionSetvercookies()
    {
        $cookie = \Yii::$app->response->cookies;
        $cookie->add(new \yii\web\Cookie([
            'name' => \Yii::$app->controller->module->params['modulecookies'],
            'value' => \Yii::$app->controller->module->params['ModuleVers'],
            'expire' => time() + (60*60*24*30),
        ]));
        // print_r($cookie);
        // $cookies = \Yii::$app->request->cookies;
        // echo 'ghjghjgj<br>';
        //     print_r($cookies);
        $this->redirect(Url::previous());
    }
}
