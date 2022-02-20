<?php

namespace app\models\prices;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property int $id
 * @property string $value
 * @property int $currency
 * @property int $figure_id
 * @property string $options
 * @property int $state
 * @property int $status
 */
class Price extends \app\models\AppModel
{

    const CURRENCIES = [ '1' => 'USD',  '2' =>'EURO'];
    public $dimensions;
    public $frame;
    public $canvas;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'figure_id', 'options'], 'required'],
            [['currency', 'figure_id', 'state', 'status'], 'integer'],
            [['value'], 'string', 'max' => 50],
            [['options'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Значение цены',
            'currency' => 'Валюта',
            'figure_id' => 'Figure ID',
            'options' => 'Описание',
            'state' => 'Состояние',
            'status' => 'Status',
        ];
    }

    public function getStringCurrency()
    {
        return self::CURRENCIES[$this->currency];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setFlashAfterSave($insert);
        parent::afterSave($insert, $changedAttributes);
    }

}
