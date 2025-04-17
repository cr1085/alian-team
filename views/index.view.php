
<?php 

$whatssapp="<style>
        
         .whatsapp-button {
            position: fixed;
            bottom: 20px; /* Ajusta la posición vertical según tus preferencias */
            right: 20px; /* Ajusta la posición horizontal según tus preferencias */
            z-index: 1000;
            background-color: #25d366; /* Color de fondo de WhatsApp */
            color: #fff; /* Color del texto */
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            text-align: center;
            font-size: 30px;
            line-height: 60px;
            cursor: pointer;
        }
 
    </style>";
    
echo $whatssapp;

?>


<a class="whatsapp-button" href="https://wa.link/327633" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <img src="../../images/logowhatsapp2-removebg-preview.png" width="40px" height="40px"  alt="X">
</a>
    
    
<!-- HEADER -->

<?php require './sections/header.php'; ?>

<!-- HOME -->
<?php require './sections/home.php'; ?>

<!-- CONTENT -->
<?php require './sections/exclusive-deals.php'; ?>
<?php require './sections/featured-deals.php'; ?>
<?php require './sections/featured-categories.php'; ?>
<?php require './sections/latest-deals.php'; ?>
<?php require './sections/featured-stores.php'; ?>
<?php require './sections/featured-locations.php'; ?>
<?php require './sections/categories.php'; ?>


<!-- FOOTER -->
<?php require './sections/footer.php'; ?>