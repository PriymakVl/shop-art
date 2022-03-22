<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\subscribers\Subscriber */

$this->title = 'Форма для обновления состояния подписчика: ';
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscriber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
