<?php 

/*--------------------*/
// Description: Couponza - Coupons & Discounts Php Script
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

			$slider_link = cleardata($_POST['slider_link']);
			$slider_status = cleardata($_POST['slider_status']);

			$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
			$extUpload = strtolower( substr( strrchr($_FILES['slider_image']['name'], '.') ,1) ) ;
	
			if (in_array($extUpload, $extsAllowed) ) { 
	
				$image = $_FILES['slider_image']['tmp_name'];
				$imagefile = explode(".", $_FILES["slider_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($image, $image_upload . 'slider_' . $renamefile);
				$slider_image = 'slider_' . $renamefile;
			}

			$statment = $connect->prepare("INSERT INTO sliders (slider_id, slider_link, slider_status, slider_image) VALUES (null, :slider_link, :slider_status, :slider_image)");

			$statment->execute(array(
				':slider_link' => $slider_link,
				':slider_status' => $slider_status,
				':slider_image' => $slider_image
			));

			header('Location: ./sliders.php');

}
require '../views/header.view.php';
require '../views/new.slider.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {

	header('Location: ./login.php');	

}


?>