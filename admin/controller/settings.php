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

	if ($check_access['user_role'] == 1){

		$settings = get_settings($connect);

		$searchpages = get_pages_by_template($connect, 'search');
		$privacypages = get_pages_by_template($connect, 'privacy');
		$termspages = get_pages_by_template($connect, 'terms');
		$categoriespages = get_pages_by_template($connect, 'categories');
		$locationspages = get_pages_by_template($connect, 'locations');
		$storespages = get_pages_by_template($connect, 'stores');

		require '../views/settings.view.php'; 

	}elseif($check_access['user_role'] == 2){

		require '../views/denied.view.php';
		
	}else{
		
		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';
	
}else {
	header('Location: ./login.php');		
}


?>