<!-- HEADER -->
<?php require './sections/header.php'; 


?>

    <!-- PAGE TITLE -->
    
    <div class="page-title uk-section uk-section-small uk-section-default">
    <div class="uk-container">
        <h3 class="uk-heading-line uk-text-center uk-text-left@m"><span><?php echo echoOutput($translation['tr_profilepage']) ?></span></h3>
        </div>
    </div>

<!-- END PAGE TITLE -->

<!-- PAGE CONTENT -->

<div class="uk-container">
<div class="uk-grid-medium" uk-grid>

        <div class="uk-width-1-3@s uk-width-1-4@m">

            <div class="profile uk-box-shadow-small uk-border-rounded uk-padding">

                <div class="uk-block uk-margin-remove uk-text-center">
                    <div class="uk-inline uk-margin">

                    <div class="uk-cover-container uk-border-pill uk-box-shadow-small">
                        <img src="<?php echo $urlPath->image($userDetails['user_avatar']); ?>" alt="<?php echo echoOutput($userDetails['user_name']); ?>" uk-cover>
                        <canvas width="130" height="130"></canvas>
                    </div>
                    </div>

                </div>

                <div class="uk-margin uk-margin-remove-top uk-text-center">
                    <div class="uk-flex uk-flex-middle uk-flex-center">
                    <a class="uk-link-reset"><p class="uk-text-bold uk-margin-remove"><?php echo echoOutput($userDetails['user_name']); ?></p></a>
                    </div>
                    <p class="uk-text-muted uk-text-small uk-margin-remove"><?php echo maskEmail($userDetails['user_email']); ?></p>
                </div>

                <hr>

                <ul class="uk-list">
				    <?php if(isAdmin() || isEditor()): ?>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->admin(); ?>"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> <?php echo echoOutput($translation['tr_179']); ?></a></li>
					<?php endif; ?>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->profile('edit'); ?>"><span class="uk-margin-small-right" uk-icon="icon: file-edit"></span> <?php echo echoOutput($translation['tr_180']); ?></a></li>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->profile('favorites'); ?>"><span class="uk-margin-small-right" uk-icon="icon: heart"></span> <?php echo echoOutput($translation['tr_182']); ?></a></li>
                </ul>

                <hr>

                <a class="uk-button uk-button-secondary uk-text-truncate uk-border-rounded uk-width-1-1" href="<?php echo $urlPath->signout(); ?>"
                ><i class="fas fa-lock uk-margin-small-right"></i> <?php echo echoOutput($translation['tr_181']); ?>
            </a>

        </div>

    </div>

<div class="uk-width-expand">

<?php if (!isset($_GET['action'])): ?>

<?php require './views/favorites-profile.view.php'; ?>

<?php endif;?>

<?php if (isEditing()): ?>

<?php require './views/edit-profile.view.php'; ?>

<?php endif;?>

<?php if (isFavorites()): ?>

<?php require './views/favorites-profile.view.php'; ?>

<?php endif;?>


<?php 



if (isLogged()){

if(isset($_SESSION['user_email']) && (($_SESSION['user_email'] == 'mentour4@gmail.com')|| ($_SESSION['user_email'] == 'zukytechcartagena@gmail.com') || ($_SESSION['user_email'] == 'everlismedina@gmail.com'))){


 $statement = $connect->prepare("SELECT * FROM deals_gallery");
	$statement->execute();
    $result = $statement->fetchAll();
    $codigoIMG=0;
   foreach($result as $row){
    $codigoIMG = $row['id'] ;  
   }
   $codigoIMG = $codigoIMG + 1;


echo '<div style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFucaBoV2c&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>
<a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFucaBoV2c&#x2F;view?utm_content=DAFucaBoV2c&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener">deal_id</a> de Cristian cuadrado beltran';
    
$image="
 <br/>
    <br/>
    <br/>
<style>
#contenedor {
      background-color: #f0f0f0; /* Color de fondo */
      padding: 20px; /* Espaciado interno */
      border: 2px solid #333; /* Color y grosor del borde */
    }
</style>



<div id='contenedor' >
 <h2>Subir Imagen</h2>
<p>
1.	Primero presione el botón de seleccionar archivo
</p>
<p>
2.	luego brinda un id a la imagen, este id sera el mismo que le pones al paquete cuando lo estas creando ejemplo: si el paquete tiene el numero 10, todas las imagenes que cargaras seran con id 10
</p>
<p>
3.	luego presiones el botón subir imagen
</p>

    <form action='https://alianzateamcaribe.com/uploadimg.php' method='POST' enctype='multipart/form-data' style='background:green; color:white;margin-color:red;'>
        <input type='hidden' id='id' name='id' value='$codigoIMG'>
        <input type='number' id='item' name='item' placeholder='id de la imagen'>
        <input type='file' id='imagen' name='imagen' accept='.jpg, .jpeg, .png'>
        <input type='submit' value='Subir Imagen'>
    </form>
    <img id='imagenMostrada' alt='Imagen'>
    </div>
    <script>
    // Función para manejar el cambio en el input file
    function cargarImagen() {
      // Obtener el input file
      var inputArchivo = document.getElementById('imagen');

      // Obtener la imagen
      var imagenMostrada = document.getElementById('imagenMostrada');

      // Verificar si se seleccionó un archivo
      if (inputArchivo.files.length > 0) {
        // Obtener el primer archivo seleccionado
        var archivo = inputArchivo.files[0];

        // Obtener la extensión del archivo
        var extension = archivo.name.split('.').pop().toLowerCase();

        // Verificar la extensión
        if (['jpg', 'jpeg', 'png'].includes(extension)) {
          // Si la extensión es válida, asignar la imagen
          var reader = new FileReader();
          reader.onload = function (e) {
            imagenMostrada.src = e.target.result;
          };
          reader.readAsDataURL(archivo);
        } else {
          // Si la extensión no es válida, mostrar un mensaje o realizar otra acción
          alert('Por favor, selecciona un archivo de imagen válido (jpg, jpeg, png).');
        }
      } else {
        // Si no se seleccionó ningún archivo, puedes realizar otra acción
        alert('Por favor, selecciona un archivo.');
      }
    }

    // Asociar la función al evento de cambio en el input file
    document.getElementById('imagen').addEventListener('change', cargarImagen);
  </script>
    <br/>
    <br/>
    <br/>
     <h3>Categorías que maneja el sistema</h3>
     <table class='default' style='border-style: solid;'>
<tr >

    <th>CATEGORÍA</th>

    <th>CODIGO</th>

   

  </tr>
  <tr >

    <td>Hoteles & Toures</td>

    <td>4</td>


  </tr>
<tr >

    <td>Cosas para hacer</td>

    <td>5</td>


  </tr>
  <tr >

    <td>Restaurantes & Baresr</td>

    <td>6</td>


  </tr>
  <tr >

    <td>Salud & Deportes</td>

    <td>7</td>


  </tr>
  <tr >

    <td>Salud & Deportes</td>

    <td>8</td>


  </tr>

 <tr >

    <td>Centros comerciales & Regalos</td>

    <td>9</td>


  </tr>
  
  <tr >

    <td>Servicio de transporte</td>

    <td>10</td>


  </tr>
   <tr >

    <td>parques acuáticos</td>

    <td>11</td>


  </tr>
  
</table>
    
    <br/>
    <br/>
    <br/>
    
    <h2>Crear un plan</h2>
   
    
   
    
    ";    
    
echo $image;
    
    try{
    $statement = $connect->prepare("SELECT * FROM deals");
	$statement->execute();
    $result = $statement->fetchAll();
    $codigo=0;
   foreach($result as $row){
    $codigo = $row['deal_id'] ;  
   }
   $codigo = $codigo + 1;
   $formulario = "<section style='background:#FC206D; width:50%;'>
<form method='post' action='https://alianzateamcaribe.com/upload.php'>
<div style='border: white 3px solid; margin:80px; margin-top:20px;'>

<input type='text' class='form-control' id='deal_id' name='deal_id' value='$codigo' readonly>
<label for='deal_id'>ID</label>

<input type='text'  class='form-control' id='deal_title' name='deal_title' placeholder='deal_title'> 
<label for='deal_title'>Titulo</label>
</div>

<div style='border: white 3px solid; width: 80%; margin:8px;'>

<input type='text' id='deal_seotitle' name='deal_seotitle' placeholder='deal_seotitle'> 
<label for='deal_seotitle'>Titulo seo</label>

<input type='text' id=' deal_seodescription' name='deal_seodescription' placeholder='deal_seodescription'> 
<label for='deal_seodescription'>Descripcion seo</label>
</div>
<div style='margin:8px;'>
<label for='deal_description'>Descripcion</label>
<textarea  id='deal_description' name='deal_description' rows='10' cols='50'    style='width: 99%; height: 109px; resize:none;'         placeholder='deal_description'   ></textarea>
</div>
<div style='width: 70%; margin:8px;'>
<label for='deal_category'>Categoria</label>
<select class='form-group'  name='deal_category' id='deal_category'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
</select>
</div>
<div style='width: 20%; margin:8px;'>
<label for='deal_subcategory'>Sub categoria</label>
<select name='deal_subcategory' id='deal_subcategory'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
  <option value='13'>13</option>
  <option value='14'>14</option>
  <option value='15'>15</option>
  <option value='16'>16</option>
  <option value='17'>17</option>
  <option value='18'>18</option>
  <option value='19'>19</option>
  <option value='20'>20</option>
  <option value='21'>21</option>
  <option value='22'>22</option>
  <option value='23'>23</option>
  <option value='24'>24</option>
  <option value='25'>25</option>
  <option value='26'>26</option>
  <option value='27'>27</option>
  <option value='28'>28</option>
  <option value='29'>29</option>
  <option value='30'>30</option>
  <option value='31'>31</option>
  <option value='32'>32</option>
  <option value='33'>33</option>
  <option value='34'>34</option>
  <option value='35'>35</option>
  <option value='36'>36</option>
  <option value='37'>37</option>
  <option value='38'>38</option>
  <option value='39'>39</option>
  <option value='40'>40</option>
  <option value='41'>41</option>
  <option value='42'>42</option>
  <option value='43'>43</option>
  <option value='44'>44</option>
  <option value='45'>45</option>
  <option value='46'>46</option>
  <option value='47'>47</option>
  <option value='48'>48</option>
  <option value='49'>49</option>
  <option value='50'>50</option>
  <option value='51'>51</option>
  <option value='52'>52</option>
  <option value='53'>53</option>
  <option value='54'>54</option>
  <option value='55'>55</option>
  <option value='56'>56</option>
  <option value='57'>57</option>
  <option value='58'>58</option>
  <option value='59'>59</option>
  <option value='60'>60</option>
  <option value='61'>61</option>
  <option value='62'>62</option>
  <option value='63'>63</option>
  <option value='64'>64</option>
  <option value='65'>65</option>
  <option value='66'>66</option>
  <option value='67'>67</option>
  <option value='68'>68</option>
  <option value='69'>69</option>
  <option value='70'>70</option>
  <option value='71'>71</option>
  <option value='72'>72</option>
  <option value='73'>73</option>
  <option value='74'>74</option>
  <option value='75'>75</option>
  <option value='76'>76</option>
  <option value='77'>77</option>
  <option value='78'>78</option>
  <option value='79'>79</option>
  <option value='80'>80</option>
  <option value='81'>81</option>
  <option value='82'>82</option>
  <option value='83'>83</option>
  <option value='84'>84</option>
  <option value='85'>85</option>
  <option value='86'>86</option>
  <option value='87'>87</option>
  <option value='88'>88</option>
  <option value='89'>89</option>
  <option value='90'>90</option>
  <option value='91'>91</option>
  <option value='92'>92</option>
  <option value='93'>93</option>
  <option value='94'>94</option>
  <option value='95'>95</option>
  <option value='96'>96</option>
  <option value='97'>97</option>
  <option value='98'>98</option>
  <option value='99'>99</option>
  <option value='100'>100</option>
</select>
</div>

<div style='width: 10%; margin:8px;'>
<label for='deal_store'>Store</label>
<select name='deal_store' id='deal_store'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
</select>
</div>
<div style='width: 10%; margin:8px;'>
<label for='deal_location'>Location</label>
<select name='deal_location' id='deal_location'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
</select>
</div>
<div style='width: 80%; margin:10px;'>
<br/><br/>
<label for='deal_slug' style='font-size:10px; font-weight: bold;'>Slug  RECOMENDACIÓN: Crear un slug diferente por cada paquete, ejemplo: bora-bora-beach-club</label>
<input type='text' id='deal_slug' name='deal_slug' placeholder='deal_slug'> 
</div>
<div style='width: 30%; margin:8px;'>
<label for='deal_author'>Author</label>
<select name='deal_author' id='deal_author'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
</select>
</div>
<br/>
<div style='border: white 3px solid; margin:80px;'>

<input type='text' id='deal_image' name='deal_image' placeholder='deal_image.png'> 
<label for='deal_image'>Imagen</label>

<input type='text' id='deal_price' name='deal_price' placeholder='deal_price'> 
<label for='deal_image'>Precio new</label>

<input type='text' id='deal_oldprice' name='deal_oldprice' placeholder='deal_oldprice'> 
<label for='deal_image'>Precio old</label>

<input type='text' id='deal_tagline' name='deal_tagline' placeholder='deal_tagline'>
<label for='deal_image'>Tag</label>

<input type='text' id='deal_link' name='deal_link' placeholder='deal_link'> 
<label for='deal_image'>Link</label>

<input type='text' id='deal_video' name='deal_video' placeholder='deal_video'> 
<label for='deal_image'>Video</label>

<input type='text' id='deal_gif' name='deal_gif' placeholder='deal_gif'> 
<label for='deal_image'>Gif</label>

<input type='date' id='deal_start' name='deal_start' placeholder='aaaa-mm-dd hh:mm:ss'> 
<label for='deal_image'>Inicio</label>

<input type='date' id='deal_expire' name='deal_expire' placeholder='aaaa-mm-dd hh:mm:ss'> 
<label for='deal_expire'>Final</label>
</div>
<div style='width: 70%; margin:8px;'>
<label for='deal_featured'>Featured</label>
<select name='deal_featured' id='deal_featured'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  
</select>
</div>
<div style='width: 70%; margin:8px;'>
<label for='deal_exclusive'>Exclusive</label>

<select name='deal_exclusive' id='deal_exclusive'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
  
</select>
</div>
<div style='width: 70%; margin:8px;'>
<label for='deal_sponsored'>Sponsored</label>
<select name='deal_sponsored' id='deal_sponsored'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>

</select>
</div>
<div style='width: 70%; margin:8px;'>
<label for='deal_status'>Status</label>
<select name='deal_status' id='deal_status'>
  <option value='0' selected>0</option>
  <option value='1'>1</option>
 
</select>
</div>
<div style='border: white 3px solid; margin:80px;'>
<label for='deal_created'>Created</label>
<input type='date' id='deal_created' name='deal_created' placeholder='aaaa-mm-dd hh:mm:ss'>

</div>
<div style='border: white 3px solid; margin:80px;'>
<label for='deal_updated'>Update</label>
<input type='date' id='deal_updated' name='deal_updated' placeholder='aaaa-mm-dd hh:mm:ss'>
</div>
<input type='submit' value='INSERTAR' style='width:100%;'><br/>

</form>
</section>";

echo $formulario;

}catch(PDOException $e){
    echo $e->getMessage();
}
    
echo '<br/>';   
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<style>

/* Estilos para el contenedor con scroll */
.contenedor {
    width: 100%; /* Ancho del contenedor */
    height: 900px; /* Altura del contenedor */
    overflow: scroll; /* Añade una barra de desplazamiento si es necesario */
    background:#E1DADD;
}

/* Estilos para el contenido dentro del contenedor */
.contenido {
    width: 100%; /* Ancho del contenido igual al contenedor */
    padding: 10px; /* Espaciado interno */
}

</style>
<script>
function confirmarEnvio() {
  // Mostrar un cuadro de diálogo de confirmación
  const confirmacion = confirm("¿Estás seguro de que deseas enviar este formulario?");

  // Verificar la respuesta
  if (confirmacion) {
    // El usuario hizo clic en "Aceptar", permite el envío del formulario
    document.getElementById("formdelete").submit();
  } else {
    // El usuario hizo clic en "Cancelar", no permite el envío del formulario
    console.log("Envío de formulario cancelado");
    // Puedes agregar lógica adicional o mensajes aquí
  }
}


</script>
<h2>Editar plan</h2>
<div class="contenedor">
<div class="contenido">
';

try{	
	$statement = $connect->prepare("SELECT * FROM deals");
	$statement->execute();
    $result = $statement->fetchAll();
    
   foreach($result as $row){
      echo '<form method="post" action="https://alianzateamcaribe.com/update.php">'; 
   echo '<input type="text" id="update'.$row['deal_id'].'"         
                            name="update'.$row['deal_id'].'"
                            value="'.$row['deal_id'].'" 
                            readonly>'; 
                            
      echo '<input type="text" id="updatedeal_title'.$row['deal_id'].'" 
                               name="updatedeal_title'.$row['deal_id'].'" 
                               value="'.$row['deal_title'].'">'; 
                               
       echo '<input type="text" id="updatedeal_seotitle'.$row['deal_id'].'" 
                                name="updatedeal_seotitle'.$row['deal_id'].'" 
                                value="'.$row['deal_seotitle'].'">'; 
                                
       echo '<textarea             id="updatedeal_description'.$row['deal_id'].'" 
                                     name="updatedeal_description'.$row['deal_id'].'" 
                                     rows="10" cols="50"  style="width: 704px; height: 213px; resize:none;"  >'
                                     .$row['deal_description'].
             '</textarea>'; 
             
       echo '<input type="text" id="updatedeal_seodescription'.$row['deal_id'].'" 
                               name="updatedeal_seodescription'.$row['deal_id'].'" 
                               value="'.$row['deal_seodescription'].$row['deal_id'].'">'; 
                               
       echo '<input type="text" id="updatedeal_category'.$row['deal_id'].'" 
                                name="updatedeal_category'.$row['deal_id'].'" 
                                value="'.$row['deal_category'].'">'; 
                                
        echo '<input type="text" id="updatedeal_subcategory'.$row['deal_id'].'" 
                                 name="updatedeal_subcategory'.$row['deal_id'].'" 
                                 value="'.$row['deal_subcategory'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_store'.$row['deal_id'].'" 
                                 name="updatedeal_store'.$row['deal_id'].'"  
                                 value="'.$row['deal_store'].'">'; 
                                 
       echo '<input type="text" id="updatedeal_location'.$row['deal_id'].'"
                                name="updatedeal_location'.$row['deal_id'].'"
                                value="'.$row['deal_location'].'">'; 
                                
        echo '<input type="text" id="updatedeal_slug'.$row['deal_id'].'"
                                 name="updatedeal_slug'.$row['deal_id'].'"
                                 value="'.$row['deal_slug'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_author'.$row['deal_id'].'"
                                 name="updatedeal_author'.$row['deal_id'].'"  
                                 value="'.$row['deal_author'].'">'; 
                                 
       echo '<input type="text" id="updatedeal_image'.$row['deal_id'].'"
                                name="updatedeal_image'.$row['deal_id'].'"  
                                value="'.$row['deal_image'].'">'; 
                                
        echo '<input type="text" id="updatedeal_price'.$row['deal_id'].'" 
                                 name="updatedeal_price'.$row['deal_id'].'"
                                 value="'.$row['deal_price'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_oldprice'.$row['deal_id'].'"  
                                 name="updatedeal_oldprice'.$row['deal_id'].'" 
                                 value="'.$row['deal_oldprice'].'">'; 
                                 
       echo '<input type="text" id="updatedeal_tagline'.$row['deal_id'].'" 
                                name="updatedeal_tagline'.$row['deal_id'].'" 
                                value="'.$row['deal_tagline'].'">'; 
                                
        echo '<input type="text" id="updatedeal_link'.$row['deal_id'].'" 
                                 name="updatedeal_link'.$row['deal_id'].'" 
                                 value="'.$row['deal_link'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_video'.$row['deal_id'].'" 
                                 name="updatedeal_video'.$row['deal_id'].'"  
                                 value="'.$row['deal_video'].'">'; 
                                 
       echo '<input type="text" id="updatedeal_gif'.$row['deal_id'].'"  
                                 name="updatedeal_gif'.$row['deal_id'].'"
                                 value="'.$row['deal_gif'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_start'.$row['deal_id'].'"
                                 name="updatedeal_start'.$row['deal_id'].'"  
                                 value="'.$row['deal_start'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_expire'.$row['deal_id'].'"
                                 name="updatedeal_expire'.$row['deal_id'].'"   
                                 value="'.$row['deal_expire'].'">';
                                 
       echo '<input type="text" id="updatedeal_featured'.$row['deal_id'].'"
                                name="updatedeal_featured'.$row['deal_id'].'"  
                                value="'.$row['deal_featured'].'">'; 
                                
        echo '<input type="text" id="updatedeal_exclusive'.$row['deal_id'].'"  
                                 name="updatedeal_exclusive'.$row['deal_id'].'"
                                 value="'.$row['deal_exclusive'].'">'; 
                                 
        echo '<input type="text" id="updatedeal_sponsored'.$row['deal_id'].'" 
                                 name="updatedeal_sponsored'.$row['deal_id'].'"  
                                 value="'.$row['deal_sponsored'].'">'; 
                                 
       echo '<input type="text" id="updatedeal_status'.$row['deal_id'].'"
                                name="updatedeal_status'.$row['deal_id'].'" 
                                value="'.$row['deal_status'].'">'; 
                                
        echo '<input type="text" id="updatedeal_created'.$row['deal_id'].'" 
                                 name="updatedeal_created'.$row['deal_id'].'" 
                                 value="'.$row['deal_created'].'">';
                                 
        echo '<input type="text" id="updatedeal_updated'.$row['deal_id'].'"
                                 name="updatedeal_updated'.$row['deal_id'].'" 
                                 value="'.$row['deal_updated'].'">';
                                 
        echo '<input type="submit" value="ACTUALIZAR" style="width:200px; background:green;">';  
       
        echo '</form>
        <form method="post" id="formdelete" action="https://alianzateamcaribe.com/delete.php">
                           <input type="hidden" name="delete'.$row['deal_id'].'" 
                                                id="delete'.$row['deal_id'].'"
                                                value="'.$row['deal_id'].'" readonly>
                           <input type="submit" onclick="confirmarEnvio()" value="ELIMINAR" style="background:red;">
        </form><br/>
        ';
       
   }
    
    
	
}catch(PDOException $e){
    echo $e->getMessage();
}
echo '
</div>
</div>
';
}	
	
}




?>

</div>

</div>
</div>

<!-- END PAGE CONTENT -->

<!-- FOOTER -->

<?php require './sections/footer.php'; ?>
