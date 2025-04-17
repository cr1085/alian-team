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

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$store_title = cleardata($_POST['store_title']);
			$store_seodescription = cleardata($_POST['store_seotitle']);
			$store_description = cleardata($_POST['store_description']);
			$store_seodescription = cleardata($_POST['store_seodescription']);
			$store_featured = cleardata($_POST['store_featured']);
			$converted_slug = convertSlug(cleardata($_POST['store_title']));
			$exists = get_store_slug($connect, $converted_slug);

			if ($exists > 0)
			{
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
			$extUpload = strtolower(substr(strrchr($_FILES['store_image']['name'], '.') ,1));
	
			if (in_array($extUpload, $extsAllowed) ) { 
	
				$image = $_FILES['store_image']['tmp_name'];
				$imagefile = explode(".", $_FILES["store_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($image, $image_upload . 'store_' . $renamefile);
				$store_image = 'store_' . $renamefile;
			}

			$statment = $connect->prepare("INSERT INTO stores (store_id, store_title, store_seotitle, store_description, store_seodescription, store_featured, store_slug, store_image) VALUES (null, :store_title, :store_seotitle, :store_description, :store_seodescription, :store_featured, :store_slug, :store_image)");

			$statment->execute(array(
				':store_title' => $store_title,
				':store_slug' => $slug,
				':store_seotitle' => $store_seotitle,
				':store_description' => $store_description,
				':store_seodescription' => $store_seodescription,
				':store_featured' => $store_featured,
				':store_image' => $store_image
			));

			header('Location: ./stores.php');

}

require '../views/new.store.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {

	header('Location: ./login.php');	

}


?>