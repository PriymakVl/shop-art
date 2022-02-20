<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\categories\Category;

/* @var $this yii\web\View */
/* @var $model app\models\figures\Figure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $cats = Category::findAll(['status' => Category::STATUS_ACTIVE]);
        $options = ArrayHelper::map($cats, 'id', 'name');
        $params = ['prompt' => 'Невыбрана']; 
        echo $form->field($model, 'cat_id')->dropDownList($options, $params);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
