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