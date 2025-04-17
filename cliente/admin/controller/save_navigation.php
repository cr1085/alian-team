<?php

require '../../config.php';
require '../functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){

$menu = $_GET['menu'];

if (isset($_POST)) {
    
    $connect = mysqli_connect($database['host'], $database['user'], $database['pass'], $database['db']);

    $arrayItems = $_POST['item'];
    $order = 0;

    foreach ($arrayItems as $item) {
        $sql = "UPDATE navigations SET navigation_order='$order' WHERE navigation_id='$item'";
        mysqli_query($connect, $sql);
        $order++;
    }

    echo _CHANGESSAVED;
    mysqli_close($connect);
}

}else{

    header('Location:'.SITE_URL);
}

?>

