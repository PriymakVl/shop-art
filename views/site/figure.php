<div class="row justify-content-center">
    <div class="col-lg-6">
        <img
            style="width: 100%"
            src="/<?= $figure->paintings[0]->url ?>" 
            alt="<?= $figure->paintings[0]->alt ?>"
            title="<?= $figure->paintings[0]->title ?>"
        >
    </div>
</div>
<!-- figure description -->
<div class="row justify-content-center">
    <div class="col-lg-6 text-center h3">
        <?= $figure->description ?>
    </div>
</div>
<!-- figure price -->
<div class="row justify-content-center">
    <div class="col-lg-6 text-center h3">
        <span class="currency">
            <?= $figure->prices[0]->stringCurrency ?>
        </span>
        <span class="price">
            <?= $figure->prices[0]->value . '.00'?>
        </span>
    </div>
</div>
<!-- discount -->
<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <?//= $figure->discount ?>
        discount figure
    </div>
</div>
<!-- form card -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <?= $this->render('cart/_form', ['figure' => $figure, 'cart' => $cart]) ?>
    </div>
</div>
