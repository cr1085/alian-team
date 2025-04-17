<?php

require './core.php';
date_default_timezone_set('America/Bogota');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se seleccionó un archivo
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
       
        $name_archivo = $_FILES["imagen"]["name"];
        $tipo_archivo = $_FILES["imagen"]["type"];
        $tamano_archivo = $_FILES["imagen"]["size"];
        $temp_nombre = $_FILES["imagen"]["tmp_name"];
        $adjunto=trim($name_archivo);
        $directorio_destino = "images/$adjunto";
        $directorio_destino_cliente = "cliente/images/$adjunto";
        
        copy($temp_nombre, $directorio_destino);
        copy($temp_nombre, $directorio_destino_cliente);
        
        
        $id=$_POST['id'];
        $item=$_POST['item'];
        $date=DATE('d/m/y');
        
        
        $statement = $connect->prepare("INSERT INTO `deals_gallery` (`id`, `item`, `picture`, `created`) VALUES  ($id,$item, '$adjunto', '$date')");
	    $statement->execute();
        $result = $statement->fetch();
        
        header("Location: ././profile.view.php");
       
    } else {
        echo "Error: No se seleccionó ninguna imagen o hubo un error al cargarla.";
    }
}
?>
