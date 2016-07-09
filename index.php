<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 26/06/2016
 * Time: 15:58
 */

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");



    session_start();
    require_once('Config.php');
    require_once('connectionMysql.php');
    //require_once ("connectionPostgresql.php");
    require_once ('helper/session_manager.php');



/*
    if(isset($_GET['controller']) && $_GET['controller'] != ''){
        $controller = $_GET['controller'];
    }else {
        $controller = 'login';
    }

    if(isset($_GET['action']) && $_GET['action'] != ''){
        $action = $_GET['action'];
    }else {
        $action = 'index';
    }
*/

$controller = $_GET['controller'];
$action = $_GET['action'];


    if($controller == 'service'){

        require_once('routes.php');

    }else{
        require_once('views/layout.php');
    }

?>