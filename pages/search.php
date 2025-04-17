<?php

$getLocations = getLocations($connect, 10);
$getCategories = getCategories($connect);
$getStores = getStores($connect, 20);

$getResults = getSearch($connect, $site_config['page_limit']);

$items = $getResults['items'];
$total = $getResults['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

require './pages/views/search.view.php';

?>