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
	if(!$connect){
		header('Location: ./error.php');
	} 

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$coupon_title = cleardata($_POST['coupon_title']);
			$coupon_seotitle = cleardata($_POST['coupon_seotitle']);
			$coupon_description = $_POST['coupon_description'];
			$coupon_seodescription = cleardata($_POST['coupon_seodescription']);
			$coupon_tagline = cleardata($_POST['coupon_tagline']);
			$coupon_category = cleardata($_POST['coupon_category']);
			$coupon_subcategory = cleardata($_POST['coupon_subcategory']);
			$coupon_store = cleardata($_POST['coupon_store']);
			$coupon_status = cleardata($_POST['coupon_status']);
			$coupon_author = cleardata($_POST['coupon_author']);
			$coupon_code = cleardata($_POST['coupon_code']);
			$coupon_link = cleardata($_POST['coupon_link']);
			$coupon_start = cleardata($_POST['coupon_start']);
			$coupon_expire = cleardata($_POST['coupon_expire']);
			$coupon_verify = cleardata($_POST['coupon_verify']);
			$coupon_featured = cleardata($_POST['coupon_featured']);
			$coupon_exclusive = cleardata($_POST['coupon_exclusive']);

			$converted_slug = convertSlug(cleardata($_POST['coupon_title']));
			$exists = get_coupon_slug($connect, $converted_slug);

			if ($exists > 0){
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;
			}else{
				$slug = $converted_slug;
			}

			if($_FILES['coupon_image']['error'] > 0 || empty($_FILES['coupon_image'])) {
				
				$coupon_image = '';

			}else{
				$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
				$extUpload = strtolower( substr( strrchr($_FILES['coupon_image']['name'], '.') ,1) ) ;
	 
				if (in_array($extUpload, $extsAllowed) ) { 
		
					$image = $_FILES['coupon_image']['tmp_name'];
					$imagefile = explode(".", $_FILES["coupon_image"]["name"]);
					$renamefile = round(microtime(true)) . '.' . end($imagefile);
					$image_upload = '../../images/';
					move_uploaded_file($image, $image_upload . 'coupon_' . $renamefile);
					$coupon_image = 'coupon_' . $renamefile;

				}
			}
			
			$statment = $connect->prepare("INSERT INTO coupons (
				coupon_id,
				coupon_title,
				coupon_seotitle,
				coupon_slug,
				coupon_description,
				coupon_seodescription,
				coupon_tagline,
				coupon_category,
				coupon_subcategory,
				coupon_store,
				coupon_status,
				coupon_author,
				coupon_code,
				coupon_link,
				coupon_start,
				coupon_expire,
				coupon_verify,
				coupon_featured,
				coupon_exclusive,
				coupon_created,
				coupon_image) VALUES (
					null,
					:coupon_title,
					:coupon_seotitle,
					:coupon_slug,
					:coupon_description,
					:coupon_seodescription,
					:coupon_tagline,
					:coupon_category,
					:coupon_subcategory,
					:coupon_store,
					:coupon_status,
					:coupon_author,
					:coupon_code,
					:coupon_link,
					:coupon_start,
					:coupon_expire,
					:coupon_verify,
					:coupon_featured,
					:coupon_exclusive,
					CURRENT_TIMESTAMP,
					:coupon_image)");

			$statment->execute(array(
				':coupon_title' => $coupon_title,
				':coupon_seotitle' => $coupon_seotitle,
				':coupon_slug' => $slug,
				':coupon_description' => $coupon_description,
				':coupon_seodescription' => $coupon_seodescription,
				':coupon_tagline' => $coupon_tagline,
				':coupon_category' => $coupon_category,
				':coupon_subcategory' => $coupon_subcategory,
				':coupon_store' => $coupon_store,
				':coupon_status' => $coupon_status,
				':coupon_author' => $coupon_author,
				':coupon_code' => $coupon_code,
				':coupon_link' => $coupon_link,
				':coupon_start' => $coupon_start,
				':coupon_expire' => $coupon_expire,
				':coupon_verify' => $coupon_verify,
				':coupon_featured' => $coupon_featured,
				':coupon_exclusive' => $coupon_exclusive,
				':coupon_image' => $coupon_image
			));

			header('Location: ./coupons.php');
		}

		$stores = get_all_stores($connect);
		$categories = get_all_categories($connect);
		$siteSettings = getSettings($connect);
		
		require '../views/header.view.php';
		require '../views/new.coupon.view.php';
		
	}else{
		
		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';
	
}else {
	header('Location: ./login.php');		
}


?>