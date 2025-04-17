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

$id_deal = cleardata($_GET['id']);

if(!$id_deal){
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$id_deal = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM deals WHERE deal_id = :deal_id");
$statement->execute(array('deal_id' => $id_deal));

header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}else{
	
	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}

?>