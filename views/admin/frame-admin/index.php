<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\materials\Frame;

/* @var $this yii\web\View */
/* @var $searchModel app\models\materials\FrameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Frames';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frame-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Frame', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Frame $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
