<?php

namespace app\models\figures;

use Yii;
use yii\web\UploadedFile;

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
    public $image;

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
            [['figure_id'], 'required'],
            [['figure_id', 'status'], 'integer'],
            ['status', 'default', 'value' => 1],
            ['image', 'file'],
            [['alt', 'title', 'url'], 'string', 'max' => 255],
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
            'image' => 'Изображение',
            'url' => 'Url',
            'alt' => 'Alt',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            if (!$this->upload()) return false;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setFlashAfterSave($insert);
        parent::afterSave($insert, $changedAttributes);
    }

    private function upload()
    {
        $image = UploadedFile::getInstance($this, 'image');
        $this->url = 'paintings/' . time() . '.' . $image->extension;
        return $image->saveAs($this->url);
    }
}
