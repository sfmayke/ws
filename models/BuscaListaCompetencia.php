<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PRESTACAO.VW_BUSCA_LISTA_COMPETENCIA".
 *
 * @property integer $EXERCICIO
 */
class BuscaListaCompetencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PRESTACAO.VW_BUSCA_LISTA_COMPETENCIA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EXERCICIO'], 'required'],
            [['EXERCICIO'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EXERCICIO' => 'Exercicio',
        ];
    }
    
    
}
