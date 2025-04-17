<?php

require '../../config.php';
require '../functions.php';

$output = "";

$connect = connect($database);

$theme = get_single_theme($connect);

if(!$connect){
    
    exit();
}

if ($_POST){

    $idtemplate = filter_var($_POST["idtemplate"], FILTER_SANITIZE_STRING);
	$sendto = filter_var($_POST["sendto"], FILTER_SANITIZE_STRING);

    $emailTemplate = getEmailTemplate($connect, $idtemplate);
    $settings = getSettings($connect);
    $checkMail = checkMail($settings);

    $array_content = array("{LOGO_URL}" => SITE_URL."/images/".$theme['th_logo'],
     "{SITE_DOMAIN}" => SITE_URL, 
     "{SITE_NAME}" => "Example Site Name", 
     "{USER_NAME}" => "Daniel", 
     "{USER_EMAIL}" => "example@email.com", 
     "{USER_MESSAGE}" => cleardata("This is an example message."),
     "{PRIVACY_URL}" => SITE_URL."/terms-and-conditions",
     "{TERMS_URL}" => SITE_URL."/privacy-policy",
     "{SIGNIN_URL}" => SITE_URL."/signin",
     "{RESET_URL}" => SITE_URL."/forgot",
     "{RECIPE_URL}" => SITE_URL."/recipe/1/example-recipe-slug",
     "{RECIPE_TITLE}" => "Example Title",
     "{RECIPE_IMAGE}" => SITE_URL."/admin/assets/images/placeholder.png",
     "{SENDER_NAME}" => "James", 
     "{SENDER_EMAIL}" => "sender@example.com",
     "{FRIEND_EMAIL}" => "friend@example.com"
 );


    if ($emailTemplate) {

        $emailContent = json_decode($emailTemplate['email_content'],true);

        try{        

            if (empty($checkMail)) {

            $mail = sendMail($array_content, $emailContent[0]['message'], $sendto, $emailTemplate['email_fromname'], $emailContent[0]['subject'], $emailTemplate['email_plaintext'], $settings);

            if ($mail == TRUE) {
                $output = "<span class='text-success'><i class='fa fa-check'></i> "._EMAILSENTSUCCESS."</span>";
                echo $output;
            }else{

                $output = $mail;
                echo "<span class='text-danger'>".$output."</span";
            }

            }else{

                $output = $checkMail;
                echo "<span class='text-danger'>".$output."</span";
            }

            
        }catch (PDOException $e){
            
            $output = $e->getMessage();
            echo "<span class='text-danger'>".$output."</span";

        }

    }

}

?>