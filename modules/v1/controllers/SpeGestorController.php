<?php

namespace app\modules\v1\controllers;

use yii;
use app\models\BuscaUsuarios;
use app\models\BuscaCompetenciaExercicio;
use app\models\BuscaListaCompetencia;
use app\models\BuscaTotalControladoria;

/**
 * Default controller for the `v1` module
 */
class SpeGestorController extends \yii\rest\Controller {

    public function behaviors() {
        return [
                'cors'=>[
                
                    'class' => \yii\filters\Cors::className(),
                    'cors' => [
                        // restrict access to
                        'Origin' => ['http://10.2.21.45:8100'],
                        'Access-Control-Request-Method' => ['GET'],
                        // Allow only POST and PUT methods
                        'Access-Control-Request-Headers' => ['X-Wsse'],
                        // Allow only headers 'X-Wsse'
                        'Access-Control-Allow-Credentials' => true ,
                        // Allow OPTIONS caching
                        'Access-Control-Max-Age' => 3600,
                        // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                        'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                    ],                
            ],
            'json'=>[
            'class' => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    protected function verbs() {
        return [
            'buscalistacompetencia' => ['GET'],
            'buscacompetenciaano' => ['GET'],
            'buscadadosusuario' => ['GET'],
        ];
    }

    public function actionBuscaDadosUsuario($imei) {
        $model = new BuscaUsuarios();
        $model = $model->find()->where(['IMEI' => $imei])->all();
//return json_encode($model[0]->attributes);
        return $model;
    }

    public function actionBuscaCompetenciaAno($ano) {
        $model = new BuscaCompetenciaExercicio();
        $model = $model->find()
                        ->where(['EXERCICIO' => $ano])
                        ->asArray()->all();

        $indices = key($model);
        $temp = $model[$indices]['EXERCICIO'];

        foreach ($model as $key => $value) {

            unset($model[$key]['EXERCICIO']);
        }


        $input_array = array($temp => $model);


        return $input_array;
    }

    public function actionBuscaTotalCompetenciaControladoria($ano, $competencia, $controladoria) {
        $model = new BuscaTotalControladoria();


        $model = $model->find()->select([
                    'EXERCICIO',
                    'DESCRICAO',
                    'QTD_ENVIADAS',
                    'QTD_NAO_ENVIADAS',
                ])->where([
                    'EXERCICIO' => $ano,
                    'COD_COMPETENCIA' => $competencia,
                    'ID_CONTROLADORIA' => $controladoria,
                ])->all();

        return $model;
    }

    public function actionBuscaListaCompetencia() {
        $model = new BuscaListaCompetencia();
        $model = $model->find()->asArray()->all();


//        $indices = key($model);
//        $temp = 'EXERCICIOS';
//
//
//        $input_array = array($temp => $model);



        return $model;
    }

}
