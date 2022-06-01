<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
$this->title = 'Админка сайта'
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
    NavBar::begin([
        'brandLabel' => 'Админка',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            [
                'label' => 'Картины',
                'items' => [
                    ['label' => 'Картины', 'url' => ['/admin/figure-admin/index']],
                    ['label' => 'Холсты', 'url' => ['/admin/canvas-admin/index']],
                    ['label' => 'Рамки', 'url' => ['/admin/frame-admin/index']],
                    ['label' => 'Размеры', 'url' => ['/admin/dimensions-admin/index']],
                    ['label' => 'Цены', 'url' => ['/admin/price-admin/index']],
                ]
            ],
            ['label' => 'Категории', 'url' => ['/admin/category-admin/index']],
            ['label' => 'Заказы', 'url' => ['/admin/order-admin/index']],
            ['label' => 'Подписчики', 'url' => ['/admin/subscriber-admin/index']],
            [
                'label' => 'Страницы',
                'items' => [
                    ['label' => 'Автор', 'url' => ['/admin/author-admin/view']],
                    ['label' => 'Доставка', 'url' => ['/admin/delivery-admin/view']],
                ]
            ]
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0 mt-5">
    <div class="container">
        <?= Breadcrumbs::widget([
           'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
