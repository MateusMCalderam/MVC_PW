<?php

namespace Controller;

use Model\AlunosModel;
use Model\VO\AlunosVO;

final class AlunosController extends Controller {

    public function list() {
        $model = new AlunosModel();
        $data = $model->selectAll(new AlunosVO());

        $this->loadView("listAlunos", [
            "alunos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new AlunosModel();
            $vo = new AlunosVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new AlunosVO();
        }

        $this->loadView("formAlunos", [
            "aluno" => $aluno
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $vo = new AlunosVO(
            $_POST["id"],
            $_POST["nome"],
            $_POST["data_nasc"],
            $_POST["id_curso"],
            $_POST["cpf"]
        );
        
        print_r($vo);
        $model = new AlunosModel();
        
        if(empty($id)) {
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }
        var_dump($result)   ;
        $this->redirect("alunos.php?destino=list");

    }

    public function remove() {
        $vo = new AlunosVO($_GET["id"]);
        $model = new AlunosModel();
        $result = $model->delete($vo);

        $this->redirect("alunos.php?destino=list");
    }

}