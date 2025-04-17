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

if (isset($_GET['id']) && !empty($_GET["id"]) ) {
	$id_ad = id_ad($_GET['id']);

}else{
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$ad_id = cleardata($_POST['ad_id']);
$ad_title = cleardata($_POST['ad_title']);
$ad_html = $_POST['ad_html'];
$ad_position = cleardata($_POST['ad_position']);
$ad_status = cleardata($_POST['ad_status']);

$statment = $connect->prepare("UPDATE ads SET ad_id = :ad_id, ad_title = :ad_title, ad_html = :ad_html, ad_position = :ad_position, ad_status = :ad_status WHERE ad_id = :ad_id");

$statment->execute(array(

		':ad_id' => $ad_id,
		':ad_title' => $ad_title,
		':ad_html' => $ad_html,
		':ad_position' => $ad_position,
		':ad_status' => $ad_status

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_ad = id_ad($_GET['id']);

$ad = get_ad_per_id($connect, $id_ad);

    if (!$ad){
    header('Location: ./home.php');
}

$ad = $ad['0'];
require '../views/header.view.php';
require '../views/edit.ad.view.php';

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