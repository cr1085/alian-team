<?php

require './core.php';

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $translation['tr_signuppage']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);

$errors = array();
$validateEmail = false;
$validateName = false;
$validatePassword = false;
$validateChecked = false;

$fullHeight = true;

$siteKey = $settings['st_recaptchakey'];
$secretKey = $settings['st_recaptchasecretkey'];

if (isLogged()){

header('Location: '. $urlPath->home());

}else{

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$verifyCaptcha = $_POST['g-recaptcha-response'];
$user_email = filter_var(strtolower($_POST['user_email']), FILTER_SANITIZE_STRING);
$user_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
$user_password = filter_var($_POST["user_password"], FILTER_SANITIZE_STRING);
$isChecked = $_POST['ischecked'];
$encrtypted_password = hash('sha512', $user_password);

$recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$verifyCaptcha";

$verify = json_decode(file_get_contents($recaptchaUrl));

if (!$verify->success) {

  $errors[] = $translation['tr_161'];

}else{

if (empty($user_email)) {
    $errors[] = $translation['tr_158'];
} elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = $translation['tr_163'];
}else{
	$validateEmail = true;
}

if (empty($user_name)) {
    $errors[] = $translation['tr_159'];
}elseif(!lengthInput($user_name, 3, 20)){
	$errors[] = $translation['tr_162'];
}elseif (validateInput($user_name)) {
    $errors[] = $translation['tr_171'];
}else{
	$validateName = true;
}

if (empty($user_password)) {
    $errors[] = $translation['tr_160'];
}elseif(!lengthInput($user_password, 8, 32)){
	$errors[] = $translation['tr_164'];
}else{
	$validatePassword = true;
}

if (empty($isChecked) && !$isChecked == 1) {
    $errors[] = $translation['tr_173'];
}else{
    $validateChecked = true;
}

if ($validateName && $validatePassword && $validateEmail && $validateChecked) {
	
try{        
    
$connect;
    
}catch (PDOException $e){
    $errors[] = $e->getMessage();   
}

  $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
  $statement->execute(array(':user_email' => $user_email));
  $result = $statement->fetch();

  if ($result != false) {
	
	$errors[] = $translation['tr_165'];
  
  }
}

if (empty($errors)) {

      $statement = $connect->prepare("INSERT INTO users (user_id, user_name, user_email, user_password) VALUES (null, :user_name, :user_email, :user_password)");
	  $statement->execute(array(
	  	':user_name' => $user_name,
	  	':user_email' => $user_email,
	  	':user_password' => $encrtypted_password
	  ));

$userInfo = getUserInfo($connect, $user_email);

$array_content = array("{LOGO_URL}" => $urlPath->image($theme['th_logo']),
                       "{SITE_DOMAIN}" => $urlPath->home(), 
                       "{SITE_NAME}" => $translation['tr_1'], 
                       "{USER_NAME}" => $userInfo['user_name'], 
                       "{USER_EMAIL}" => $userInfo['user_email'], 
                       "{TERMS_URL}" => $urlPath->terms(), 
                       "{PRIVACY_URL}" => $urlPath->privacy(),
                       "{SIGNIN_URL}" => $urlPath->signin()
                        );

$emailTemplate = getEmailTemplate($connect, 1);

if ($emailTemplate) {

    $emailContent = json_decode($emailTemplate['email_content'],true);

    $mail = sendMail($array_content, $emailContent[0]['message'], $user_email, $emailTemplate['email_fromname'], $emailContent[0]['subject'], $emailTemplate['email_plaintext']);
}

    header('Location: '. $urlPath->signin());

   }
  }
 }
}

require './header.php';
require './views/signup.view.php';
require './footer.php';

?>