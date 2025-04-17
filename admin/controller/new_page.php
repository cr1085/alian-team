<?php 

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

session_start();
if (isset($_SESSION['user_email'])){

require '../../config.php';
require '../functions.php';

$connect = connect($database);


$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$page_title = cleardata($_POST['page_title']);
			$page_template = cleardata($_POST['page_template']);
			$page_seotitle = cleardata($_POST['page_seotitle']);
			$page_content = $_POST['page_content'];
			$page_seodescription = cleardata($_POST['page_seodescription']);
			$page_status = cleardata($_POST['page_status']);
			$page_private = cleardata($_POST['page_private']);
			$page_footer = cleardata($_POST['page_footer']);
			$page_ad_header = cleardata($_POST['page_ad_header']);
			$page_ad_footer = cleardata($_POST['page_ad_footer']);
			$page_ad_sidebar = cleardata($_POST['page_ad_sidebar']);
			$converted_slug = convertSlug(cleardata($_POST['page_title']));
			$exists = get_page_slug($connect, $converted_slug);

			if ($exists > 0){
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;
			}else{
				$slug = $converted_slug;
			}

			$statment = $connect->prepare("INSERT INTO pages (page_id, page_title, page_seotitle, page_content, page_seodescription, page_status, page_slug, page_template, page_private, page_footer, page_ad_header, page_ad_footer, page_ad_sidebar) VALUES (null, :page_title, :page_seotitle, :page_content, :page_seodescription, :page_status, :page_slug, :page_template, :page_private, :page_footer, :page_ad_header, :page_ad_footer, :page_ad_sidebar)");

			$statment->execute(array(
				':page_title' => $page_title,
				':page_seotitle' => $page_seotitle,
				':page_content' => $page_content,
				':page_seodescription' => $page_seodescription,
				':page_status' => $page_status,
				':page_slug' => $slug,
				':page_template' => $page_template,
				':page_private' => $page_private,
				':page_footer' => $page_footer,
				':page_ad_header' => $page_ad_header,
				':page_ad_footer' => $page_ad_footer,
				':page_ad_sidebar' => $page_ad_sidebar
			));

			header('Location: ./pages.php');
}
require '../views/header.view.php';
require '../views/new.page.view.php';

}elseif ($check_access['user_role'] == 2) {

	require '../views/denied.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {
header('Location: ./login.php');		
}


?>