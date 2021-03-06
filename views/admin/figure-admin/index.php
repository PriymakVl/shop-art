<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\figures\Figure;

/* @var $this yii\web\View */
/* @var $searchModel app\models\figures\FigureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Картины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить картину', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'preview:ntext',
            'description:ntext',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Figure $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
