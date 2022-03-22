<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\subscribers\Subscriber;

/* @var $this yii\web\View */
/* @var $model app\models\subscribers\Subscriber */

$this->title = 'Подписчик';
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscriber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            ['attribute' => 'date', 'format' => ['date', 'php:d.m.y']],
            ['attribute' => 'state', 'value' => function($model) { 
                return $model->state = Subscriber::STATE_HANDLED ? 'Обработан' : 'Не обработан'; }],
        ],
    ]) ?>

</div>
