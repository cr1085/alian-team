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
if(!$connect){
	header ('Location: ./error.php');
}

if (isset($_GET['id']) && !empty($_GET["id"]) ) {
	$id_page = id_page($_GET['id']);

}else{
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$page_id = cleardata($_POST['page_id']);
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

	$page_slug = cleardata($_POST['page_slug']);

	if (empty($page_slug)) {
		$slug = $_POST['page_slug_save'];
	}else{

		$converted_slug = convertSlug($_POST['page_slug']);
		$exists = get_page_slug($connect, $converted_slug);

		if ($exists > 0){
			$new_number = $exists + 1;
			$slug = $converted_slug."-".$new_number;
		}else{

			$slug = $converted_slug;
		}
	}

$statment = $connect->prepare(
	"UPDATE pages SET page_id = :page_id, page_title = :page_title, page_template = :page_template, page_seotitle = :page_seotitle, page_content = :page_content, page_seodescription = :page_seodescription, page_status = :page_status, page_slug = :page_slug, page_private = :page_private, page_footer = :page_footer, page_ad_header = :page_ad_header, page_ad_footer = :page_ad_footer, page_ad_sidebar = :page_ad_sidebar WHERE page_id = :page_id"
	);

$statment->execute(array(

		':page_id' => $page_id,
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

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_page = id_page($_GET['id']);

$page = get_page_per_id($connect, $id_page);

    if (!$page){
    header('Location: ./home.php');
}

$page = $page['0'];

require '../views/header.view.php';
require '../views/edit.page.view.php';

}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>