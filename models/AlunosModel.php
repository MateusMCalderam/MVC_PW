<?php

namespace Model;

use Model\VO\AlunosVO;

final class AlunosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT a.id, a.nome, a.data_nasc, a.id_curso, a.cpf, c.nome as nome_curso FROM alunos a
        JOIN cursos c ON a.id_curso = c.id";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new AlunosVO(
                $row["id"], 
                $row["nome"], 
                $row["data_nasc"], 
                $row["id_curso"], 
                $row["cpf"],
                $row["nome_curso"]   
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT a.id, a.nome, a.data_nasc, a.id_curso, a.cpf, c.nome as nome_curso FROM alunos a
        JOIN cursos c ON a.id_curso = c.id WHERE a.id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new AlunosVO(
            $data[0]["id"], 
            $data[0]["nome"], 
            $data[0]["data_nasc"], 
            $data[0]["id_curso"], 
            $data[0]["cpf"],
            $data[0]["nome_curso"]
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO alunos (nome, data_nasc, id_curso, cpf) 
                  VALUES (:nome, :data_nasc, :id_curso, :cpf)";
        
        $binds = [
            ":nome" => $vo->getNome(),
            ":data_nasc" => $vo->getDataNasc(),
            ":id_curso" => $vo->getIdCurso(),
            ":cpf" => $vo->getCpf()
        ];
        
        return $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE alunos 
                  SET nome = :nome, data_nasc = :data_nasc, id_curso = :id_curso, cpf = :cpf
                  WHERE id = :id";
    
        $binds = [
            ":nome" => $vo->getNome(),
            ":data_nasc" => $vo->getDataNasc(),
            ":id_curso" => $vo->getIdCurso(),
            ":cpf" => $vo->getCpf(),
            ":id" => $vo->getId()
        ];
    
        return $db->execute($query, $binds);
    }
    
    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM alunos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        
        return $db->execute($query, $binds);
    }
    
}
