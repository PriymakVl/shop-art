<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\figures\FigureImage */

$this->title = 'Update Figure Image: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Figure Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="figure-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
