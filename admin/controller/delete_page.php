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

	$id_page = cleardata($_GET['id']);

	if(!$id_page){
		header('Location: ./home.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1){

		$id_page = cleardata($_GET['id']);

		$isDefault = is_default_page($connect, $id_page);

		if (!$isDefault) {

			$statement = $connect->prepare("DELETE FROM pages WHERE page_id = :page_id");
			$statement->execute(array('page_id' => $id_page));

			$statement = $connect->prepare("DELETE FROM navigations WHERE navigation_page = :navigation_page");
			$statement->execute(array('navigation_page' => $id_page));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			if(isset($_SERVER['HTTP_REFERER'])) {
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				header('Location: ./pages.php');		
			}
		}

	}elseif($check_access['user_role'] == 2){

		require '../views/denied.view.php';
		
	}else{
		header('Location:'.SITE_URL);
	}

}else{
	header('Location: ./login.php');		
}

?>