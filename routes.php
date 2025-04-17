<?php

class Routes {

    public function __construct() {

        $this->domain = SITE_URL;
        $this->search = SEARCH_PAGE;
        $this->privacy = PRIVACY_PAGE;
        $this->terms = TERMS_PAGE;
        $this->categories = CATEGORIES_PAGE;
        $this->locations = LOCATIONS_PAGE;
        $this->stores = STORES_PAGE;
    }

// Assets

    public function image($src = NULL) {

        if(!$src){
        
        return $this->domain.'/images/';

        }else{
        
        return $this->domain.'/images/'. $src;

        }

    }

    public function assets_js($file) {
        return $this->domain.'/assets/js/'. $file;
    }

    public function assets_css($file) {
        return $this->domain.'/assets/css/'. $file;
    }

    public function assets_img($file) {
        return $this->domain.'/assets/img/'. $file;
    }

// Pages

    public function home() {
        return $this->domain;
    }

    public function error() {
        return $this->domain.'/error';
    }

    public function offline() {
        return $this->domain.'/offline';
    }

    public function admin() {
        return $this->domain.'/admin';
    }

    public function signin() {
        return $this->domain.'/signin';
    }

    public function signup() {
        return $this->domain.'/signup';
    }

    public function signout() {
        return $this->domain.'/signout';
    }

    public function forgot() {
        return $this->domain.'/forgot';
    }

    public function reset($array = NULL) {


        $url = $this->domain.'/reset';

        if (isset($array) && !empty($array)) {

                $url .= '?'.http_build_query($array) . "\n";
        }
        
        return $url;
    }

    public function deal($id = NULL, $slug = NULL) {

        if (empty($id) && empty($slug)) {

        return $this->domain.'/deal/';

        }else{
            
        return $this->domain.'/deal/'.$id.'/'.$slug;

        }
    }

    public function location($slug = NULL) {
        if (empty($slug)) {
            return $this->domain;
        }else{
            return $this->domain.'/location/'.$slug;
        }
    }

    public function user($id = NULL) {

        if ($id) {
            return $this->domain.'/user/'.$id;
        }else{
            return $this->domain.'/user/';
        }

    }

    public function search($array = NULL) {

        if (!$this->search || !empty($this->search)) {

        $url = $this->domain.'/'.$this->search;

        if (isset($array) && !empty($array)) {

                $url .= '?'.http_build_query($array) . "\n";
        }

        return $url;

        }else{
            return null;
        }
    }

    public function privacy() {

        if (!$this->privacy || !empty($this->privacy)) {
            return $this->domain.'/'.$this->privacy;
        }else{
            return null;
        }
    }

    public function terms() {

        if (!$this->terms || !empty($this->terms)) {
            return $this->domain.'/'.$this->terms;
        }else{
            return null;
        }
    }

    public function categories() {

        if (!$this->categories || !empty($this->categories)) {
            return $this->domain.'/'.$this->categories;
        }else{
            return null;
        }
    }

    public function stores() {

        if (!$this->stores || !empty($this->stores)) {
            return $this->domain.'/'.$this->stores;
        }else{
            return null;
        }
    }

    public function locations() {

        if (!$this->locations || !empty($this->locations)) {
            return $this->domain.'/'.$this->locations;
        }else{
            return null;
        }
    }

    public function page($slug) {

        if (!$slug || !empty($slug)) {
            return $this->domain.'/'.$slug;
        }else{
            return null;
        }
    }

    public function profile($action = NULL) {

        if ($action) {
            return $this->domain.'/profile?action='.$action;
        }else{
            return $this->domain.'/profile';
        }
    }

}

?>