<?php

namespace app\models\figures;

use Yii;

/**
 * This is the model class for table "figure_images".
 *
 * @property int $id
 * @property int $figure_id
 * @property string $url
 * @property string|null $alt
 * @property string|null $title
 * @property int|null $status
 */
class FigureImage extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'figure_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['figure_id', 'url'], 'required'],
            [['figure_id', 'status'], 'integer'],
            ['url', 'file'],
            [['alt', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'figure_id' => '№ картины',
            'url' => 'Url',
            'alt' => 'Alt',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }
}
