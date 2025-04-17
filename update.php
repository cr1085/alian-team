<?php 
require './core.php';
date_default_timezone_set('America/Bogota');








	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    
    $statement = $connect->prepare("SELECT * FROM deals");
	$statement->execute();
    $result = $statement->fetchAll();
    $codigo=0;
    

    
   foreach($result as $row){

    if(isset($_POST['update'.$row['deal_id']])){

     $codigo=$_POST['update'.$row['deal_id']];    
     

        }  
   }
   

$deal_title = $_POST['updatedeal_title'.$codigo];
$deal_seotitle = $_POST['updatedeal_seotitle'.$codigo];
$deal_description = $_POST['updatedeal_description'.$codigo];
$deal_seodescription = $_POST['updatedeal_seodescription'.$codigo];
$deal_category = $_POST['updatedeal_category'.$codigo];
$deal_subcategory = $_POST['updatedeal_subcategory'.$codigo];
$deal_store = $_POST['updatedeal_store'.$codigo];
$deal_location = $_POST['updatedeal_location'.$codigo];
$deal_slug = $_POST['updatedeal_slug'.$codigo];
$deal_author = $_POST['updatedeal_author'.$codigo];
$deal_image = $_POST['updatedeal_image'.$codigo];
$deal_price = $_POST['updatedeal_price'.$codigo];
$deal_oldprice = $_POST['updatedeal_oldprice'.$codigo];
$deal_tagline = $_POST['updatedeal_tagline'.$codigo];
$deal_link = $_POST['updatedeal_link'.$codigo];
$deal_video = $_POST['updatedeal_video'.$codigo];
$deal_gif = $_POST['updatedeal_gif'.$codigo];
$deal_start = $_POST['updatedeal_start'.$codigo];
$deal_expire = $_POST['updatedeal_expire'.$codigo];
$deal_featured = $_POST['updatedeal_featured'.$codigo];
$deal_exclusive = $_POST['updatedeal_exclusive'.$codigo];
$deal_sponsored = $_POST['updatedeal_sponsored'.$codigo];
$deal_status = $_POST['updatedeal_status'.$codigo];
$deal_created = $_POST['updatedeal_created'.$codigo];
$deal_updated = $_POST['updatedeal_updated'.$codigo];  
  
  
  
$statement = $connect->prepare("UPDATE `deals` SET `deal_id`='$codigo',`deal_title`='$deal_title',`deal_seotitle`='$deal_seotitle',`deal_description`='$deal_description',`deal_seodescription`='$deal_seodescription',`deal_category`='$deal_category',`deal_subcategory`='$deal_subcategory',`deal_store`='$deal_store',`deal_location`='$deal_location',`deal_slug`='$deal_slug',`deal_author`='$deal_author',`deal_image`='$deal_image',`deal_price`='$deal_price',`deal_oldprice`='$deal_oldprice',`deal_tagline`='$deal_tagline',`deal_link`='$deal_link',`deal_video`='$deal_video',`deal_gif`='$deal_gif',`deal_start`='$deal_start',`deal_expire`='$deal_expire',`deal_featured`='$deal_featured',`deal_exclusive`='$deal_exclusive',`deal_sponsored`='$deal_sponsored',`deal_status`='$deal_status',`deal_created`='$deal_created',`deal_updated`='$deal_updated' WHERE `deal_id`='$codigo'");
	$statement->execute();
    $result = $statement->fetch();
    
    
     header("Location: ././profile.view.php");
	
}catch(PDOException $e){
    echo $e->getMessage();
}

	}
	




?>