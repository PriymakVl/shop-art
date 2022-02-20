<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\prices\Price;

/* @var $this yii\web\View */
/* @var $searchModel app\models\prices\PriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Цены для картины № ' . $figure_id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить цену', ['create', 'figure_id' => $figure_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Картина', ['admin/figure-admin/view', 'id' => $figure_id ], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'value', "filter" => false ],

            ['attribute' => 'currency', 'value' => function($model) { return $model->stringCurrency; }, "filter" => false ],

            ['attribute' => 'options', "filter" => false ],

            ['attribute' => 'state', 'value' => function($model) { return $model->stringState; }, "filter" => false, 'format' => 'raw'],
 
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Price $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                    }
            ],
        ],
    ]); ?>


</div>
