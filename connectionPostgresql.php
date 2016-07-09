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

            $host ="ec2-54-235-123-19.compute-1.amazonaws.com";
            $database= "da8rpk4sknc32l";
            $user = "bpuuukfbivzxxg";
            $passwd ="VUQmqGu0Fzw8IQ3d4eitor078a";

            self::$instance = new PDO("pgsql:host=$host dbname=$database user=$user password=$passwd");
        }
        return self::$instance;
    }
}