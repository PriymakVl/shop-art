<?php

namespace app\models\subscribers;

use Yii;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property string $email
 * @property string $date
 * @property int|null $state
 */
class Subscriber extends \app\models\AppModel
{
    const STATE_HANDLED = 1;
    const STATE_NOT_HANDLED = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'date'], 'required'],
            [['state'], 'integer'],
            ['state', 'default', 'value' => 0],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date' => 'Дата',
            'state' => 'Состояние',
        ];
    }
}
