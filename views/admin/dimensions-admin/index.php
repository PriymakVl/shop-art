<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\dimensions\Dimensions;

/* @var $this yii\web\View */
/* @var $searchModel app\models\dimensions\DimensionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dimensions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dimensions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dimensions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'values',
            'unit',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dimensions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
