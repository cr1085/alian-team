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

$id_category = cleardata($_GET['id']);

if(!$id_category){
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){


$id_category = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM categories WHERE category_id = :category_id");
$statement->execute(array('category_id' => $id_category));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}


?>