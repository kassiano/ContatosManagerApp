<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 26/06/2016
 * Time: 16:49
 */

class Contato{

    public $id;
    public $nome;
    public $telefone;

    public function __construct($id, $nome, $telefone) {
        $this->id    = $id;
        $this->nome  = $nome;
        $this->telefone = $telefone;
    }


    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM contatos');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $item) {
            $list[] = new Contato($item['ID'], $item['nome'], $item['telefone']);
        }

        return $list;
    }

    public static function inserir($contato){

        try {
            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("INSERT INTO contatos (ID, nome, telefone) VALUES (:id ,:nome, :telefone)");
            $stmt->bindParam(':id', $contato->id , PDO::PARAM_STR );
            $stmt->bindParam(':nome', $contato->nome , PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $contato->telefone, PDO::PARAM_STR);

            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }


    public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM contatos WHERE ID = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $contato = $req->fetch();

        return new Contato($contato['ID'], $contato['nome'], $contato['telefone']);
    }

    public static function atualizar($contato)
    {

        try {
            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("UPDATE contatos set nome= :nome, telefone=:telefone where ID = :id");
            $stmt->bindParam(':id', $contato->id , PDO::PARAM_STR );
            $stmt->bindParam(':nome', $contato->nome , PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $contato->telefone, PDO::PARAM_STR);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }


    }

    public static function deletar($id)
    {
        try {
            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("DELETE FROM contatos WHERE ID=:id");
            $stmt->bindParam(':id', $id , PDO::PARAM_STR );

            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

}
