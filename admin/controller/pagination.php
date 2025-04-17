<?php 

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

?>

<?php if(isset($number_pages)): ?>

<div class="c-pagination">
  <nav>
  <ul class="pagination justify-content-center">
<?php for($i = 1; $i <= $number_pages; $i++): ?>
<?php if (currentPage() === $i): ?>
<li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
<?php else: ?>
<li class="page-item"><a class="page-link" href="<?php echo goToPage("p", $i); ?>"><?php echo $i; ?></a></li>
<?php endif ?>
<?php endfor; ?>
</ul>
</nav>
</div>

<?php endif; ?>

