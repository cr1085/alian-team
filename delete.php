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
    if(isset($_POST['delete'.$row['deal_id']])){
     $codigo=$_POST['delete'.$row['deal_id']];    
        
        }  
   }
  
  
  
	$statement = $connect->prepare("DELETE FROM `deals` WHERE deal_id='$codigo'");
	$statement->execute();
    $result = $statement->fetch();
    
   
     header("Location: ././profile.view.php");
    
	
}catch(PDOException $e){
    echo $e->getMessage();
}

	}
	




?>