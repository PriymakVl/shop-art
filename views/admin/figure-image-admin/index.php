<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\figures\FigureImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\figures\FigureImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изображения картины №'. $figure_id;

$this->params['breadcrumbs'][] = ['label' => 'Картины', 'url' => ['admin/figure-admin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Картина №'. $figure_id, 'url' => ['admin/figure-admin/view', 'id' => $figure_id]];
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
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'url',
             'label' => 'Изображения картины',
             'value' => function($model) { 
                 return Html::img('@web/'.$model->url, ['width' => '150']);
              },
              'format' => 'raw',
            ],

            'alt',
            'title',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, FigureImage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
