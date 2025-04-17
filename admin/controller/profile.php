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

$user = get_user_information($connect);
$user = $user['0'];
$id_user = $user['user_id'];

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$user_id = cleardata($_POST['user_id']);
		$user_name = cleardata($_POST['user_name']);
		$user_email = cleardata($_POST['user_email']);
		$user_description = cleardata($_POST['user_description']);

		$encryptPass = hash('sha512', $password);

		$password_save = $_POST['user_password_save'];
		$password = $_POST['user_password'];

		if (empty($password)) {
			$password = $password_save;
		} else{
			
			$password = hash('sha512', $password);
		}

		$statment = $connect->prepare(
			"UPDATE users SET user_id = :user_id, user_name = :user_name, user_email = :user_email, user_description = :user_description, user_password = :user_password WHERE user_id = :user_id"
		);

		$statment->execute(array(

			':user_id' => $user_id,
			':user_name' => $user_name,
			':user_email' => $user_email,
			':user_description' => $user_description,
			':user_password' => $password,

		));

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}else{

		$usr = get_user_per_id($connect, $id_user);

		$roles = get_all_roles($connect);

		if (!$usr){
			header('Location: ./home.php');
		}

		$userDetails = $usr['0'];

		require '../views/profile.view.php';

	}

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>