<?php

namespace Model;

use Model\VO\AlunosVO;

final class AlunosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new AlunosVO(
                $row["id"], 
                $row["nome"], 
                $row["data_nasc"], 
                $row["id_curso"], 
                $row["cpf"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        // Adaptado para capturar todos os campos de um único livro
        return new AlunosVO(
            $row[0]["id"], 
            $row[0]["nome"], 
            $row[0]["data_nasc"], 
            $row[0]["id_curso"], 
            $row[0]["cpf"]
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
