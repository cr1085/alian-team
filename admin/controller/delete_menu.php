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
require '../views/header.view.php';


$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$id_menu = cleardata($_GET['id']);

if(!$id_menu){
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

$id_menu = cleardata($_GET['id']);

$statement = $connect->prepare('DELETE FROM navigations WHERE navigation_menu = :navigation_menu');
$statement->execute(array('navigation_menu' => $id_menu));

$statement = $connect->prepare('DELETE FROM menus WHERE menu_id = :menu_id');
$statement->execute(array('menu_id' => $id_menu));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	header('Location:'.SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>