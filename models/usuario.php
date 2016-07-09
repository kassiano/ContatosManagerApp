<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 28/06/2016
 * Time: 09:07
 */

class AppUser{

    public $id;
    public $userName;
    public $email;
    public $password;
    public $AndroidToken;

    /**
     * AppUser constructor.
     * @param $id
     * @param $userName
     * @param $email
     * @param $password
     * @param $AndroidToken
     */
    public function __construct($id, $userName, $email,$password,  $AndroidToken)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->AndroidToken = $AndroidToken;
    }


    public static function all(){
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM '.DBSCHEMA.'appUser');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $user) {
            $list[] = new AppUser($user['ID'], $user['userName'], $user['email'],"", $user['AndroidToken']);
        }

        return $list;
    }


    public static function findByEmailAndPassword($email, $passwd) {

           try{
            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // we make sure $id is an integer
            $req = $db->prepare('SELECT * FROM '.DBSCHEMA.'appUser WHERE email = :email and password = :password');
            $req->bindParam(':email', $email , PDO::PARAM_STR );
            $req->bindParam(':password', $passwd , PDO::PARAM_STR);

            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();

            $user = $req->fetch();


            return new AppUser($user['ID'], $user['userName'], $user['email'],"", $user['AndroidToken']);

        } catch (PDOException $e) {
             echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM '.DBSCHEMA.'appUser WHERE ID = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        return new AppUser($user['ID'], $user['userName'], $user['email'],"", $user['AndroidToken']);
    }

    public static function inserir($appUser)
    {
        try {

            $db = Db::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("INSERT INTO ".DBSCHEMA."appUser (ID, userName, email, password,AndroidToken) VALUES (:id ,:userName, :email, :password, :AndroidToken)");
            $stmt->bindParam(':id', $appUser->id , PDO::PARAM_STR );
            $stmt->bindParam(':userName', $appUser->userName , PDO::PARAM_STR);
            $stmt->bindParam(':email', $appUser->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $appUser->password, PDO::PARAM_STR);
            $stmt->bindParam(':AndroidToken', $appUser->AndroidToken, PDO::PARAM_STR);

            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

}