<div class="col-lg-3">
    <h2>Categories</h2>
    <ul>
        <li><a href="/">All categories</a></li>
        <? foreach ($categories as $category): ?>
            <li>
                <a href="/shop?cat_id=<?=$category->id?>"><?= $category->name ?></a>
            </li>
        <? endforeach; ?>
    </ul>
</div>