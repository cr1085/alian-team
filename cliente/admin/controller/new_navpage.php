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
	header('Location: ./error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$stat = $connect->prepare("SELECT navigation_order FROM navigations ORDER BY navigation_order DESC LIMIT 1");
$stat->execute();
$row = $stat->fetch(PDO::FETCH_ASSOC);
$orderNumber = $row["navigation_order"];

$newOrder = $orderNumber + 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$page_id = $_POST['page_id'];
$lang = $_POST["lang"];
$menu_id = $_POST["menu_id"];

$navigation_target = $_POST['navigation_target'];
$navigation_type = cleardata($_POST['navigation_type']);

	$statment = $connect->prepare("INSERT INTO navigations (navigation_id,navigation_order, navigation_page,navigation_target,navigation_type,navigation_menu) VALUES (null, :navigation_order, :navigation_page, :navigation_target, :navigation_type, :navigation_menu)");

	$statment->execute(array(
		':navigation_order' => $newOrder,
		':navigation_page' => $page_id,
		':navigation_target' => $navigation_target,
		':navigation_type' => $navigation_type,
		':navigation_menu' => $menu_id
		));
}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}
    
}else {
		header('Location: ./login.php');		
		}


?>