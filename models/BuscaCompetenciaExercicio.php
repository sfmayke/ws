<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PRESTACAO.VW_BUSCA_COMPETENCIA_EXERCICIO".
 *
 * @property integer $EXERCICIO
 * @property string $DESCRICAO
 * @property string $ATIVO
 * @property string $DT_PRAZO_ENTREGA_TERMINO
 * @property string $STATUS
 */
class BuscaCompetenciaExercicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PRESTACAO.VW_BUSCA_COMPETENCIA_EXERCICIO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EXERCICIO', 'ATIVO'], 'required'],
            [['EXERCICIO'], 'integer'],
            [['DESCRICAO'], 'string', 'max' => 100],
            [['ATIVO'], 'string', 'max' => 4],
            [['DT_PRAZO_ENTREGA_TERMINO'], 'string', 'max' => 7],
            [['STATUS'], 'string', 'max' => 31],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EXERCICIO' => 'Exercicio',
            'DESCRICAO' => 'Descricao',
            'ATIVO' => 'Ativo',
            'DT_PRAZO_ENTREGA_TERMINO' => 'Dt  Prazo  Entrega  Termino',
            'STATUS' => 'Status',
        ];
    }
}
