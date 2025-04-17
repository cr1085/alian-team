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
	header ('Location: ./error.php');
	}

if (isset($_GET['id']) && !empty($_GET["id"]) ) {
	$id_email = id_email($_GET['id']);

}else{
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$email_id = cleardata($_POST['email_id']);
$email_fromname = cleardata($_POST['email_fromname']);
$email_plaintext = cleardata($_POST['email_plaintext']);
$email_disabled = cleardata($_POST['email_disabled']);

$sentence = $connect->prepare("UPDATE emailtemplates SET email_fromname = :email_fromname, email_plaintext = :email_plaintext, email_disabled = :email_disabled, email_content = :email_content WHERE email_id = :email_id");

$array = array();

$array[] = array(
"message" => $_POST["message"],
"subject" => $_POST["subject"],
);

$data = json_encode($array);

$sentence->execute(array(
		':email_id' => $email_id,
		':email_fromname' => $email_fromname,
		':email_plaintext' => $email_plaintext,
		':email_disabled' => $email_disabled,
		':email_content' => $data
		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$etemplate = get_etemplate_by_id($connect, $id_email);
    
    if (!$etemplate){
    header('Location: ./home.php');
}

$etemplate_content = $etemplate['email_content'];

$contents = json_decode($etemplate_content,true);

if (empty($contents)) {
	$contents = array();
}

}
require '../views/header.view.php';
require '../views/edit.etemplate.view.php';

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>