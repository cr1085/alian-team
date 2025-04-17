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
		$id_store = id_store($_GET['id']);

	}else{
		header('Location: ./home.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$store_id = cleardata($_POST['store_id']);
			$store_title = cleardata($_POST['store_title']);
			$store_seotitle = cleardata($_POST['store_seotitle']);
			$store_description = cleardata($_POST['store_description']);
			$store_seodescription = cleardata($_POST['store_seodescription']);
			$store_featured = cleardata($_POST['store_featured']);
			$store_status = cleardata($_POST['store_status']);

			$store_slug = cleardata($_POST['store_slug']);

			if (empty($store_slug)) {
				$slug = $_POST['store_slug_save'];
			}else{

				$converted_slug = convertSlug($_POST['store_slug']);
				$exists = get_store_slug($connect, $converted_slug);

				if ($exists > 0)
				{
					$new_number = $exists + 1;
					$slug = $converted_slug."-".$new_number;

				}else{

					$slug = $converted_slug;
				}
			}

			if($_FILES['store_image']['error'] > 0 || empty($_FILES['store_image'])) {
				
				$store_image = $_POST['store_image_save'];

			}else{
				$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
				$extUpload = strtolower( substr( strrchr($_FILES['store_image']['name'], '.') ,1) ) ;
	 
				if (in_array($extUpload, $extsAllowed) ) { 
		
					$image = $_FILES['store_image']['tmp_name'];
					$imagefile = explode(".", $_FILES["store_image"]["name"]);
					$renamefile = round(microtime(true)) . '.' . end($imagefile);
					$image_upload = '../../images/';
					move_uploaded_file($image, $image_upload . 'store_' . $renamefile);
					$store_image = 'store_' . $renamefile;
				}
			}

			$statment = $connect->prepare("UPDATE stores SET store_id = :store_id, store_title = :store_title, store_slug = :store_slug, store_description = :store_description, store_seotitle = :store_seotitle, store_seodescription = :store_seodescription, store_featured = :store_featured, store_status = :store_status, store_image = :store_image WHERE store_id = :store_id");

			$statment->execute(array(
				':store_id' => $store_id,
				':store_title' => $store_title,
				':store_slug' => $slug,
				':store_description' => $store_description,
				':store_seotitle' => $store_seotitle,
				':store_seodescription' => $store_seodescription,
				':store_featured' => $store_featured,
				':store_status' => $store_status,
				':store_image' => $store_image
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_store = id_store($_GET['id']);

			$store = get_store_per_id($connect, $id_store);

			if (!$store){
				header('Location: ./home.php');
			}

			$store = $store['0'];
			require '../views/header.view.php';
			require '../views/edit.store.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>