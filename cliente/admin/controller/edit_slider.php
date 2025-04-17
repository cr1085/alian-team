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
	$id_slider = id_slider($_GET['id']);

}else{
	header('Location: ./home.php');
}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$slider_id = cleardata($_POST['slider_id']);
			$slider_status = cleardata($_POST['slider_status']);
			$slider_link = cleardata($_POST['slider_link']);

			if($_FILES['slider_image']['error'] > 0 || empty($_FILES['slider_image'])) {
				
				$slider_image = $_POST['slider_image_save'];

			}else{
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
			}

			$statment = $connect->prepare("UPDATE sliders SET slider_id = :slider_id, slider_status = :slider_status, slider_link = :slider_link, slider_image = :slider_image WHERE slider_id = :slider_id");

			$statment->execute(array(
				':slider_id' => $slider_id,
				':slider_status' => $slider_status,
				':slider_link' => $slider_link,
				':slider_image' => $slider_image
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_slider = id_slider($_GET['id']);

			$slider = get_slider_per_id($connect, $id_slider);

			if (!$slider){
				header('Location: ./home.php');
			}

			$slider = $slider['0'];
			require '../views/header.view.php';
			require '../views/edit.slider.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>