<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\figures\FigureImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-image-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
        <?= $form->field($model, 'figure_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'url')->fileInput(['class' => 'form-control-file'])->label('Выберите изображение'); ?>

        <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
