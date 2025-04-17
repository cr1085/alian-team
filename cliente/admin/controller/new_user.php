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
		header('Location: ./error.php');
	} 

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$user_name = cleardata($_POST['user_name']);
			$user_email = cleardata($_POST['user_email']);
			$user_verified = cleardata($_POST['user_verified']);
			$user_password = cleardata($_POST['user_password']);
			$encryptPass = hash('sha512', $user_password);
			$user_role = cleardata($_POST['user_role']);

			$statment = $connect->prepare("INSERT INTO users (user_id, user_name, user_email, user_verified, user_password, user_role, user_created) VALUES (null, :user_name, :user_email, :user_verified, :user_password, :user_role, CURRENT_TIMESTAMP)");

			$statment->execute(array(
				':user_name' => $user_name,
				':user_email' => $user_email,
				':user_verified' => $user_verified,
				':user_password' => $encryptPass,
				':user_role' => $user_role
			));

			header('Location: ./users.php');
		}

		$roles = get_all_roles($connect);
	require '../views/header.view.php';
		require '../views/new.user.view.php';

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