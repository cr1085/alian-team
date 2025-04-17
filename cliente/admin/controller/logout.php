<?php 

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

require '../../config.php';
require '../functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){
    
	session_start();

	session_destroy();
	$_SESSION = array ();

	header('Location: ./login.php');

}else{

    header('Location:'.SITE_URL);
}




?>