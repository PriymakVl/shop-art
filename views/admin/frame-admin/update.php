<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\materials\Frame */

$this->title = 'Update Frame: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frame-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
