<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Shop Art';
?>
<div class="site-index">
    <div class="mb-3">
        <!-- <img src="</images/bg.webp" alt="" style="width:100%;"> -->
        <?php echo Html::img('@web/images/bg.webp', ['style' => 'width:100%;']) ?>
    </div>

    <div class="body-content">

        <div class="row">
            <!-- sidebar -->
            <?= $this->render('_sidebar', ['categories' => $categories]) ?>
            
            <!-- gallery -->
            <?= $this->render('_gallery', compact('figures', 'pages')) ?>
        </div>

    </div>
</div>
