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

            $subcategory_parent = cleardata($_POST['subcategory_parent']);
            $subcategory_title = cleardata($_POST['subcategory_title']);
			$subcategory_seotitle = cleardata($_POST['subcategory_seotitle']);
			$subcategory_description = cleardata($_POST['subcategory_description']);
			$subcategory_seodescription = cleardata($_POST['subcategory_seodescription']);
			$converted_slug = convertSlug(cleardata($_POST['subcategory_title']));
			$exists = get_subcategory_slug($connect, $converted_slug);

			if ($exists > 0){
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$statment = $connect->prepare("INSERT INTO subcategories (subcategory_id, subcategory_parent, subcategory_title, subcategory_seotitle, subcategory_description, subcategory_seodescription, subcategory_slug) VALUES (null, :subcategory_parent, :subcategory_title, :subcategory_seotitle, :subcategory_description, :subcategory_seodescription, :subcategory_slug)");

			$statment->execute(array(
				':subcategory_parent' => $subcategory_parent,
				':subcategory_title' => $subcategory_title,
				':subcategory_slug' => $slug,
				':subcategory_seotitle' => $subcategory_seotitle,
				':subcategory_description' => $subcategory_description,
				':subcategory_seodescription' => $subcategory_seodescription
			));

			header('Location: ./subcategories.php');

}

$categories = get_all_categories($connect);
require '../views/header.view.php';
require '../views/new.subcategory.view.php';

}else{
	
	header('Location:'.SITE_URL);
}
	require '../views/footer.view.php';

}else {

	header('Location: ./login.php');	
}


?>