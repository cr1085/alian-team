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

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$users_total = users_total($connect); 
$deals_total = deals_total($connect);
$deals = get_latest_deals($connect);

require '../views/home.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>