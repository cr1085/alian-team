<?php

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

use voku\helper\AntiXSS;

require_once __DIR__ . '/classes/anti-xss/autoload.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function connect(){

    global $database;

    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function isLogged(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {
        return true;
    }else{
        return false;
    }
}

function isAdmin(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 1 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

    }else{
        return false;
    }

}

function isEditor(){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 2 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

}

function isExclusive($value){
    
    if($value == 1){
        return true;
    }else{
        return false;
    }
}

function isVerified($value){
    
    if($value == 1){
        return true;
    }else{
        return false;
    }
}

function isEditing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit';
}

function isFavorites(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'favorites';
}

function getStrings($connect){

        $sentence = $connect->query("SELECT * FROM translations");
        $row = $sentence->fetch(PDO::FETCH_ASSOC);
        return $row;
}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function textTruncate($data, $chars) {
    if(strlen($data) > $chars) {
        $data = $data.' ';
        $data = substr($data, 0, $chars);
        $data = $data.'...';
    }
    return $data;
}

function echoNoHtml($data){
    $data = strip_tags($data);
    $data = htmlentities($data, ENT_QUOTES, "UTF-8");
    $data = substr($data, 0, 255);
    return $data;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function lengthInput($data, $min, $max = NULL){

    $characters = strlen($data);
    $spaces = preg_match('/\s/',$data);

    if ($max) {
        if ($characters >= $min && $characters <= $max && !$spaces) {
            return true;
        }else{
            return false;
        }
    }else{

        if ($characters >= $min && !$spaces) {
            return true;
        }else{
            return false;
        }
    }
}

function validateInput($data){

    $specialChars = preg_match('@[^\w]@', $data);

    if ($specialChars) {
        return true;
    }else{
        return false;
    }
}

function getCurrentPageSlug(){
    
    return isset($_GET['slug']) && !empty($_GET['slug']) ? clearGetData($_GET['slug']) : NULL;
}

function getNumPage(){
    
    return isset($_GET['p']) && !empty($_GET['p']) && (int)$_GET['p'] ? clearGetData($_GET['p']) : 1;
}

function getItemId(){
    
    return isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : NULL;
}

function getFilterParam(){
    
    return isset($_GET['filter']) && !empty($_GET['filter']) && $_GET['filter'] ? clearGetData($_GET['filter']) : NULL;
}

function getIDCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getIDLocation(){
    
    return isset($_GET['location']) && !empty($_GET['location']) && $_GET['location'] ? clearGetData($_GET['location']) : NULL;
}

function getIDStore(){
    
    return isset($_GET['store']) && !empty($_GET['store']) && $_GET['store'] ? clearGetData($_GET['store']) : NULL;
}

function getIDRating(){
    
    return isset($_GET['rating']) && !empty($_GET['rating']) && $_GET['rating'] ? clearGetData($_GET['rating']) : NULL;
}

function getIDPrice(){
    
    return isset($_GET['price']) && !empty($_GET['price']) && $_GET['price'] ? clearGetData($_GET['price']) : NULL;
}

function getIDSubCategory(){
    
    return isset($_GET['subcategory']) && !empty($_GET['subcategory']) && $_GET['subcategory'] ? clearGetData($_GET['subcategory']) : NULL;
}

function getIDUser(){
    
    return isset($_GET['user']) && !empty($_GET['user']) && $_GET['user'] ? clearGetData($_GET['user']) : NULL;
}

function getSortBy($value){

   if (isset($_GET['sortby']) && $_GET['sortby'] === $value) {
       
       return "value = '$value' selected";
   }

   return "value = '$value'";
}

function getSlugItem(){
    
    return isset($_GET['slug']) && !empty($_GET['slug']) && $_GET['slug'] ? clearGetData($_GET['slug']) : NULL;
}

function getSearchQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) && $_GET['query'] ? clearGetData($_GET['query']) : NULL;
}

function getSlugCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getSlugSubCategory(){
    
    return isset($_GET['subcategory']) && !empty($_GET['subcategory']) && $_GET['subcategory'] ? clearGetData($_GET['subcategory']) : NULL;
}

function getSlugLocation(){
    
    return isset($_GET['location']) && !empty($_GET['location']) && $_GET['location'] ? clearGetData($_GET['location']) : NULL;
}

function getSlugStore(){
    
    return isset($_GET['store']) && !empty($_GET['store']) && $_GET['store'] ? clearGetData($_GET['store']) : NULL;
}

function getParamsSort(){
    
    return isset($_GET['sortby']) && !empty($_GET['sortby']) ? clearGetData($_GET['sortby']) : NULL;
}

function formatDate($date){

    $sentence = connect()->prepare("SELECT st_dateformat FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $newDate = date($row['st_dateformat'], strtotime($date));
    return echoOutput($newDate);
}

function generatePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function maskEmail($email){

    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function getUserInfo($connect, $userEmail = NULL){

    if (!$userEmail) {

        $email = filter_var(strtolower($_SESSION['user_email']), FILTER_VALIDATE_EMAIL);

    }else{

        $email = filter_var(strtolower($userEmail), FILTER_VALIDATE_EMAIL);
    }
    
    if ($email) {

        $sentence = $connect->prepare("SELECT * FROM users WHERE user_status = 1 AND user_email = '".$email."' LIMIT 1");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row;

    }else{

        return null;
    }
}

function isUserVerified($userEmail){

    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = '".$userEmail."' AND user_verified = 1 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        return true;
    }else{
        return false;
    }
}

function getGravatar($email, $s = 150, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function numTotalPages($total_items, $items_page){

    $numPages = ceil($total_items / $items_page);
    return $numPages;
}

function countFormat($num) {

      if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;
    }

  return $num;
}

function getSocialMedia($connect){
    
    $sentence = $connect->prepare("SELECT st_facebook,st_twitter,st_youtube,st_instagram,st_linkedin,st_whatsapp FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function isInFav($connect, $userId, $itemId){
    $sentence = $connect->query("SELECT * FROM favorites WHERE user = '".$userId."' AND item = '".$itemId."' LIMIT 1");
    $sentence = $sentence->fetch();
    return ($sentence) ? true : false;
}

function getDateByTimeZone(){

    $sentence = connect()->prepare("SELECT st_timezone FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $date = new DateTime("now", new DateTimeZone($row['st_timezone']) );

    return $date->format('Y-m-d H:i');

}

/*------------------------------------------------------------ */
/* SITE */
/*------------------------------------------------------------ */

function getSeoTitle($pageTitle = NULL, $pageSubTitle = NULL){

    if (!$pageSubTitle && empty($pageSubTitle)) {
        
        return $pageTitle;
        
    }elseif(!$pageTitle && empty($pageTitle)){

        return $pageSubTitle;

    }elseif($pageTitle && !empty($pageTitle) && $pageSubTitle && !empty($pageSubTitle)){

        return $pageSubTitle.' - '.$pageTitle;

    }else{

        return null;
    }
}

function getSeoDescription($generalDescription, $itemDescription = NULL, $seoDescription = NULL){

    if (!$itemDescription && empty($itemDescription) && !$seoDescription && empty($seoDescription)) {
        
        return echoNoHtml($generalDescription);
        
    }else{

        if ($seoDescription && !empty($seoDescription)) {

            return echoNoHtml($seoDescription);

        }else{

            return echoNoHtml($itemDescription);
        }

    }
}

/*------------------------------------------------------------ */
/* CONTENT */
/*------------------------------------------------------------ */

function getUserInfoById($connect, $id){
    $sentence = $connect->prepare("SELECT users.* FROM users WHERE user_status = 1 AND user_id = $id LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getLocationBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM locations WHERE location_status = 1 AND location_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getTotalDealsByLocation($itemId){
    $sentence = connect()->prepare("SELECT COUNT(*) AS total FROM deals WHERE deals.deal_location = '".$itemId."' AND deal_status = 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['total'];

}

function getReviewsByLocation($itemId){
    $sentence = connect()->prepare("SELECT SQL_CALC_FOUND_ROWS AVG(rating) AS rating, COUNT(*) AS total FROM reviews WHERE reviews.item = (SELECT deals.deal_id FROM deals WHERE deals.deal_location = '".$itemId."' LIMIT 1) AND reviews.status = 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['rating'];

}


function getUserFavorites($connect, $userId){
    $sentence = $connect->prepare("SELECT deals.*, favorites.* FROM deals,favorites WHERE favorites.user = '".$userId."' AND favorites.item = deals.deal_id GROUP BY deals.deal_id");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFeaturedDeals($connect, $limit){

    $sentence = $connect->query("SELECT deals.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON store_id = stores.store_id LEFT JOIN locations ON location_id = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id WHERE deals.deal_status = 1 AND deals.deal_featured = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getDealById($connect, $itemId){

    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews, categories.*, subcategories.*, stores.*, locations.*, users.user_name AS author_name FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON deal_store = stores.store_id LEFT JOIN locations ON deal_location = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id AND reviews.status = 1 WHERE deals.deal_status = 1 AND deals.deal_id = $itemId LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getItemsGallery($connect, $itemId){

    $sentence = $connect->query("SELECT * FROM deals_gallery WHERE item = $itemId ORDER BY created DESC");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getLatestDeals($connect, $limit){

    $sentence = $connect->query("SELECT deals.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON deal_store = stores.store_id LEFT JOIN locations ON deal_location = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id WHERE deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getExclusiveDeals($connect, $limit){

    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name FROM deals LEFT JOIN categories ON deals.deal_category = categories.category_id LEFT JOIN stores ON deals.deal_store = stores.store_id LEFT JOIN locations ON deals.deal_location = locations.location_id LEFT JOIN users ON deals.deal_author = users.user_id LEFT JOIN subcategories ON deals.deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_status = 1 AND deals.deal_exclusive = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getRelatedDeals($connect, $itemId){

    $sentence = $connect->query("SELECT deals.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name FROM deals LEFT JOIN categories ON deals.deal_category = categories.category_id LEFT JOIN stores ON deals.deal_store = stores.store_id LEFT JOIN locations ON deals.deal_location = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deals.deal_subcategory = subcategories.subcategory_id WHERE deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') AND deals.deal_id != $itemId GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT 6");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFeaturedStores($connect){
    $sentence = $connect->prepare("SELECT stores.*, (SELECT COUNT(*) FROM deals WHERE deals.deal_store = stores.store_id AND deal_status = 1) AS total_items FROM stores WHERE stores.store_featured = 1 AND stores.store_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFeaturedLocations($connect){
    $sentence = $connect->prepare("SELECT locations.*, (SELECT COUNT(*) FROM deals WHERE deals.deal_location = locations.location_id AND deal_status = 1) AS total_items FROM locations WHERE locations.location_featured = 1 AND locations.location_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getLocations($connect, $limit = NULL){

    if($limit){
        $sentence = $connect->prepare("SELECT * FROM locations WHERE locations.location_status = 1 LIMIT $limit");
    }else{
        $sentence = $connect->prepare("SELECT * FROM locations WHERE locations.location_status = 1");
    }

    $sentence->execute();
    return $sentence->fetchAll();
}

function getStores($connect, $limit = NULL){

    if($limit){
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE stores.store_status = 1 LIMIT $limit");
    }else{
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE stores.store_status = 1");
    }

    $sentence->execute();
    return $sentence->fetchAll();
}

function getStoresByLetter($connect, $letter = NULL){

    if(!$letter){
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE store_status = 1 AND store_title REGEXP '^[0-9]'");
    }else{
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE store_status = 1 AND store_title LIKE '".$letter."%'");
    }

    $sentence->execute();
    return $sentence->fetchAll();
}

function getLocationsByLetter($connect, $letter = NULL){

    if(!$letter){
        $sentence = $connect->prepare("SELECT locations.* FROM locations WHERE location_status = 1 AND location_title REGEXP '^[0-9]'");
    }else{
        $sentence = $connect->prepare("SELECT locations.* FROM locations WHERE location_status = 1 AND location_title LIKE '".$letter."%'");
    }

    $sentence->execute();
    return $sentence->fetchAll();
}

function getSliders($connect){
    $sentence = $connect->prepare("SELECT * FROM sliders WHERE sliders.slider_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getMenuCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_menu = 1 AND categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFeaturedCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_featured = 1 AND categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getTagCategoryBySlug($slug){
    $sentence = connect()->prepare("SELECT * FROM categories WHERE category_status = 1 AND category_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();

    if($row){
        return $row['category_title'];
    }else{
        return false;
    }

}

function getTagSubCategoryBySlug($slug){
    $sentence = connect()->prepare("SELECT * FROM subcategories WHERE subcategory_status = 1 AND subcategory_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();

    if($row){
        return $row['subcategory_title'];
    }else{
        return false;
    }
}

function getTagLocationBySlug($slug){
    $sentence = connect()->prepare("SELECT * FROM locations WHERE location_status = 1 AND location_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();

    if($row){
        return $row['location_title'];
    }else{
        return false;
    }
}

function getTagStoreBySlug($slug){
    $sentence = connect()->prepare("SELECT * FROM stores WHERE store_status = 1 AND store_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();

    if($row){
        return $row['store_title'];
    }else{
        return false;
    }
}

function getSubCategories($connect, $parent){
    $sentence = $connect->prepare("SELECT subcategories.*, categories.category_id AS category_id FROM subcategories, categories WHERE subcategories.subcategory_parent = $parent AND subcategories.subcategory_status = 1 GROUP BY subcategories.subcategory_id");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getReviewsByDeal($connect, $itemId){

    $sentence = $connect->query("SELECT reviews.*, users.* FROM reviews LEFT JOIN users ON users.user_id = reviews.user WHERE item = $itemId AND reviews.status = 1 ORDER BY verified DESC, created DESC LIMIT 6");
    $sentence->execute();
    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $results = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return array('results' => $results, 'total' => $total);
}

function getReviewsByDealAjax($connect, $itemId, $limit){

    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS reviews.*, users.* FROM reviews LEFT JOIN users ON users.user_id = reviews.user WHERE item = $itemId AND reviews.status = 1 ORDER BY verified DESC, created DESC LIMIT 0,".$limit);
    $sentence->execute();
    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $results = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return array('results' => $results, 'total' => $total);

}

function getLikesCountById($id){
    $sentence = connect()->prepare("SELECT COUNT(*) AS total FROM likes WHERE item = $id"); 
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['total'];
}

function getSearch($connect, $items_per_page){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, CAST(deals.deal_price AS UNSIGNED) AS price, CAST(deals.deal_oldprice AS UNSIGNED) AS oldprice, categories.*, subcategories.*, stores.*, locations.*, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews FROM deals LEFT JOIN categories ON deals.deal_category = categories.category_id LEFT JOIN stores ON deals.deal_store = stores.store_id LEFT JOIN locations ON deals.deal_location = locations.location_id LEFT JOIN users ON deals.deal_author = users.user_id LEFT JOIN subcategories ON deals.deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '')";

    if(getSlugCategory()){

        $sqlQuery .= " AND deals.deal_category = (SELECT categories.category_id FROM categories WHERE categories.category_slug = '".getSlugCategory()."' LIMIT 1) ";
    }

    if(getSearchQuery()){

        $sqlQuery .= " AND deals.deal_title LIKE '%".getSearchQuery()."%'";
    }

    if(getSlugSubCategory()){

        $sqlQuery .= " AND deals.deal_subcategory = (SELECT subcategories.subcategory_id FROM subcategories WHERE subcategories.subcategory_slug = '".getSlugSubCategory()."' LIMIT 1) ";
    }

    if(getSlugLocation()){

        $sqlQuery .= " AND deals.deal_location = (SELECT locations.location_id FROM locations WHERE locations.location_slug = '".getSlugLocation()."' LIMIT 1) ";
    }

    if(getSlugStore()){

        $sqlQuery .= " AND deals.deal_store = (SELECT stores.store_id FROM stores WHERE stores.store_slug = '".getSlugStore()."' LIMIT 1) ";
    }

    if(getIDRating() && getIDRating() != "all"){

        $sqlQuery .= " AND rating >= '".getIDRating()."'";
    }

    if(getFilterParam() && getFilterParam() == "exclusive"){

        if(getFilterParam() == "exclusive"){
            $sqlQuery .= " AND deals.deal_exclusive = 1";
        }elseif(getFilterParam() == "featured"){
            $sqlQuery .= " AND deals.deal_featured = 1";
        }else{
            return NULL;
        }
        
    }

    if(getIDPrice() && getIDPrice() != "all"){

        $values = explode(',', getIDPrice());
        $from = (isset($values[0]) ? $values[0] : "0");
        $to = (isset($values[1]) ? $values[1] : "999999999");

        $sqlQuery .= " AND CAST(deals.deal_price AS UNSIGNED) BETWEEN '".$from."' AND '".$to."'";
    }

    $sqlQuery .= " GROUP BY deals.deal_id";

    if (getParamsSort()) {

        if(getParamsSort() == 'relevance') {

            $sqlQuery .= " ORDER BY deals.deal_created DESC";

        }elseif(getParamsSort() == 'price-asc') {

            $sqlQuery .= " ORDER BY price ASC";

        }elseif (getParamsSort() == 'price-desc') {

            $sqlQuery .= " ORDER BY price DESC";

        }elseif (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_reviews DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY deals.deal_created DESC";
    }

    $sqlQuery .= " LIMIT $limit, $items_per_page";

    $sentence = $connect->prepare($sqlQuery);

    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getDealsByStore($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, CAST(deals.deal_price AS UNSIGNED) AS price, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews FROM deals LEFT JOIN categories ON deals.deal_category = categories.category_id LEFT JOIN stores ON deals.store_id = stores.store_id LEFT JOIN locations ON deals.deal_location = locations.location_id LEFT JOIN users ON deals.deal_author = users.user_id LEFT JOIN subcategories ON deals.deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_store = '".$itemId."' AND deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getDealsByLocation($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, CAST(deals.deal_price AS UNSIGNED) AS price, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews FROM deals LEFT JOIN categories ON deals.deal_category = categories.category_id LEFT JOIN stores ON deals.deal_store = stores.store_id LEFT JOIN locations ON deals.deal_location = locations.location_id LEFT JOIN users ON deals.deal_author = users.user_id LEFT JOIN subcategories ON deals.deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_location = '".$itemId."' AND deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getDealsByCategory($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, CAST(deals.deal_price AS UNSIGNED) AS price, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON store_id = stores.store_id LEFT JOIN locations ON location_id = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_category = '".$itemId."' AND deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getDealsBySubCategory($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS deals.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS deal_rating, CAST(deals.deal_price AS UNSIGNED) AS price, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, locations.location_title AS location_title, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = deals.deal_id AND reviews.status = 1) AS total_reviews FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON store_id = stores.store_id LEFT JOIN locations ON location_id = locations.location_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_subcategory = '".$itemId."' AND deals.deal_status = 1 AND deals.deal_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < deals.deal_expire OR deals.deal_expire IS NULL OR deals.deal_expire = '') GROUP BY deals.deal_id ORDER BY deals.deal_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

/*------------------------------------------------------------ */
/* SITEMAP */
/*------------------------------------------------------------ */

function getPages($connect){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1");
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getDeals($connect){
    
    $sqlQuery = "SELECT deals.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_id AS store_id, stores.store_title AS store_title, stores.store_image AS store_image, stores.store_slug AS store_slug, users.user_name AS author_name FROM deals LEFT JOIN categories ON deal_category = categories.category_id LEFT JOIN stores ON deal_store = stores.store_id LEFT JOIN users ON deal_author = users.user_id LEFT JOIN subcategories ON deal_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = deals.deal_id WHERE deals.deal_status = 1 GROUP BY deals.deal_id ORDER BY deals.deal_created DESC";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getSubCategoriesSiteMap($connect){
    $sentence = $connect->prepare("SELECT subcategories.* FROM subcategories WHERE subcategories.subcategory_status = 1");
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

/*------------------------------------------------------------ */
/* ADS */
/*------------------------------------------------------------ */

function getHeaderAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'header' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFooterAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'footer' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getSidebarAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'sidebar' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getSettings($connect){
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getTheme($connect){
    
    $sentence = $connect->prepare("SELECT * FROM theme"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getDefaultPage($connect, $page){

    if($page){

        $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = '".$page."' LIMIT 1");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row;

    }else{
        return NULL;
    }

}

function getPageBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_slug = '".$slug."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getPageByID($connect, $id_page){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = $id_page LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getSidebarMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_sidebar = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getHeaderMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_header = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getFooterMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_footer = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getNavigation($connect, $idMenu){
    
    $sentence = $connect->prepare("SELECT navigations.navigation_id, navigations.navigation_page, navigations.navigation_target, COALESCE(pages.page_slug, navigations.navigation_url) AS navigation_url, COALESCE(pages.page_title, navigations.navigation_label) AS navigation_label, navigations.navigation_type FROM navigations LEFT JOIN pages ON page_id = navigations.navigation_page WHERE navigation_menu = '".$idMenu."' ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getEmailTemplate($connect, $id){

    if (!empty($id) && (int)($id)) {

        $q = $connect->query("SELECT * FROM emailtemplates WHERE email_id = ".$id." LIMIT 1");
        $f = $q->fetch();
        $result = $f;

        if ($result['email_disabled'] == 1) {
            return null;
        }else{
            return $result;
        }
    }else{

        return null;
    }  

}

function sendMail($array_content, $email_content, $destinationmail, $fromName, $subject, $isHtml, $replyToName = NULL, $replyToAddress = NULL) {
    
    $sentence = connect()->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    $settings = $sentence->fetch();
    
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                          
        $mail->Host       = $settings['st_smtphost'];                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $settings['st_smtpemail'];              
        $mail->Password   = $settings['st_smtppassword'];                             
        $mail->SMTPSecure = $settings['st_smtpencrypt'];
        $mail->Port       = $settings['st_smtpport'];

        if (isset($replyToAddress, $replyToName) && !empty($replyToAddress) && !empty($replyToName)) {
            $mail->addReplyTo($replyToAddress, $replyToName);
        }

        $mail->setFrom($settings['st_smtpemail'], $fromName);
        $mail->CharSet = "UTF-8";
        $mail->AddAddress($destinationmail); 
        $mail->isHTML($isHtml);

        $find = array_keys($array_content);
        $replace = array_values($array_content);

        $mailcontent = str_replace($find, $replace, $email_content);
        $mailsubject = str_replace($find, $replace, $subject);

        $mail->Subject = $mailsubject;
        $mail->Body = $mailcontent;
        if (!$mail->send()){

            $result = $mail->ErrorInfo;
            
        }else{

            $result = 'TRUE';
        }

        return $result;

    } catch (Exception $e) {
     return $e;
    }

}

function getPercent($newprice, $oldprice){

    $new = str_replace(',', '.', echoOutput($newprice));
    $old = str_replace(',', '.', echoOutput($oldprice));

    $sentence = connect()->prepare("SELECT * FROM translations");
    $sentence->execute();
    $row = $sentence->fetch();

    $calc = (($old - $new) / $old) * 100;
    $percent = round(abs($calc));
    return $percent.$row['tr_9'];
}

function getPrice($price){

    $output = "";
    $sentence = connect()->prepare("SELECT st_currency, st_currencyposition, st_decimalnumber, st_decimalseparator FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $num = str_replace(',', '.', echoOutput($price));

    if($row['st_decimalnumber'] != 0){

        if ($row['st_currencyposition'] == 'left') {
            $output = $row['st_currency'] . rtrim(rtrim(number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator'], $row['st_decimalseparator']), 0), $row['st_decimalseparator']);
        }elseif ($row['st_currencyposition'] == 'left-space') {
            $output = $row['st_currency'] .' '. rtrim(rtrim(number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator'], $row['st_decimalseparator']), 0), $row['st_decimalseparator']);
        }elseif ($row['st_currencyposition'] == 'right') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator'], $row['st_decimalseparator']), 0), $row['st_decimalseparator']) . $row['st_currency'];
        }elseif ($row['st_currencyposition'] == 'right-space') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator'], $row['st_decimalseparator']), 0), $row['st_decimalseparator']) .' '. $row['st_currency'];
        }

    }else{

        if ($row['st_currencyposition'] == 'left') {
            $output = $row['st_currency'] . number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator']);
        }elseif ($row['st_currencyposition'] == 'left-space') {
            $output = $row['st_currency'] .' '. number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator']);
        }elseif ($row['st_currencyposition'] == 'right') {
            $output = number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator']) . $row['st_currency'];
        }elseif ($row['st_currencyposition'] == 'right-space') {
            $output = number_format($num, $row['st_decimalnumber'], $row['st_decimalseparator']) .' '. $row['st_currency'];
        }

    }

    return $output;
}

function getPriceNoCurrency($price){

    $output = "";
    $sentence = connect()->prepare("SELECT st_currency, st_currencyposition, st_decimalnumber, st_decimalseparator FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $num = str_replace(',', '.', echoOutput($price));

    if($row['st_decimalnumber'] != 0){

        if ($row['st_currencyposition'] == 'left') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], '.', '.'), 0), '.');
        }elseif ($row['st_currencyposition'] == 'left-space') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], '.', '.'), 0), '.');
        }elseif ($row['st_currencyposition'] == 'right') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], '.', '.'), 0), '.');
        }elseif ($row['st_currencyposition'] == 'right-space') {
            $output = rtrim(rtrim(number_format($num, $row['st_decimalnumber'], '.', '.'), 0), '.');
        }

    }else{

        if ($row['st_currencyposition'] == 'left') {
            $output = number_format($num, $row['st_decimalnumber'], '.');
        }elseif ($row['st_currencyposition'] == 'left-space') {
            $output = number_format($num, $row['st_decimalnumber'], '.');
        }elseif ($row['st_currencyposition'] == 'right') {
            $output = number_format($num, $row['st_decimalnumber'], '.');
        }elseif ($row['st_currencyposition'] == 'right-space') {
            $output = number_format($num, $row['st_decimalnumber'], '.');
        }

    }

    return $output;
}

function memberSince($date){

    $timestamp = strtotime($date);
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    //$date = "$day " . $months[$month] . " $year";
    $date = $months[$month] . " $year";
    return $date;
}

function getIcon($icon){

    if(empty($icon)){
        $output = "ti ti-minus";
        return $output;
    }else{
        $output = "ti ti-".$icon;
        return $output;
    }

}

function formatRating($value){

    if(!empty($value)){

        if($value <= 5){
            $starRating = number_format(echoOutput($value), 1);
            return $starRating;
        }else{
            return "5.0";
        }

    }else{
        return false;
    }

}

function showStars($value){

    $totalRating = 5;
    $starRating = number_format($value, 1);

    for ($i = 1; $i <= $totalRating; $i++) {
         if($starRating < $i ) {
            if((round($starRating) == $i)){
            echo "<i class='ion-ios-star-half'></i>";
            }else{
            echo "<i class='ion-ios-star-outline'></i>";
            }
         }else {
            echo "<i class='ion-ios-star'></i>";
         }
    }

}

function firstLetter($string){

    $output = $string[0];

    if(!empty($string) && !ctype_digit($output)){
    return $output;
    }else{
        return "A";
    }
}

function isExpired($date){

if(!empty($date)){

    if(getDateByTimeZone() < $date){
        return false;
    }else{
        return true;
    }
}else{
    return false;
}

}

function isNew($date){

    if(!empty($date)){

        $date1 = date_create($date);
        $date2 = date_create(getDateByTimeZone());
        $diff = date_diff($date1, $date2);

        $daydiff = abs(round((strtotime($date) - strtotime(getDateByTimeZone()))/86400));

        if($daydiff < 7){
            return true;
        }else{
            return false;
        }

}else{
    return false;
}
    
}

function timeLeft($date){

    if(!empty($date)){

            $sentence = connect()->prepare("SELECT * FROM translations");
            $sentence->execute();
            $row = $sentence->fetch();

            $date1 = date_create($date);
            $date2 = date_create(getDateByTimeZone());
            $diff = date_diff($date1, $date2);

            $hour = $diff->h;
            $minutes = $diff->i;

            $hourdiff = round((strtotime($date) - strtotime(getDateByTimeZone()))/3600, 1);

            if((int)$hourdiff  < 24 && (int)$hourdiff >= 1){
                return $hour.' '.$row['tr_17'];
            }elseif((int)$hourdiff = 0 || (int)$hourdiff <= 1){
                return $minutes.' '.$row['tr_18'];
            }else{
                return false;
            }

    }else{
        return false;
    }
}

function getCountDown($date){

    $sentence = connect()->prepare("SELECT st_timezone FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $datetime= date_create($date, timezone_open($row['st_timezone']));
    $fecha = $datetime->format(DateTime::ATOM); // Updated ISO8601
    return $fecha;

}

$arrayLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']

?>