<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 28/06/2016
 * Time: 07:52
 */
class LoginController{


    public function index(){


        $ss = new SessionManager();

       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $email = $_POST['email'];
           $passwd = $_POST['password'];

           $AppUser = AppUser::findByEmailAndPassword($email, $passwd);
           
          if($AppUser != null) {

              $ss->setUserApp($AppUser->id);

              header( 'Location: /'.PROJECTDIR.'/contatos/index');
              
          }
        }
        
        require_once('views/login/index.php');
    }


    public function register(){


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome =  $_POST['name'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            
            $appUser = new AppUser(0,$nome ,$email ,$password, "");
            
            AppUser::inserir($appUser);
            $mensagem = "Usuario cadastrado com sucesso ";
            $sucesso = true;
            
        }
        
        require_once('views/login/register.php');
    }

    public function  logout(){
        session_destroy();
        header( 'Location: /'.PROJECTDIR.'/login/index');
    }
}