<?php

require '../../config.php';
require '../admin_config.php';
require '../functions.php';

$connect = connect($database);

$data = get_all_email_templates($connect);

$results = array(
    "sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);
echo json_encode($results);

?>
