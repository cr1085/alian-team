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

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$location_title = cleardata($_POST['location_title']);
			$location_seodescription = cleardata($_POST['location_seotitle']);
			$location_description = cleardata($_POST['location_description']);
			$location_seodescription = cleardata($_POST['location_seodescription']);
			$location_featured = cleardata($_POST['location_featured']);
			$converted_slug = convertSlug(cleardata($_POST['location_title']));
			$exists = get_location_slug($connect, $converted_slug);

			if ($exists > 0)
			{
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
			
			$extUpload = strtolower( substr( strrchr($_FILES['location_image']['name'], '.') ,1) ) ;
 
			if (in_array($extUpload, $extsAllowed) ) { 
	
				$location_image = $_FILES['location_image']['tmp_name'];
				$imagefile = explode(".", $_FILES["location_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($location_image, $image_upload . 'location_' . $renamefile);
			}

			$statment = $connect->prepare("INSERT INTO locations (location_id, location_title, location_seotitle, location_description, location_seodescription, location_featured, location_slug, location_image) VALUES (null, :location_title, :location_seotitle, :location_description, :location_seodescription, :location_featured, :location_slug, :location_image)");

			$statment->execute(array(
				':location_title' => $location_title,
				':location_slug' => $slug,
				':location_seotitle' => $location_seotitle,
				':location_description' => $location_description,
				':location_seodescription' => $location_seodescription,
				':location_featured' => $location_featured,
				':location_image' => 'location_' . $renamefile
			));

			header('Location: ./locations.php');

}
require '../views/header.view.php';
require '../views/new.location.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {

	header('Location: ./login.php');	

}


?>