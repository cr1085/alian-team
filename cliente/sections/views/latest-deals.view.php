<div class="uk-section uk-section-gray uk-margin-large-top uk-preserve-color">

    <div class="uk-container uk-margin-medium-bottom" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

    <div class="tas_heading uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
        <div class="uk-width-expand">
            <h3 class="uk-heading-line uk-text-left"><span><?php echo echoOutput($translation['tr_13']); ?></span></h3>
        </div>
        <div class="uk-width-auto">
            <a href="<?php echo $urlPath->search(); ?>" class="uk-button uk-button-default uk-border-pill btn">
                <?php echo echoOutput($translation['tr_21']); ?>
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
    </div>

<div class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-2@l uk-grid-medium" uk-grid>

<?php foreach($latestDeals as $item): ?>

    <a href="<?php echo $urlPath->deal($item['deal_id'], $item['deal_slug']); ?>">


<div class="tas_card_4 uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>

    <div class="uk-card-media-left uk-cover-container">
        <img src="<?php echo !empty($item['deal_gif']) ? echoOutput($item['deal_gif']) : $urlPath->image($item['deal_image']); ?>" alt="<?php echo echoOutput($item['deal_title']); ?>" uk-cover>
        <canvas width="600" height="350"></canvas>

        <?php if(timeLeft(echoOutput($item['deal_expire']))): ?>
        <div class="uk-overlay timeleft uk-overlay-default uk-position-bottom">
            <p><i class="ti ti-clock"></i> <span><?php echo timeLeft(echoOutput($item['deal_expire'])); ?></span></p>
        </div>
        <?php endif; ?>
    </div>

    <div>

        <div class="uk-card-body">

                <?php if(isNew($item['deal_start'])): ?>
                <div class="new"><?php echo echoOutput($translation['tr_20']); ?></div>
                <?php endif; ?>

                <?php if(isExclusive(echoOutput($item['deal_exclusive']))): ?>
                    <div class="exclusive"><?php echo echoOutput($translation['tr_16']); ?></div>
                <?php endif; ?>

                <h3 class="uk-card-title uk-text-truncate"><?php echo echoOutput($item['deal_title']); ?></h3>
                <p class="uk-card-subtitle uk-text-truncate"><?php echo echoOutput($item['deal_tagline']); ?></p>
                
                <?php if($item['deal_price'] != 0): ?>
                <ul class="uk-subnav" uk-margin>
                    <?php if(!empty(echoOutput($item['deal_oldprice']))): ?>
                    <li><span style="font-size:20px;"><?php echo getPrice($item['deal_oldprice']); ?></span></li>
                    <?php endif; ?>
                   
                </ul>
                <?php endif; ?>
        </div>

    </div>

</div>

</a>

<?php endforeach; ?>

        </div>
    </div>
</div>