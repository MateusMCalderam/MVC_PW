<?php

namespace Controller;

use Model\RetiradasModel;
use Model\VO\RetiradasVO;
use Model\AlunosModel;
use Model\VO\AlunosVO;

final class RetiradasController extends Controller {

    public function list() {
        $model = new RetiradasModel();
        $data = $model->selectAll(new RetiradasVO());

        $this->loadView("listRetiradas", [
            "retiradas" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $modelRetirada = new RetiradasModel();
            $voRetirada = new RetiradasVO($id);
            $retirada = $modelRetirada->selectOne($voRetirada);

            $modelAlunos = new AlunosModel();
            $voAlunos = new AlunosVO();
            $alunos = $modelAlunos->selectAll($voAlunos);
        } else {
            $retirada = new RetiradasVO();
            $alunos = new AlunosVO();
        }

        $this->loadView("formRetiradas", [
            "retirada" => $retirada,
            "alunos" => $alunos
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $vo = new RetiradasVO(
            $_POST["id"],
            $_POST["nome"],
            "",
            $_POST["id_curso"],
            $_POST["cpf"]
        );
        
        print_r($vo);
        $model = new RetiradasModel();
        
        if(empty($id)) {
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }
        var_dump($result)   ;
        // $this->redirect("retiradas.php?destino=list");

    }

    public function remove() {
        $vo = new RetiradasVO($_GET["id"]);
        $model = new RetiradasModel();
        $result = $model->delete($vo);

        $this->redirect("retiradas.php?destino=list");
    }

}