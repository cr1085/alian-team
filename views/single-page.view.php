<?php include './sections/page-title.php'; ?>

<div class="uk-container">

<div uk-grid>

<div class="uk-width-1-1 uk-width-expand@m">

			<?php if(!empty($itemDetails['page_content'])): ?>
				<?php echo $itemDetails['page_content']; ?>
			<?php endif; ?>

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
