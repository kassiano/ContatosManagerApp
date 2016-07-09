<?php

/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 26/06/2016
 * Time: 15:59
 */
class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            self::$instance = new PDO("pgsql:host=localhost dbname=outsidet_bdcontatos user=outsidet_contato password=contato");
        }
        return self::$instance;
    }
}