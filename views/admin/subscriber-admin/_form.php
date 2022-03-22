<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\subscribers\Subscriber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscriber-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>

    <?php
        $items = ['0' => 'Не обработан', '1' => 'Обработан'];
        echo $form->field($model, 'state')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
