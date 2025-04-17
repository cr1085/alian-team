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

$navigation_id = cleardata($_GET['id']);

if(!$navigation_id){
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

$navigation_id = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM navigations WHERE navigation_id = :navigation_id");
$statement->execute(array('navigation_id' => $navigation_id));

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