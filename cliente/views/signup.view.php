<div class="uk-position-top-right uk-position-z-index uk-padding-small">
<a onclick="goBack()" uk-close></a>
</div>

<div class="uk-height-1-1 tas-section-padding-v-s uk-panel uk-flex uk-flex-wrap uk-flex-middle uk-flex-center" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<div class="tas-auth-1">

<a href="<?php echo $urlPath->home(); ?>">
<img class="tas-logo" src="<?php echo $urlPath->image($theme['th_logo']); ?>">
</a>

<h5 class="uk-heading-line"><span><?php echo echoOutput($translation['tr_151']); ?></span></h5>

<form class="uk-form" action="<?php echo htmlspecialchars($urlPath->signup()); ?>" id="submit-form" method="post">

<div class="uk-margin">
<div class="uk-width-1-1 uk-inline">
<input class="uk-input uk-border-pill" placeholder="<?php echo echoOutput($translation['tr_152']); ?>" name="user_name" type="text" required="">
</div>
</div>
<div class="uk-margin">
<div class="uk-width-1-1 uk-inline">
<input class="uk-input uk-border-pill" placeholder="<?php echo echoOutput($translation['tr_145']); ?>" name="user_email" type="email" required="">
</div>
</div>
<div class="uk-margin">
<div class="uk-width-1-1 uk-inline">
<input class="uk-input uk-border-pill" placeholder="<?php echo echoOutput($translation['tr_146']); ?>" name="user_password" type="password" required="">
</div>
</div>

<div class="uk-margin">
<div class="uk-width-1-1 padding-h uk-inline uk-text-left">
<label>
<input type="hidden" name="ischecked" value="0" />
<input class="uk-checkbox" type="checkbox" name="ischecked" value="1" required=""> <span class="tas-checkbox-label" style="max-width: 300px"><span class="uk-link"><?php echo echoOutput($translation['tr_155']); ?> <a class="uk-link" href="<?php echo $urlPath->terms(); ?>"> <b><?php echo echoOutput($defaultTermsPage['page_title']); ?></b></a></span></span></label>
</div>
</div>

<?php if(!empty($errors)): ?>
<div class="uk-width-1-1 uk-text-left">
<div class="uk-margin">
<div class="tas-notify tas-notify-danger uk-text-small uk-border-rounded uk-margin-remove">
<ul class="uk-margin-remove">
<?php foreach($errors as $key => $value):?>
<li><?php echo echoOutput($value); ?></li>
<?php endforeach; ?>
</ul>
</div>
</div>
</div>
<?php endif; ?>

<button class="g-recaptcha uk-button uk-button uk-width-1-1 uk-border-pill" type="submit" data-sitekey="<?php echo echoOutput($siteKey); ?>" data-callback="onRecaptchaSuccess"><?php echo echoOutput($translation['tr_150']); ?></button>

<div class="uk-margin uk-width-1-1">
<?php echo echoOutput($translation['tr_153']); ?> <a class="tas-link-primary uk-text-bold" href="<?php echo $urlPath->signin(); ?>"><?php echo echoOutput($translation['tr_154']); ?></a>
</div>

</form>

</div>

</div>