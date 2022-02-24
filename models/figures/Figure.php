<?php

namespace app\models\figures;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\AppModel;
use app\models\CategoryFigure;
use app\models\categories\Category;
use app\models\prices\Price;

/**
 * This is the model class for table "figures".
 *
 * @property int $id
 * @property string|null $name
 * @property string $preview
 * @property string $description
 * @property int $status
 */
class Figure extends AppModel
{

    public $cat_id;
    // public $prices;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'figures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preview', 'description', 'cat_id'], 'required'],
            [['preview', 'description'], 'string'],
            [['status', 'cat_id'], 'integer'],
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
            'id' => '№ картины',
            'name' => 'Название',
            'preview' => 'Краткое описание',
            'description' => 'Полное описание',
            'prices' => 'Цены',
            'status' => 'Status',
            'state' => 'Состояние',
            'listCategories' => 'Список категорий',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setFlashAfterSave($insert);
        //add category
        CategoryFigure::add($this->cat_id, $this->id);
        parent::afterSave($insert, $changedAttributes);
    }

    public function getCategories()
    {
        $items = CategoryFigure::find()->where(['figure_id' => $this->id, 'status' => self::STATUS_ACTIVE])->all();
        if(!$items) return false;
        $categories = [];
        foreach ($items as $item) {
            $cat = Category::findOne(['id' => $item->cat_id, 'status' => self::STATUS_ACTIVE]);
            if ($cat) $categories[] = $cat;
        }
        return $categories;
    }

    public function getListCategories()
    {
        if (!$this->categories) return;
        $categories =  ArrayHelper::map($this->categories, 'id', 'name');
        return Html::ul($categories);
    }

    public function getPrices()
    {
        return Price::findAll(['figure_id' => $this->id, 'state' => self::STATE_ACTIVE , 'status' => self::STATUS_ACTIVE]);
    }

    


}
