<?php

namespace app\controllers;

use Yii;
use app\controllers\AppController;
use app\models\Cart;

class CartController extends AppController
{

    public function actionAdd() {
        $figure = Yii::$app->request->post('Cart'); 
        $cart = new Cart();
        $cart->add($figure);
        Yii::$app->session->setFlash('success', 'Figure add to cart');
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIndex()
    {
        $cart = new Cart();
        $cart->getItems()->sumOfPrices();
        return $this->render('index', compact('cart'));
    }

    public function actionDelete($price_id)
    {
        unset($_SESSION['cart'][$price_id]);
        (new Cart())->sumQty();
        Yii::$app->session->setFlash('success', 'Figure delete from cart');
        return $this->redirect(Yii::$app->request->referrer);
    }
}
