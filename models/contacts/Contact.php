<?php

namespace app\models\contacts;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string $date
 * @property int|null $status
 * @property int|null $state
 */
class Contact extends \app\models\AppModel
{
    const STATE_HANDLED = 1;
    const STATE_NOT_HANDLED = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'subject', 'body', 'date'], 'required'],
            [['body'], 'string'],
            [['status', 'state'], 'integer'],
            ['status', 'default', 'value' => 0],
            ['state', 'default', 'value' => 0],
            [['email', 'subject'], 'string', 'max' => 255],
            [['name', 'date'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'subject' => 'Subject',
            'body' => 'Body',
            'date' => 'Date',
            'status' => 'Status',
            'state' => 'State',
        ];
    }
}
