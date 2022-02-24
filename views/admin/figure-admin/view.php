<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\figures\Figure */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Figures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="figure-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот изделие?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Цены', ['admin/price-admin/index', 'figure_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изображения', ['admin/figure-image-admin/index', 'figure_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'listCategories', 
                'value' => function($model) { return $model->listCategories; },
                'format' => 'raw',
            ],
            'preview:ntext',
            'description:ntext',
            'status',
        ],
    ]) ?>

</div>
