<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VW_BUSCA_DADOS_USUARIOS".
 *
 * @property integer $IDUSUARIO
 * @property string $NOME
 * @property string $CARGO
 * @property string $IMEI
 * @property string $SETOR
 * @property string $QTD_MUN_EXERC
 */
class BuscaUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TCM_ADMIN.VW_BUSCA_DADOS_USUARIOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDUSUARIO', 'NOME','CARGO', 'SETOR'], 'required'],
            [['IDUSUARIO'], 'integer'],
            [['QTD_MUN_EXERC'], 'number'],
            [['NOME'], 'string', 'max' => 150],
            [['CARGO', 'IMEI', 'SETOR'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDUSUARIO' => 'Idusuario',
            'NOME' => 'Nome',
            'CARGO' => 'Cargo',
            'IMEI' => 'Imei',
            'SETOR' => 'Setor',
            'QTD_MUN_EXERC' => 'Qtd  Mun  Exerc',
        ];
    }
    
    public static function primaryKey() {
        return ['IDUSUARIO'];
    }
}
