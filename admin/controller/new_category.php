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

			$category_title = cleardata($_POST['category_title']);
			$category_seotitle = cleardata($_POST['category_seotitle']);
			$category_description = cleardata($_POST['category_description']);
			$category_seodescription = cleardata($_POST['category_seodescription']);
			$category_featured = cleardata($_POST['category_featured']);
			$category_icon = cleardata($_POST['category_icon']);
			$category_menu = cleardata($_POST['category_menu']);
			$converted_slug = convertSlug(cleardata($_POST['category_title']));
			$exists = get_category_slug($connect, $converted_slug);

			if ($exists > 0)
			{
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
			
			$extUpload = strtolower( substr( strrchr($_FILES['category_image']['name'], '.') ,1) ) ;
 
			if (in_array($extUpload, $extsAllowed) ) { 
	
				$category_image = $_FILES['category_image']['tmp_name'];
				$imagefile = explode(".", $_FILES["category_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($category_image, $image_upload . 'category_' . $renamefile);
			}

			$statment = $connect->prepare("INSERT INTO categories (category_id, category_title, category_seotitle, category_description, category_seodescription, category_featured, category_icon, category_menu, category_slug, category_image) VALUES (null, :category_title, :category_seotitle, :category_description, :category_seodescription, :category_featured, :category_icon, :category_menu, :category_slug, :category_image)");

			$statment->execute(array(
				':category_title' => $category_title,
				':category_slug' => $slug,
				':category_seotitle' => $category_seotitle,
				':category_description' => $category_description,
				':category_seodescription' => $category_seodescription,
				':category_featured' => $category_featured,
				':category_icon' => $category_icon,
				':category_menu' => $category_menu,
				':category_image' => 'category_' . $renamefile
			));

			header('Location: ./categories.php');

}

require '../views/new.category.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {

	header('Location: ./login.php');	

}


?>