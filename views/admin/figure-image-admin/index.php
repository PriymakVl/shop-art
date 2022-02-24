<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\figures\FigureImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изображения картины №'. $figure_id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить изображение', ['create', 'figure_id' => $figure_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Картина', ['admin/figure-admin/view', 'id' => $figure_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'url:url',
            'alt',
            'title',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FigureImage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
