<?php 

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

require '../config.php';
require './functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){

    header('Location: ./controller/home.php');

}else{
    
    header('Location: ./controller/login.php');
}

?>