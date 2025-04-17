<?php include './sections/page-title.php'; ?>

<div class="uk-container">

<div uk-grid>

<div class="uk-width-1-1 uk-width-expand@m">
    
    <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
        <?php foreach ($arrayLetters as $char): ?>
            <a class="uk-link-text" href="#section-<?php echo echoOutput($char); ?>" uk-scroll><?php echo echoOutput($char); ?></a>
        <?php endforeach; ?>
            <a class="uk-link-text" href="#section-09" uk-scroll>0-9</a>
    </div>

    <div class="uk-margin-medium-top uk-margin-bottom">

        <?php foreach ($arrayLetters as $char): ?>
        <h3 class="uk-heading-line uk-text-bold" id="section-<?php echo echoOutput($char); ?>"><span><?php echo echoOutput($char); ?></span></h3>

        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-child-width-1-6@l uk-grid-small" uk-grid>
            <?php $getLocations = getLocationsByLetter($connect, $char); ?>
            <?php foreach($getLocations as $item): ?>
                
                <div>
                    <a class="uk-text-secondary" href="<?php echo $urlPath->search(['location' => $item['location_slug']]); ?>">
                    <span class="uk-text-middle"><?php echo echoOutput($item['location_title']); ?></span>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <h3 class="uk-heading-line uk-text-bold" id="section-09"><span>0-9</span></h3>
        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-child-width-1-6@l uk-grid-small" uk-grid>
            <?php $getLocations = getLocationsByLetter($connect); ?>
            <?php foreach($getLocations as $item): ?>
                
                <div>
                    <a class="uk-text-secondary" href="<?php echo $urlPath->search(['location' => $item['location_slug']]); ?>">
                    <span class="uk-text-middle"><?php echo echoOutput($item['location_title']); ?></span>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="uk-position-fixed uk-position-bottom-right uk-padding">
    <a href="#" uk-totop uk-scroll></a>
    </div>

    </div>

<?php if (isset($itemDetails['page_ad_sidebar']) && $itemDetails['page_ad_sidebar'] == 1): ?>
<?php if(!empty($sidebarAd)): ?>
<div class="uk-width-1-1 uk-width-1-4@m uk-text-center">
<?php require './sections/views/sidebar-ad.view.php'; ?>
</div>
<?php endif; ?>
<?php endif; ?>


</div>
</div>