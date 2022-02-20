<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\materials\Canvas */

$this->title = 'Добавить материал холста';
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canvas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
