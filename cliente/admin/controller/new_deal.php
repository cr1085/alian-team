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
	if(!$connect){
		header('Location: ./error.php');
	} 

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$deal_title = cleardata($_POST['deal_title']);
			$deal_seotitle = cleardata($_POST['deal_seotitle']);
			$deal_description = $_POST['deal_description'];
			$deal_seodescription = cleardata($_POST['deal_seodescription']);
			$deal_tagline = cleardata($_POST['deal_tagline']);
			$deal_category = cleardata($_POST['deal_category']);
			$deal_subcategory = cleardata($_POST['deal_subcategory']);
			$deal_store = cleardata($_POST['deal_store']);
			$deal_location = cleardata($_POST['deal_location']);
			$deal_status = cleardata($_POST['deal_status']);
			$deal_author = cleardata($_POST['deal_author']);
			$deal_price = cleardata($_POST['deal_price']);
			$deal_oldprice = cleardata($_POST['deal_oldprice']);
			$deal_link = cleardata($_POST['deal_link']);
			$deal_video = cleardata($_POST['deal_video']);
			$deal_gif = cleardata($_POST['deal_gif']);
			$deal_start = cleardata($_POST['deal_start']);
			$deal_expire = cleardata($_POST['deal_expire']);
			$deal_exclusive = cleardata($_POST['deal_exclusive']);
			$deal_featured = cleardata($_POST['deal_featured']);

			$converted_slug = convertSlug(cleardata($_POST['deal_title']));
			$exists = get_deal_slug($connect, $converted_slug);

			if ($exists > 0)
			{
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
			
			$extUpload = strtolower( substr( strrchr($_FILES['deal_image']['name'], '.') ,1) ) ;
 
			if (in_array($extUpload, $extsAllowed) ) { 
	
				$deal_image = $_FILES['deal_image']['tmp_name'];
				$imagefile = explode(".", $_FILES["deal_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($deal_image, $image_upload . 'deal_' . $renamefile);
			}

			$statment = $connect->prepare("INSERT INTO deals (deal_id, deal_title, deal_seotitle, deal_slug, deal_description, deal_seodescription, deal_tagline, deal_category, deal_subcategory, deal_store, deal_location, deal_status, deal_author, deal_price, deal_oldprice, deal_link, deal_video, deal_gif, deal_start, deal_expire, deal_exclusive, deal_featured, deal_created, deal_image) VALUES (null, :deal_title, :deal_seotitle, :deal_slug, :deal_description, :deal_seodescription, :deal_tagline, :deal_category, :deal_subcategory, :deal_store, :deal_location, :deal_status, :deal_author, :deal_price, :deal_oldprice, :deal_link, :deal_video, :deal_gif, :deal_start, :deal_expire, :deal_exclusive, :deal_featured, CURRENT_TIMESTAMP, :deal_image)");

			$statment->execute(array(
				':deal_title' => $deal_title,
				':deal_seotitle' => $deal_seotitle,
				':deal_slug' => $slug,
				':deal_description' => $deal_description,
				':deal_seodescription' => $deal_seodescription,
				':deal_tagline' => $deal_tagline,
				':deal_category' => $deal_category,
				':deal_subcategory' => $deal_subcategory,
				':deal_store' => $deal_store,
				':deal_location' => $deal_location,
				':deal_status' => $deal_status,
				':deal_author' => $deal_author,
				':deal_price' => $deal_price,
				':deal_oldprice' => $deal_oldprice,
				':deal_link' => $deal_link,
				':deal_video' => $deal_video,
				':deal_gif' => $deal_gif,
				':deal_start' => $deal_start,
				':deal_expire' => $deal_expire,
				':deal_exclusive' => $deal_exclusive,
				':deal_featured' => $deal_featured,
				':deal_image' => 'deal_' . $renamefile
			));

			// Start Gallery Upload

			$idItem = $connect->lastInsertId();
			unset($temp);

			$statment->bindParam(':item', $idItem);

			$FileUploader = new FileUploader('files', array(
					'uploadDir' => '../../images/',
					'title' => 'auto',
					'limit' => 10,
					'maxSize' => 4,
					'fileMaxSize' => 4,
					'extensions' => ['jpg', 'jpeg', 'png'],
					'replace' => true,
					));
				
				$data = $FileUploader->upload();
				
				if($data['isSuccess'] && count($data['files']) > 0) {

					$uploadedFiles = $data['files'];

					$statment = $connect->prepare("INSERT INTO deals_gallery (id,item,picture,created) VALUES (null, :item, :picture, CURRENT_TIMESTAMP)");

					foreach ($uploadedFiles as $key => $value){
						$statment->execute(array(
							':item' => $idItem,
							':picture' => $value['name']
						));
					}

				}
			// End Gallery Upload

			header('Location: ./deals.php');
		}

		$stores = get_all_stores($connect);
		$locations = get_all_locations($connect);
		$categories = get_all_categories($connect);
		$siteSettings = getSettings($connect);

		require '../views/header.view.php';
		require '../views/new.deal.view.php';
		
	}else{
		
		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';
	
}else {
	header('Location: ./login.php');		
}


?>