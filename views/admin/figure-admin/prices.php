<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\figures\Figure */

$this->title = 'Цены';
$this->params['breadcrumbs'][] = ['label' => 'Figures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить цену', ['admin/price-admin/create', 'figure_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <? if ($model->prices): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Описание</th>
                <th scope="col">Цена</th>
                <th scope="col">Валюта</th>
                <th scope="col">Состояние</th>
            </tr>
            </thead>
            <tbody>

                <? foreach ($model->prices as $price): ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $price->options ?></td>
                    <td><?= $price->value ?></td>
                    <td><?= $price->stringCurrency ?></td>
                    <td><?= $price->stringState ?></td>
                </tr>
                <? endforeach; ?> 

            </tbody>
        </table>
    <? else: ?>
        <p>Цен еще нет</p>
    <? endif; ?>
</div>
