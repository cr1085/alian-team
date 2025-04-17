<div class="uk-container uk-margin-large-top uk-margin-large-bottom" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<div class="tas_heading uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
        <div class="uk-width-expand">
            <h3 class="uk-heading-line uk-text-left"><span><?php echo echoOutput($translation['tr_6']); ?></span></h3>
        </div>
        <div class="uk-width-auto">
            <a href="<?php echo $urlPath->search(); ?>" class="uk-button uk-button-default uk-border-pill btn">
                <?php echo echoOutput($translation['tr_21']); ?>
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
    </div>

        <div class="uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>

<?php foreach($featuredDeals as $item): ?>

    <a href="<?php echo $urlPath->deal($item['deal_id'], $item['deal_slug']); ?>">

                <div class="tas_card_2 uk-cover-container uk-height-medium">
                    <img src="<?php echo !empty($item['deal_gif']) ? echoOutput($item['deal_gif']) : $urlPath->image($item['deal_image']); ?>" alt="<?php echo echoOutput($item['deal_title']); ?>" uk-cover>

                    <?php if(timeLeft(echoOutput($item['deal_expire']))): ?>
                        <div class="tas_time">
                        <i class="ti ti-clock"></i> <span><?php echo timeLeft(echoOutput($item['deal_expire'])); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="uk-overlay uk-position-bottom">

                        <div class="brand"><?php echo echoOutput($item['category_title']); ?></div>
                        <p class="card-title uk-text-truncate"><?php echo echoOutput($item['deal_title']); ?></p>
                        <?php if($item['deal_price'] != 0): ?>
                        <ul class="uk-subnav" uk-margin>
                            <?php if(!empty(echoOutput($item['deal_oldprice']))): ?>
                            <li><span class="oldprice"><?php echo getPrice($item['deal_oldprice']); ?></span></li>
                            <?php endif; ?>
                            <li><span class="price"><?php echo getPrice($item['deal_price']); ?></span></li>
                            <?php if(!empty(echoOutput($item['deal_oldprice']))): ?>
                            <li><span class="discount"><?php echo getPercent($item['deal_price'], $item['deal_oldprice']); ?></span></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </a>

<?php endforeach; ?>

</div>
</div>