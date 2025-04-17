<?php 
require './core.php';
date_default_timezone_set('America/Bogota');

$deal_id = $_POST['deal_id'];
$deal_title = $_POST['deal_title'];
$deal_seotitle = $_POST['deal_seotitle'];
$deal_description = $_POST['deal_description'];
$deal_seodescription = $_POST['deal_seodescription'];
$deal_category = $_POST['deal_category'];
$deal_subcategory = $_POST['deal_subcategory'];
$deal_store = $_POST['deal_store'];
$deal_location = $_POST['deal_location'];
$deal_slug = $_POST['deal_slug'];
$deal_author = $_POST['deal_author'];
$deal_image = $_POST['deal_image'];
$deal_price = $_POST['deal_price'];
$deal_oldprice = $_POST['deal_oldprice'];
$deal_tagline = $_POST['deal_tagline'];
$deal_link = $_POST['deal_link'];
$deal_video = $_POST['deal_video'];
$deal_gif = $_POST['deal_gif'];
$deal_start = $_POST['deal_start'];
$deal_expire = $_POST['deal_expire'];
$deal_featured = $_POST['deal_featured'];
$deal_exclusive = $_POST['deal_exclusive'];
$deal_sponsored = $_POST['deal_sponsored'];
$deal_status = $_POST['deal_status'];
$deal_created = $_POST['deal_created'];
$deal_updated = $_POST['deal_updated'];



	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    
    $statement = $connect->prepare("SELECT * FROM deals");
	$statement->execute();
    $result = $statement->fetchAll();
    $deal_title_aux="";
    $deal_seotitle_aux="";
    $deal_slug_aux="";
    $contar=0;
    foreach($result as $row){
        $contar = $contar + 1;
        if($row['deal_title'] == $deal_title){
            
            $deal_title_aux =  $deal_title.$contar;
            
        }else{
            
            $deal_title_aux =  $deal_title;
        }
        
        if($row['deal_seotitle'] == $deal_seotitle){
            
            $deal_seotitle_aux= $deal_seotitle.$contar;
            
        }else{
            $deal_seotitle_aux= $deal_seotitle;
        }
        
        if($row['deal_slug'] == $deal_slug){
            
            $deal_slug_aux = $deal_slug.$contar;
        }else{
            
            $deal_slug_aux = $deal_slug;
        }
        
    }
    
	$statement = $connect->prepare("INSERT INTO `deals` (`deal_id`, `deal_title`, `deal_seotitle`, `deal_description`, `deal_seodescription`, `deal_category`, `deal_subcategory`, `deal_store`, `deal_location`, `deal_slug`, `deal_author`, `deal_image`, `deal_price`, `deal_oldprice`, `deal_tagline`, `deal_link`, `deal_video`, `deal_gif`, `deal_start`, `deal_expire`, `deal_featured`, `deal_exclusive`, `deal_sponsored`, `deal_status`, `deal_created`, `deal_updated`) VALUES ($deal_id, '$deal_title_aux', '$deal_seotitle_aux', '$deal_description', '$deal_seodescription', $deal_category, '$deal_subcategory', '$deal_store', '$deal_location', '$deal_slug_aux', $deal_author, '$deal_image', '$deal_price', '$deal_oldprice', '$deal_tagline', '$deal_link', '$deal_video', '$deal_gif', '$deal_start', '$deal_expire', $deal_featured, $deal_exclusive, $deal_sponsored, $deal_status, '$deal_created', '$deal_updated')");
	$statement->execute();
    $result = $statement->fetch();
    
   
     header("Location: ././profile.view.php");
    
	
}catch(PDOException $e){
    echo $e->getMessage();
}

	}
	




?>