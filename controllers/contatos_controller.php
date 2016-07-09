<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 26/06/2016
 * Time: 16:27
 */
class ContatosController {

    private $ss;

    /**
     * ContatosController constructor.
     * @param $ss
     */
    public function __construct()
    {
        $this->ss = new SessionManager();;
    }


    public function index() {

        $userApp = $this->ss->getUserApp();

        if($userApp === NULL){
            header( 'Location: /'.PROJECTDIR.'/login/index');
        }

        $listaContatos = Contato::all();
        require_once('views/contatos/home.php');
    }

    public function novo(){

        $userApp = $this->ss->getUserApp();

        if($userApp === NULL){
            header( 'Location: /'.PROJECTDIR.'/login/index');
        }
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contato = new Contato(0,$_POST['nome'], $_POST['telefone'], $userApp);
          
            Contato::inserir($contato);
            $mensagem = "inserido com sucesso";
        }

        require_once('views/contatos/novo_contato.php');
    }

    public function editar(){

        $userApp = $this->ss->getUserApp();

        if($userApp === NULL){
            header( 'Location: /'.PROJECTDIR.'/login/index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contato = new Contato($_POST['id'],$_POST['nome'], $_POST['telefone'], $userApp);

            Contato::atualizar($contato);

            $mensagem = "atualizado com sucesso";

        }else{

            $contato = Contato::find($_GET['id']);

        }

        require_once('views/contatos/editar_contato.php');
    }
    
    public function deletar(){

        $id = $_GET['id'];
        
        Contato::deletar($id);

        header( 'Location: /'.PROJECTDIR.'/contatos/index');
    }

    public function error() {
        require_once('views/contatos/error.php');
    }
    
    

}