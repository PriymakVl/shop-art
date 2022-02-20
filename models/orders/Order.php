<?php

namespace app\models\orders;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string $city
 * @property string $address
 * @property int|null $postcode
 * @property string|null $phone
 * @property int $status
 * @property int|null $state
 */
class Order extends \app\models\AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'first_name', 'last_name', 'country', 'city', 'address'], 'required'],
            [['postcode', 'status', 'state'], 'integer'],
            [['email', 'first_name', 'last_name', 'country', 'city'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'country' => 'Country',
            'city' => 'City',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'phone' => 'Phone',
            'status' => 'Status',
            'state' => 'State',
        ];
    }
}
