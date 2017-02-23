<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PRESTACAO.VW_BUSCA_TOTAL_CONTROLADORIA".
 *
 * @property integer $EXERCICIO
 * @property string $ID_CONTROLADORIA
 * @property string $NOME_CONTROLADORIA
 * @property string $DESCRICAO
 * @property string $COD_COMPETENCIA
 * @property integer $ID_COMPETENCIA
 * @property string $QTD_NAO_ENVIADAS
 * @property string $QTD_ENVIADAS
 */
class BuscaTotalControladoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PRESTACAO.VW_BUSCA_TOTAL_CONTROLADORIA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EXERCICIO', 'ID_COMPETENCIA'], 'integer'],
            [['ID_CONTROLADORIA', 'COD_COMPETENCIA', 'QTD_NAO_ENVIADAS', 'QTD_ENVIADAS'], 'number'],
            [['NOME_CONTROLADORIA'], 'string', 'max' => 250],
            [['DESCRICAO'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EXERCICIO' => 'Exercicio',
            'ID_CONTROLADORIA' => 'Id  Controladoria',
            'NOME_CONTROLADORIA' => 'Nome  Controladoria',
            'DESCRICAO' => 'Descricao',
            'COD_COMPETENCIA' => 'Cod  Competencia',
            'ID_COMPETENCIA' => 'Id  Competencia',
            'QTD_NAO_ENVIADAS' => 'Qtd  Nao  Enviadas',
            'QTD_ENVIADAS' => 'Qtd  Enviadas',
        ];
    }
}
