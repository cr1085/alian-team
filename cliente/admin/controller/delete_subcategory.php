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

$id_subcategory = cleardata($_GET['id']);

if(!$id_subcategory){
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){


$id_subcategory = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM subcategories WHERE subcategory_id = :subcategory_id");
$statement->execute(array('subcategory_id' => $id_subcategory));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}


?>