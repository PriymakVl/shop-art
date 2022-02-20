<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\prices\Price;
use app\models\dimensions\Dimensions;
use app\models\materials\Frame;
use app\models\materials\Canvas;

$this->registerJsFile('js/admin/form_price.js',  ['depends' => [\yii\web\JqueryAsset::className()]]);

/* @var $this yii\web\View */
/* @var $model app\models\prices\Price */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-form">
   

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'currency')->dropDownList(Price::CURRENCIES) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'state')->dropDownList($model->getArrayState()); ?>
        </div>
    </div>

    <?= $form->field($model, 'figure_id')->hiddenInput()->label(false); ?>

    <div class="row">
        <div class="col">
            <?php
                $dimensions = Dimensions::findAll(['status' => Dimensions::STATUS_ACTIVE]);
                $items = ArrayHelper::map($dimensions, 'values', 'values');
                $params = ['prompt' => 'Выберите размер'];
                echo $form->field($model, 'dimensions')->dropDownList($items, $params)->label("Габаритные размеры");
            ?>
        </div>
        <div class="col">
            <?php
                $frames = Frame::findAll(['status' => Frame::STATUS_ACTIVE]);
                $items = ArrayHelper::map($frames, 'type', 'type');
                $params = ['prompt' => 'Выберите рамку'];
                echo $form->field($model, 'frame')->dropDownList($items, $params)->label("Рамка");
            ?>
        </div>
        <div class="col">
            <?php
                $canvases = Canvas::findAll(['status' => Canvas::STATUS_ACTIVE]);
                $items = ArrayHelper::map($canvases, 'name', 'name');
                $params = ['prompt' => 'Выберите холст'];
                echo $form->field($model, 'canvas')->dropDownList($items, $params)->label("Холст");
            ?>
        </div>
    </div>
    
    <?= $form->field($model, 'options')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
