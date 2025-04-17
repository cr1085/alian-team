<?php 

$detail = $_GET['detail'];

$user_referido_payment="";

if(isset($_GET['user_referido'])){
    
$user_referido_payment= $_GET['user_referido'];
}


function generarNumeroReferencia() {
    $caracteres = 'abcdefghijklmnopqrstuvwxy0123456789'; // Caracteres permitidos para el número de referencia
    $longitud = 10; // Longitud del número de referencia

    $numeroReferencia = '';

    for ($i = 0; $i < $longitud; $i++) {
        $indice = mt_rand(0, strlen($caracteres) - 1);
        $numeroReferencia .= $caracteres[$indice];
    }

    return $numeroReferencia;
}

// Obtén la fecha y hora actual
$fechaActual = new DateTime();

// Define la cantidad de tiempo que deseas agregar a la fecha actual para la expiración (en este caso, 7 días)
$intervalo = new DateInterval('P1D'); // P7D significa "7 días"

// Calcula la fecha de vencimiento agregando el intervalo a la fecha actual
$fechaDeVencimiento = $fechaActual->add($intervalo);

// Formatea la fecha de vencimiento en el formato deseado
$formatoFecha = 'Y-m-d H:i:s'; // Puedes ajustar este formato según tus necesidades



$numeroReferencia = generarNumeroReferencia();
$monto = $_GET['monto'];
$money='COP';
$fechaDeVencimientoFormateada = $fechaDeVencimiento->format($formatoFecha);
$sercret='prod_integrity_a66fUW3u88FIPycplmBOfAUsuaTJy4lc';

$dataPayment=hash("sha256",$numeroReferencia.$monto.$money.$fechaDeVencimientoFormateada.$sercret);


?>
<style>
  form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }  
        
   
        
    
</style>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<center>
<h1>Proceso de pago</h1>
<h6>Los campos con asteriscos son obligatorios</h6>
<form method="POST" action="https://cliente.alianzateamcaribe.com/referidos.php?money=<?php echo $money ?>&monto=<?php echo $monto ?>&reference=<?php echo $numeroReferencia ?>&data_signature=<?php echo $dataPayment ?>" style="background:#96CFF5;">
  <div class="form-group">
    <label for="email"><span style="color:red;">*</span>Escribe tu email</label>
    <input type="text" class="form-control" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="referido">Codigo del referido</label>
    <input type="text" class="form-control" name="referido" id="referido". value="<?php echo $user_referido_payment ?>" >
  </div>
  <div class="form-group">
    <label for="money">Moneda</label>
    <input type="text" class="form-control" readonly name="money"  id="money" value="<?php echo $money ?>" style="background-color:grey;">
  </div>
  <div class="form-group">
     <span style="color:red;">Si el monto es diferente al marcado por la casilla por favor pon la cantidad adecuada, el valor debe contener punto ejemplo: $328.000</span> 
    <label for="monto">Monto</label>
    <input type="text" class="form-control"  name="monto"  id="monto" value="<?php echo $monto ?>">
  </div>
  <div class="form-group">
    <label for="detail"><span style="color:red;">*</span>Detalle</label>
    <input type="text" class="form-control" readonly name="detail" id="detail" value="<?php echo $detail ?>" >
  </div>
  <div class="form-group">
    <label for="referencia"><span style="color:red;">*</span>Referencia</label>
    <input type="text" class="form-control" readonly name="referencia" id="referencia" value="<?php echo $numeroReferencia ?>" >
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" readonly name="dataPayment" id="dataPayment" value="<?php echo $dataPayment ?>" >
  </div>
  <div class="form-check">
    <label class="form-check-label" for="checknoreferido" >No tengo referido</label>
    <input type="checkbox" class="form-check-input" id="checknoreferido" name="checknoreferido">
  </div>
  
  
  
  <button type="submit" class="btn btn-primary">Pagar</button>
  
</form>
</center>