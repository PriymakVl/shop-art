<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\contacts\Contact;

/* @var $this yii\web\View */
/* @var $model app\models\contacts\Contact */

$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="contact-view">

    <h3>Тема: <b><i><?= $model->subject ?></i></b></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email',
            'name',
            'subject',
            'body',
            ['attribute' => 'date', 'format' => ['date', 'php:d.m.Y'],],
            ['attribute' => 'state', 
               'filter' => [Contact::STATE_HANDLED => 'Обработан', Contact::STATE_NOT_HANDLED => 'Не обработан'],
                'filterInputOptions' => ['prompt' => 'Не выбрано'],
                'value' => function($model) { 
                    return ($model->state == Contact::STATE_HANDLED) ? 'Обработан' : 'Не обработан'; 
                }
            ],
        ],
    ]) ?>

</div>
