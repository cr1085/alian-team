<?php

require './core.php';
date_default_timezone_set('America/Bogota');


$referido = $_POST['referido'];
$email = $_POST['email'];
$fecha_actual = date("d-m-Y h:i:s");
$monto = $_POST['monto'];
$detail=$_POST['detail'];
$referenciapago = $_POST['referencia'];
$money= $_POST['money'];
$dataPayment= $_POST['dataPayment'];

if (isLogged()){

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
try{	
	$statement = $connect->prepare("INSERT INTO `referidosandventas` (`email`, `codigoreferido`, `fecha`, `valor`, `detalle`, `referenciapago`,`money`,`datasignature`) VALUES ('$email','$referido','$fecha_actual','$monto','$detail','$referenciapago','$money','$dataPayment')");
	$statement->execute();
    $result = $statement->fetch();
    
   
     header("Location: ././tarifasalianza.php?money=$money&monto=$monto&reference=$referenciapago&data_signature=$dataPayment");
    
	
}catch(PDOException $e){
    echo $e->getMessage();
}

	}
	
}



?>