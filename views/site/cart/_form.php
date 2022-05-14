<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerJsFile('js/public/show_price_selected_figure.js',  ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<? $form = ActiveForm::begin(['action' => '/cart/add', 'id' => 'cart-form']); ?>

<!-- Dimensions -->
<?php
    $params = ['prompt' => 'select size'];
    foreach ($figure->prices as $price) {
        $params['options'][$price->id] = ['data-price' =>$price->value];
    }
    echo $form->field($cart, 'priceId')->dropDownList($figure->createArrayPrices(), $params)->label('Dimensions');
?>

<?php
    $items = array_combine(range(1, 10), range(1, 10));
    $params = ['prompt' => 'select quantity'];
    echo $form->field($cart, 'quantity')->dropDownList($items, $params)->label('Quantity');
?>

<?= $form->field($cart, 'figureId')->hiddenInput()->label(false) ?>


<?=Html::submitButton('add to cart', ['class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'cart'])?>

<? ActiveForm::end(); ?>
