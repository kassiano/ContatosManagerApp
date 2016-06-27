<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 27/06/2016
 * Time: 08:35
 */


class ContatoServiceController{

    public function getAll(){

        $list = Contato::all();
        echo json_encode($list);
    }
}