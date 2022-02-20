<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\dimensions\Dimensions */

$this->title = 'Create Dimensions';
$this->params['breadcrumbs'][] = ['label' => 'Dimensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dimensions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
