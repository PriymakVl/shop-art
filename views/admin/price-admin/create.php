<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\prices\Price */

$this->title = 'Форма для добавление цены картина №' . $figure_id;

$this->params['breadcrumbs'][] = ['label' => 'Картина', 'url' => ['admin/figure-admin/view', 'id' => $figure_id]];
$this->params['breadcrumbs'][] = ['label' => 'Цены картины', 'url' => ['index']];

?>
<div class="price-create">

    <h1 class="text-center mb-3 h3"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'figure_id' => $figure_id
    ]) ?>

</div>
