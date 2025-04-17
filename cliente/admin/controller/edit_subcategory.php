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
		$id_subcategory = id_subcategory($_GET['id']);

	}else{
		header('Location: ./home.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$subcategory_id = cleardata($_POST['subcategory_id']);
			$subcategory_parent = cleardata($_POST['subcategory_parent']);
			$subcategory_title = cleardata($_POST['subcategory_title']);
			$subcategory_seotitle = cleardata($_POST['subcategory_seotitle']);
			$subcategory_description = cleardata($_POST['subcategory_description']);
			$subcategory_seodescription = cleardata($_POST['subcategory_seodescription']);
			$subcategory_status = cleardata($_POST['subcategory_status']);

			$subcategory_slug = cleardata($_POST['subcategory_slug']);

			if (empty($subcategory_slug)) {
				$slug = $_POST['subcategory_slug_save'];
			}else{

				$converted_slug = convertSlug($_POST['subcategory_slug']);
				$exists = get_subcategory_slug($connect, $converted_slug);

				if ($exists > 0)
				{
					$new_number = $exists + 1;
					$slug = $converted_slug."-".$new_number;

				}else{

					$slug = $converted_slug;
				}
			}

			$statment = $connect->prepare("UPDATE subcategories SET subcategory_id = :subcategory_id, subcategory_parent = :subcategory_parent, subcategory_title = :subcategory_title, subcategory_slug = :subcategory_slug, subcategory_description = :subcategory_description, subcategory_seotitle = :subcategory_seotitle, subcategory_seodescription = :subcategory_seodescription, subcategory_status = :subcategory_status WHERE subcategory_id = :subcategory_id");

			$statment->execute(array(
				':subcategory_id' => $subcategory_id,
				':subcategory_parent' => $subcategory_parent,
				':subcategory_title' => $subcategory_title,
				':subcategory_slug' => $slug,
				':subcategory_description' => $subcategory_description,
				':subcategory_seotitle' => $subcategory_seotitle,
				':subcategory_seodescription' => $subcategory_seodescription,
				':subcategory_status' => $subcategory_status
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_subcategory = id_subcategory($_GET['id']);

			$subcategory = get_subcategory_per_id($connect, $id_subcategory);

			if (!$subcategory){
				header('Location: ./home.php');
			}

			$subcategory = $subcategory['0'];

			$categories = get_all_categories($connect);
			require '../views/header.view.php';
			require '../views/edit.subcategory.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>