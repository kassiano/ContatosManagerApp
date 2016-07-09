<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 29/06/2016
 * Time: 20:44
 */

class SessionManager{



    public function setUserApp($userApp) {
        
        $_SESSION["AppUser"] = $userApp;
    }

    public function getUserApp(){

        
        if(isset($_SESSION['AppUser']) && !empty($_SESSION['AppUser'])){

            return $_SESSION["AppUser"];
        }

        return NULL;
        
    }
}