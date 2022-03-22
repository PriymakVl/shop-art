<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use app\models\subscribers\Subscriber;

    $subscribe = new Subscriber();
?>

<footer class="footer mt-auto py-3 text-muted mb-3">
    <div class="container">
        <!-- update subscription form -->
        <div class="row justify-content-center">
            <? $form = ActiveForm::begin(['action' => '/admin/subscriber-admin/create', 'options' => ['class' => 'form-inline']]); ?>
                <?= $form->field($subscribe, 'email')->label(false) ?>
                <?= Html::submitButton('Subscribe', ['class' => 'btn btn-primary', 'name' => 'subscribe', 'value' => 'yes'])?>
            <? ActiveForm::end(); ?>
        </div>
        <!-- footer content -->
        <div class="row">
            <div class="col-4">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">ETSY</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul>
                    <li>Email: irinjoyart@gmail.com</li>
                    <li>Copywrite</li>
                </ul>
            </div>
        </div>
    </div>
</footer>