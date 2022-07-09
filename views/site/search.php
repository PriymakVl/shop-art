<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;

$this->title = 'Search Results';

?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h1>SEARCH RESULTS</h1>
                <p><?= count($figures) ?> matches for <b><?= $search ?></b></p>
            </div>
        </div>
        <!-- gallery -->
        <div class="row">
            <? if ($figures): ?>
                <? foreach ($figures as $figure): ?>
                    <div class="col-lg-4">
                        <a href="/figure?id=<?= $figure->id ?>">
                            <img style="width:100%;"
                                src="/<?= $figure->paintings[0]->url ?>" 
                                alt="<?= $figure->paintings[0]->alt ?>"
                                title="<?= $figure->paintings[0]->title ?>"
                            >
                        </a>
                    </div>
                <? endforeach; ?>
            <? else: ?>
                <div class="col-lg-12">
                    no search results
                </div>
            <? endif; ?>
        </div>
    </div>
</div>
