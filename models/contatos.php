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
    public $idUser;

    public function __construct($id, $nome, $telefone, $idUser) {
        $this->id    = $id;
        $this->nome  = $nome;
        $this->telefone = $telefone;
        $this->idUser= $idUser;
    }


    public static function all() {

        try {

            $ss=  new SessionManager();

            $list = [];
            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $db->prepare('SELECT * FROM contatos where idUser=:id');
            $idUser = $ss->getUserApp();
            $req->execute(array('id' => $idUser));

            // we create a list of Post objects from the database results
            foreach($req->fetchAll() as $item) {
                $list[] = new Contato($item['ID'], $item['nome'], $item['telefone'], $item['idUser']);
            }

            return $list;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function inserir($contato){

        try {


            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("INSERT INTO contatos (ID, nome, telefone, idUser) VALUES (:id ,:nome, :telefone, :userApp)");
            $stmt->bindParam(':id', $contato->id , PDO::PARAM_STR );
            $stmt->bindParam(':nome', $contato->nome , PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $contato->telefone, PDO::PARAM_STR);
            $stmt->bindParam(':userApp', $contato->idUser, PDO::PARAM_STR);


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

        return new Contato($contato['ID'], $contato['nome'], $contato['telefone'],$contato['idUser']);
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
