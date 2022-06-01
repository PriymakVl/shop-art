<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h4>
        <?= $author->fullName ?>
    </h4>
    <p>
        <?= $author->description ?>
    </p>


</div>
