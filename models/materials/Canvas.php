<?php

namespace app\models\materials;

use Yii;

/**
 * This is the model class for table "canvas_materials".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class Canvas extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'canvases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            ['status', 'default', 'value' => 1],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'status' => 'Status',
        ];
    }
}
