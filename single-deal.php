<?php

require "core.php";

// Get Item Slug
$itemId = clearGetData(getItemId());

if(empty($itemId)){

	header('Location: '. $urlPath->home());
}

// Page Details
$itemDetails = getDealById($connect, $itemId);

if(empty($itemDetails)){

	header('Location: '. $urlPath->error());
}

$itemsGallery = getItemsGallery($connect, $itemId);

// Seo Title
$titleSeoHeader = getSeoTitle(empty($itemDetails['deal_seotitle']) ? $itemDetails['deal_title'] : $itemDetails['deal_seotitle']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDetails['deal_description'], $itemDetails['deal_seodescription']);

// Page Title
$pageTitle = $itemDetails['deal_title'];

if (isLogged()) {

$isFav = isInFav($connect, $userInfo['user_id'], $itemId);

}

include './header.php';
require './views/single-deal.view.php';
include './footer.php';

?>