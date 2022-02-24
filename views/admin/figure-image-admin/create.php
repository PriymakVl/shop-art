<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\figures\FigureImage */

$this->title = 'Форма для добавления изображения к картине №'. $figure_id;
$this->params['breadcrumbs'][] = ['label' => 'Figure Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-image-create">

    <h3 class="mb-3"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model, 
        'figure_id' => $figure_id,
    ]) ?>

</div>
