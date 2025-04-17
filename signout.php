<?php

require './core.php';

if (isLogged()){
  
  session_start();

  session_destroy();
  $_SESSION = array ();

  header('Location: '. $urlPath->home());

}else{

  header('Location: '. $urlPath->home());

}

?>