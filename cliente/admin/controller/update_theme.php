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
$extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
$image_upload = '../../images/';

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$th_mobilestyle = $_POST['th_mobilestyle'];
	$th_headerstyle = $_POST['th_headerstyle'];
	$th_homestyle = $_POST['th_homestyle'];

	$th_primarycolor = $_POST['th_primarycolor'];
	$th_secondarycolor = $_POST['th_secondarycolor'];

	$cssFile = file_get_contents('./colors.php');
	$cssFile = str_replace('{primary_color}', $th_primarycolor, $cssFile);
	$cssFile = str_replace('{secondary_color}', $th_secondarycolor, $cssFile);
	$cssFile = str_replace('{secondary_color_50}', hexToRgb($th_secondarycolor, .50), $cssFile);
	$cssFile = str_replace('{secondary_color_85}', hexToRgb($th_secondarycolor, .85), $cssFile);
	$handler = fopen("../../assets/css/colors.css", "w");
	fwrite($handler, $cssFile);
	fclose($handler);

	if($_FILES['th_logo']['error'] > 0 || empty($_FILES['th_logo'])) {
				
		$th_logo = $_POST['th_logo_save'];

	}else{
		$extUpload = strtolower( substr( strrchr($_FILES['th_logo']['name'], '.') ,1) ) ;

		if (in_array($extUpload, $extsAllowed) ) { 

			$image = $_FILES['th_logo']['tmp_name'];
			$imagefile = explode(".", $_FILES["th_logo"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
			move_uploaded_file($image, $image_upload . $renamefile);
			$th_logo = $renamefile;

		}
	}

	if($_FILES['th_favicon']['error'] > 0 || empty($_FILES['th_favicon'])) {
				
		$th_favicon = $_POST['th_favicon_save'];

	}else{
		$extUpload_1 = strtolower( substr( strrchr($_FILES['th_favicon']['name'], '.') ,1) ) ;

		if (in_array($extUpload_1, $extsAllowed) ) { 

			$image_1 = $_FILES['th_favicon']['tmp_name'];
			$imagefile_1 = explode(".", $_FILES["th_favicon"]["name"]);
			$renamefile_1 = round(microtime(true)) . '.' . end($imagefile_1);
			move_uploaded_file($image_1, $image_upload . $renamefile_1);
			$th_favicon = $renamefile_1;

		}
	}

	if($_FILES['th_homebg']['error'] > 0 || empty($_FILES['th_homebg'])) {
				
		$th_homebg = $_POST['th_homebg_save'];

	}else{
		$extUpload_2 = strtolower( substr( strrchr($_FILES['th_homebg']['name'], '.') ,1) ) ;

		if (in_array($extUpload_2, $extsAllowed) ) { 

			$image_2 = $_FILES['th_homebg']['tmp_name'];
			$imagefile_2 = explode(".", $_FILES["th_homebg"]["name"]);
			$renamefile_2 = round(microtime(true)) . '.' . end($imagefile_2);
			move_uploaded_file($image_2, $image_upload . $renamefile_2);
			$th_homebg = $renamefile_2;

		}
	}

	if($_FILES['th_whitelogo']['error'] > 0 || empty($_FILES['th_whitelogo'])) {
				
		$th_whitelogo = $_POST['th_whitelogo_save'];

	}else{
		$extUpload_3 = strtolower( substr( strrchr($_FILES['th_whitelogo']['name'], '.') ,1) ) ;

		if (in_array($extUpload_3, $extsAllowed) ) { 

			$image_3 = $_FILES['th_whitelogo']['tmp_name'];
			$imagefile_3 = explode(".", $_FILES["th_whitelogo"]["name"]);
			$renamefile_3 = round(microtime(true)) . '.' . end($imagefile_3);
			move_uploaded_file($image_3, $image_upload . $renamefile_3);
			$th_whitelogo = $renamefile_3;

		}
	}

$statment = $connect->prepare(
	"UPDATE theme SET
	th_primarycolor = :th_primarycolor,
	th_secondarycolor = :th_secondarycolor,
	th_mobilestyle = :th_mobilestyle,
	th_headerstyle = :th_headerstyle,
	th_homestyle = :th_homestyle,
	th_logo = :th_logo,
	th_whitelogo = :th_whitelogo,
	th_favicon = :th_favicon,
	th_homebg = :th_homebg
	");

$statment->execute(array(
	':th_primarycolor' => $th_primarycolor,
	':th_secondarycolor' => $th_secondarycolor,
	':th_mobilestyle' => $th_mobilestyle,
	':th_headerstyle' => $th_headerstyle,
	':th_homestyle' => $th_homestyle,
	':th_logo' => $th_logo,
	':th_whitelogo' => $th_whitelogo,
	':th_favicon' => $th_favicon,
	':th_homebg' => $th_homebg
));

}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}
    
}else {
		header('Location: ./login.php');		
		}


?>