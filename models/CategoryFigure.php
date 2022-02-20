<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_figures".
 *
 * @property int $id
 * @property int $cat_id
 * @property int $figure_id
 * @property int $status
 */
class CategoryFigure extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_figures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'figure_id'], 'required'],
            [['cat_id', 'figure_id', 'status'], 'integer'],
            ['status', 'default', 'value' => static::STATUS_ACTIVE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'figure_id' => 'Figure ID',
            'status' => 'Status',
        ];
    }

    public static function add($cat_id, $figure_id)
    {
        $item = self::find()->where(['cat_id' => $cat_id, 'figure_id' => $figure_id, 'status' => self::STATUS_ACTIVE])->one();
        if (!$item) return self::saveToDatabase($cat_id, $figure_id); 
    }

    public static function saveToDatabase($cat_id, $figure_id)
    {
        $tablename = self::tableName();
        $sql = "INSERT INTO `$tablename` (`cat_id`, `figure_id`) VALUES ($cat_id, $figure_id)";
        Yii::$app->db->createCommand($sql)->execute();
    } 
}
