<?php

namespace app\models\materials;

use Yii;

/**
 * This is the model class for table "frames".
 *
 * @property int $id
 * @property string $type
 * @property int $status
 */
class Frame extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }
}
