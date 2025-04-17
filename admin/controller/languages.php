<?php

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

session_start();

require '../../config.php';
require '../functions.php';
require '../views/header.view.php';

if (isset($_SESSION['user_email'])){

$connect = connect($database);

if(!$connect){

header('Location: ./error.php');

}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$settings = get_settings($connect);
$defaultlanguage = $settings['st_language'];

$languages = get_all_languages($connect);

require '../views/languages.view.php'; 

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';

}else{
	
	header('Location: ./login.php');	

}


?>