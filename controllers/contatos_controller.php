<?php
/**
 * Created by PhpStorm.
 * User: kassiano
 * Date: 26/06/2016
 * Time: 16:27
 */
class ContatosController {

    public function home() {

        $listaContatos = Contato::all();
        require_once('views/contatos/home.php');
    }

    public function novo(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contato = new Contato(0,$_POST['nome'], $_POST['telefone']);
            Contato::inserir($contato);
            $mensagem = "inserido com sucesso";
        }

        require_once('views/contatos/novo_contato.php');
    }

    public function editar(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contato = new Contato($_POST['id'],$_POST['nome'], $_POST['telefone']);

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

        $this->home();
    }

    public function error() {
        require_once('views/contatos/error.php');
    }
}