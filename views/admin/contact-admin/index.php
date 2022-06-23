<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\contacts\Contact;

/* @var $this yii\web\View */
/* @var $searchModel app\models\contact\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Письма';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'subject',
            'email:email',
            ['attribute' => 'date', 'format' => ['date', 'php:d.m.y'], 'filter' => false],
            ['attribute' => 'state', 
               'filter' => [Contact::STATE_HANDLED => 'Обработан', Contact::STATE_NOT_HANDLED => 'Не обработан'],
                'filterInputOptions' => ['prompt' => 'Не выбрано'],
                'value' => function($model) { 
                    return ($model->state == Contact::STATE_HANDLED) ? 'Обработан' : 'Не обработан'; 
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
