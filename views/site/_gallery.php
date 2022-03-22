<?php

use yii\widgets\LinkPager;

// split into two arrays for display in columns 
if ($figures) {
    list($first_col, $second_col) = array_chunk($figures, ceil(count($figures) / 2));
}
?>

<div class="col-lg-9">
    <div class="row">
        <!-- gallery first column -->
        <div class="col-lg-6">
            <? if ($first_col): ?>
                <? foreach ($first_col as $figure): ?>
                    <? if ($figure->paintings): ?>
                        <div>
                            <img style="width:100%;"
                                src="/<?= $figure->paintings[0]->url ?>" 
                                alt="<?= $figure->paintings[0]->alt ?>"
                                title="<?= $figure->paintings[0]->title ?>"
                            >
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            <? endif; ?>
        </div>
        <!-- gallery second column -->
        <div class="col-lg-6">
            <? if ($second_col): ?>
                <? foreach ($second_col as $figure): ?>
                    <? if ($figure->paintings): ?>
                        <div>
                            <img style="width:100%;"
                                src="/<?= $figure->paintings[0]->url ?>" 
                                alt="<?= $figure->paintings[0]->alt ?>"
                                title="<?= $figure->paintings[0]->title ?>"
                            >
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>
    <!-- pagination -->
    <div class="row mt-4 justify-content-center">
            <?php echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</div>