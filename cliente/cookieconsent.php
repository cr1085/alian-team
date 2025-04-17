<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#efefef",
      "text": "#404040"
    },
    "button": {
      "background": "#8ec760",
      "text": "#ffffff"
    }
  },
  "theme": "classic",
  "content": {
    "message": "<?php echo echoOutput($translation['tr_115']); ?>",
    "dismiss": "<?php echo echoOutput($translation['tr_117']); ?>",
    "link": "<?php echo echoOutput($translation['tr_114']); ?>",
    "href": '<?php echo $urlPath->terms(); ?>'
  }
});
</script>