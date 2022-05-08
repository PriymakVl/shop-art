<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\Cart;

$cart = new Cart();

AppAsset::register($this);
$this->title = 'Shop Figure';

$items_cart = count($_SESSION['cart']);
// debug($_SESSION['cart']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin();

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Магазин', 'url' => ['/shop']],
            ['label' => 'Информация', 'url' => ['/site/about']],
            ['label' => $cart->getLabel(), 'url' => ['/cart']],
            ['label' => 'Админка', 'url' => ['/admin/category-admin/index']],
        ],
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?= $this->render('//templates/footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
