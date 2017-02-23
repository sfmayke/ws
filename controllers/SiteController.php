<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use RestClient;
use yii\helpers\Json;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
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

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    
    public function actionFeed()
    {
        $api = new RestClient([
            'base_url'=>'http://localhost/spe-gestor/web/competencia',
            'headers'=>[
                'Accept'=>'application/json'
            ]
        ]);
        
        
//        $api->delete('../service/4');
//        $api->put('../service/6', [
//           'titulo'=>'GABRIEL ALTERADO!!!!',
//            
//        ]);
        

        
//        $api->post('../service/create', [
//           'titulo'=>'teste', 
//           'cabeca'=>'teste', 
//           'corpo'=>'teste', 
//           'status'=>1, 
//        ]);
        
//        $api->post('../service/create', [
//           'nome'=>'dio'
//        ]);
        
        $result = $api->get('../competencia');
        $data = Json::decode($result->response);
        

        return $this->render('feed',[
            'data'=>$data
        ]);
    }
    
    public function actionBuscaCompetenciaAno()
    {
        $api = new RestClient([
            'base_url'=>'http://localhost/spe-gestor/web/busca-competencia-ano',
            'headers'=>[
                'Accept'=>'application/json'
            ]
        ]);
        
        $result = $api->get('../busca-competencia-ano');
//        $data = Json::decode($result->response);
        echo '<pre>';print_r($result->response);die;

    }
    
    public function actionBuscaDadosUsuario()
    {
        $api = new RestClient([
            'base_url'=>'http://localhost/spe-gestor/web/busca-dados-usuario',
            'headers'=>[
                'Accept'=>'application/json'
            ]
        ]);
        
        $result = $api->get('../busca-dados-usuario');
        echo '<pre>';print_r($result->response);die;

    }
}
