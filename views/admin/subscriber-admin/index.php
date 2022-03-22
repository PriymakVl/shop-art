<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\subscribers\Subscriber;

/* @var $this yii\web\View */
/* @var $searchModel app\models\subscribers\SubscriberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email:email',
            ['attribute' => 'date', 'format' => ['date', 'php:d.m.y'], 'filter' => false],
            ['attribute' => 'state', 
                'filter' => [Subscriber::STATE_HANDLED => 'Обработан', Subscriber::STATE_NOT_HANDLED => 'Не обработан'],
                'filterInputOptions' => ['prompt' => 'Не выбрано'],
                'value' => function($model) { 
                    return $model->state = Subscriber::STATE_HANDLED ? 'Обработан' : 'Не обработан'; 
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscriber $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
