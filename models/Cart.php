<?php

namespace app\models;

use Yii;
use app\models\prices\Price;

class Cart extends \app\models\AppModel
{
    public $priceId;
    public $quantity;
    public $figureId;
    public $items;
    public $totalPrice = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priceId', 'quantity', 'figureId'], 'required'],
            [['priceId', 'quantity', 'figureId'], 'integer'],

        ];
    }

    public function add($figure)
    {
        $price_id = $figure['priceId'];
        $qty = $figure['quantity'];
        if (isset($_SESSION['cart'][$price_id])) $_SESSION['cart'][$price_id] += $qty;
        else $_SESSION['cart'][$price_id] = $qty;
        //sum total quantity
        $_SESSION['cart']['qty'] = isset($_SESSION['cart']['qty']) ? $_SESSION['cart']['qty'] + $qty : $qty;
    }

    public function sumQty()
    {
        $sum = 0;
        foreach ($_SESSION['cart'] as $key => $qty) {
            if ($key == 'qty') continue;
            $sum += $qty;
        }
        if ($sum == 0) unset($_SESSION['cart']['qty']);
        else $_SESSION['cart']['qty'] = $sum;
    }

    public function getLabel()
    {
        if (empty($_SESSION['cart'])) return 'Корзина';
        return 'Корзина(' . $_SESSION['cart']['qty'] . ')';
    }

    public function getItems()
    {
        $items = Yii::$app->session->get('cart');
        if ($items) {
            foreach ($items as $id => $qty) {
                if ($id == 'qty') continue;
                $this->items[] = ['price' => Price::findOne($id), 'qty' => $qty];
            }
        }
        return $this;
    }

    public function sumOfPrices()
    {
        if (empty($_SESSION['cart'])) return;
        foreach ($_SESSION['cart'] as $price_id => $qty) {
            if ($key == 'qty') continue;
            $price = Price::findOne($price_id);
            $price_figure = $price->value * $qty;
            $this->totalPrice += $price_figure;
            
        }
    }

    

}
