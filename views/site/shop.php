<?php
/* @var $this yii\web\View */

$this->title = 'Shop Art';
?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <!-- sidebar -->
            <?= $this->render('_sidebar', ['categories' => $categories]) ?>

            <!-- gallery -->
            <?= $this->render('_gallery', compact('figures', 'pages')) ?>
        </div>

    </div>
</div>
