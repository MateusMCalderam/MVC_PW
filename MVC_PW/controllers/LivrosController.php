<?php

namespace Controller;

use Model\LivrosModel;
use Model\VO\LivrosVO;

final class LivrosController extends Controller {

    public function list() {
        $model = new LivrosModel();
        $data = $model->selectAll(new LivrosVO());

        $this->loadView("listLivros", [
            "livros" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new LivrosModel();
            $vo = new LivrosVO($id);
            $livro = $model->selectOne($vo);
        } else {
            $livro = new LivrosVO();
        }

        $this->loadView("formLivros", [
            "livro" => $livro
        ]);
    }

    public function save() {
        $erro = ""
        if (
            empty($_POST["titulo"]) ||
            empty($_POST["autores"]) ||
            empty($_POST["editora"]) ||
            empty($_POST["ano_publicacao"]) ||
            empty($_POST["quantidade_exemplares"]) ||
            empty($_POST["isbn"])
        ) {
            echo "Erro: Todos os campos são obrigatórios!";
            return;
        }
        $isbnLength = strlen($_POST["isbn"]);
        if ($isbnLength !== 10 && $isbnLength !== 13) {
            echo "Erro: O ISBN deve ter 10 ou 13 caracteres!";
            return;
        }
    
        // Verifica se a quantidade de exemplares é um número válido e maior ou igual a 0
        if (!is_numeric($_POST["quantidade_exemplares"]) || $_POST["quantidade_exemplares"] < 0) {
            echo "Erro: A quantidade de exemplares deve ser um número válido e maior ou igual a 0!";
            return;
        }
    
        // Verifica se o ano de publicação tem exatamente 4 caracteres
        if (strlen($_POST["ano_publicacao"]) !== 4 || !is_numeric($_POST["ano_publicacao"])) {
            echo "Erro: O ano de publicação deve ter exatamente 4 dígitos!";
            return;
        }



        print_r($_POST);
        $id = $_POST["id"];
        $vo = new LivrosVO(
            $_POST["id"],
            $_POST["titulo"],
            $_POST["autores"],
            $_POST["editora"],
            $_POST["ano_publicacao"],
            $_POST["quantidade_exemplares"],
            $_POST["isbn"]
        );
        
        $model = new LivrosModel();
        
        if(empty($id)) {
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }
        var_dump($result)   ;
        $this->redirect("index.php");

    }

    public function remove() {
        $vo = new LivrosVO($_GET["id"]);
        $model = new LivrosModel();
        $result = $model->delete($vo);

        $this->redirect("index.php");
    }

}