<div class="uk-height-1-1 ev-section-padding-v-s uk-panel uk-flex uk-flex-wrap uk-flex-middle uk-flex-center">

<div class="uk-container-small ev-section-padding-h-m">

	<div uk-grid>

	<div class="uk-width-1-1 uk-text-center">
		<h1 class="uk-margin-small uk-text-bold"><?php echo $translation['tr_eptitle'] ?></h1>
		<h2 class="uk-margin-small uk-text-bold"><?php echo $translation['tr_epsubtitle'] ?></h2>
		<h4 class="uk-margin-small uk-text-light"><?php echo $translation['tr_eptagline'] ?></h4>

		<hr class="uk-divider-small">

		<?php foreach($socialMedia as $item): ?>
		<?php if (!empty($item['st_facebook'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_facebook'] ?>" uk-icon="icon: facebook;"></a>
		<?php endif;?>
		<?php if (!empty($item['st_twitter'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_twitter'] ?>" uk-icon="icon: twitter"></a>
		<?php endif;?>
		<?php if (!empty($item['st_youtube'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_youtube'] ?>" uk-icon="icon: youtube"></a>
		<?php endif;?>
		<?php if (!empty($item['st_linkedin'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_linkedin'] ?>" uk-icon="icon: linkedin"></a>
		<?php endif;?>
		<?php if (!empty($item['st_instagram'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_instagram'] ?>" uk-icon="icon: instagram"></a>
		<?php endif;?>
		<?php if (!empty($item['st_whatsapp'])): ?>
		<a class="uk-icon-button" href="<?php echo $item['st_whatsapp'] ?>" uk-icon="icon: whatsapp"></a>
		<?php endif;?>
		<?php endforeach; ?>
		</ul>

		<hr class="uk-divider-small">
			<a class="uk-button uk-button-primary uk-button-large uk-border-pill" href="<?php echo $urlPath->home(); ?>">
				<?php echo $translation['tr_epbutton'] ?>
			</a>

	</div>
		
	</div>

</div>

</div>