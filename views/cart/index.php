<h1>Shopping Cart</h1>
<? if ($cart->items): ?>
  <div class="row">
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Description</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <? 
            $num = 1;
            foreach ($cart->items as $item):
              $price = $item['price'];
          ?>
              <tr>
                  <th scope="row"><?= $num ?></th>
                  <td class="text-center">
                    <img width="75" src="/<?= $price->figure->paintings[0]->url ?>">
                  </td>
                  <td>
                    <?= $price->figure->description ?>
                    <div style="color:red;"><?= $price->options ?></div>
                  </td>
                  <td><?= $item['qty'] ?></td>
                  <td><?= ($price->value * $item['qty']) . ' ' . $price->getStringCurrency() ?></td>
                  <td>
                    <a href="/cart/delete?price_id=<?= $price->id ?>">Delete</a>
                  </td>
              </tr>
          <? 
            $num++;
            endforeach; 
          ?>
      </tbody>
    </table>
  </div>
  <form action="">
    <div class="row">
  
      <div class="col-8">
          <p>Special instructions for seller</p>
          <textarea name="" id="" cols="30" rows="5"></textarea>
      </div>
      <div class="col-4">
          <div class="cart-total-price mb-3">
            <span>Total amount</span>
            <span>USD <?= $cart->totalPrice ?>.00</span>
          </div>
          <input type="submit" class="btn btn-success" value="Check out">
      </div>
    </div>
  </form>
<? else: ?>
  <p>Cart empty</p>
<? endif; ?>