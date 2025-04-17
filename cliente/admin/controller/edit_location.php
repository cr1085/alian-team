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

	if (isset($_GET['id']) && !empty($_GET["id"]) ) {
		$id_location = id_location($_GET['id']);

	}else{
		header('Location: ./home.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$location_id = cleardata($_POST['location_id']);
			$location_title = cleardata($_POST['location_title']);
			$location_seotitle = cleardata($_POST['location_seotitle']);
			$location_description = cleardata($_POST['location_description']);
			$location_seodescription = cleardata($_POST['location_seodescription']);
			$location_featured = cleardata($_POST['location_featured']);
			$location_status = cleardata($_POST['location_status']);

			$location_slug = cleardata($_POST['location_slug']);

			if (empty($location_slug)) {
				$slug = $_POST['location_slug_save'];
			}else{

				$converted_slug = convertSlug($_POST['location_slug']);
				$exists = get_location_slug($connect, $converted_slug);

				if ($exists > 0)
				{
					$new_number = $exists + 1;
					$slug = $converted_slug."-".$new_number;

				}else{

					$slug = $converted_slug;
				}
			}


			$statment = $connect->prepare("UPDATE locations SET location_id = :location_id, location_title = :location_title, location_slug = :location_slug, location_description = :location_description, location_seotitle = :location_seotitle, location_seodescription = :location_seodescription, location_featured = :location_featured, location_status = :location_status WHERE location_id = :location_id");

			$statment->execute(array(
				':location_id' => $location_id,
				':location_title' => $location_title,
				':location_slug' => $slug,
				':location_description' => $location_description,
				':location_seotitle' => $location_seotitle,
				':location_seodescription' => $location_seodescription,
				':location_featured' => $location_featured,
				':location_status' => $location_status
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_location = id_location($_GET['id']);

			$location = get_location_per_id($connect, $id_location);

			if (!$location){
				header('Location: ./home.php');
			}

			$location = $location['0'];
			require '../views/header.view.php';
			require '../views/edit.location.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>