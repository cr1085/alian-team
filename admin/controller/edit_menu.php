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

	$id_menu = id_menu($_GET['id']);

}else{
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$menu_id = cleardata($_POST['menu_id']);
$menu_name = cleardata($_POST['menu_name']);
$menu_header = cleardata($_POST['menu_header']);
$menu_footer = isset($_POST['menu_footer']) ? cleardata($_POST['menu_footer']) : '0';
$menu_sidebar = isset($_POST['menu_sidebar']) ? cleardata($_POST['menu_sidebar']) : '0';
$menu_status = cleardata($_POST['menu_status']);

$statment = $connect->prepare(
	"UPDATE menus SET menu_id = :menu_id, menu_name = :menu_name, menu_header = :menu_header, menu_footer = :menu_footer, menu_sidebar = :menu_sidebar, menu_status = :menu_status WHERE menu_id = :menu_id"
	);

$statment->execute(array(

		':menu_id' => $menu_id,
		':menu_name' => $menu_name,
		':menu_header' => $menu_header,
		':menu_footer' => $menu_footer,
		':menu_sidebar' => $menu_sidebar,
		':menu_status' => $menu_status

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_menu = id_menu($_GET['id']);

$menu = get_menu_per_id($connect, $id_menu);

$menu = $menu['0'];

$navigations = get_navigations_by_menu($connect, $id_menu);
$pages = get_all_pages($connect);

require '../views/header.view.php';
require '../views/edit.menu.view.php';

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