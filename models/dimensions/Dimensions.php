<?php

namespace app\models\dimensions;

use Yii;

/**
 * This is the model class for table "dimensions".
 *
 * @property int $id
 * @property string $values
 * @property int $unit
 * @property int $status
 */
class Dimensions extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dimensions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['values'], 'required'],
            [['unit', 'status'], 'integer'],
            [['values'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'values' => 'Values',
            'unit' => 'Unit',
            'status' => 'Status',
        ];
    }
}
