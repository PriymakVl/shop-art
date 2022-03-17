<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\figures\FigureImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="form-group">
        <?= $form->field($model, 'figure_id')->hiddenInput()->label(false) ?>
         
        <? if (!$model->id): ?>
            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control-file'])->label('Выберите изображение'); ?>
        <? endif; ?>
        
        <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
