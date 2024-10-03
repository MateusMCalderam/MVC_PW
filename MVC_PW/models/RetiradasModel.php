<?php

namespace Model;

use Model\VO\RetiradasVO;

final class RetiradasModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT retiradas.id, retiradas.id_aluno, retiradas.id_livro, retiradas.data_retirada, retiradas.data_devolucao, livros.titulo as nome_livro, alunos.nome as nome_aluno 
        FROM retiradas 
        JOIN livros ON livros.id = retiradas.id_livro 
        JOIN alunos ON alunos.id = retiradas.id_aluno ";

        $data = $db->select($query);
        $arrayDados = [];

        foreach($data as $row) {
            $vo = new RetiradasVO(
                $row["id"], 
                $row["id_aluno"], 
                $row["id_livro"], 
                $row["data_retirada"], 
                $row["data_devolucao"],
                $row["nome_livro"],
                $row["nome_aluno"],
            );
            array_push($arrayDados, $vo);
        }
        
        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT retiradas.id, retiradas.id_aluno, retiradas.id_livro, retiradas.data_retirada, retiradas.data_devolucao, livros.titulo as nome_livro, alunos.nome as nome_aluno 
        FROM retiradas 
        JOIN livros ON livros.id = retiradas.id_livro 
        JOIN alunos ON alunos.id = retiradas.id_aluno 
        WHERE retiradas.id = :id;";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new RetiradasVO(
            $data[0]["id"], 
            $data[0]["id_aluno"], 
            $data[0]["id_livro"], 
            $data[0]["data_retirada"], 
            $data[0]["data_devolucao"],
            $data[0]["nome_livro"],
            $data[0]["nome_aluno"],
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO retiradas (id_aluno, id_livro, data_retirada, data_devolucao) 
                  VALUES (:id_aluno, :id_livro, :data_retirada, :data_devolucao)";
        
        $binds = [
            ":id_aluno" => $vo->getIdAluno(),
            ":id_livro" => $vo->getIdLivro(),
            ":data_retirada" => $vo->getDataRetirada(),
            ":data_devolucao" => $vo->getDataDevolucao()
        ];

        print_r($binds);
        
        return $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE retiradas 
                  SET id_aluno = :id_aluno, id_livro = :id_livro, data_retirada = :data_retirada, data_devolucao = :data_devolucao
                  WHERE id = :id";
    
        $binds = [
            ":id_aluno" => $vo->getIdAluno(),
            ":id_livro" => $vo->getIdLivro(),
            ":data_retirada" => $vo->getDataRetirada(),
            ":data_devolucao" => $vo->getDataDevolucao(),
            ":id" => $vo->getId()
        ];
    
        return $db->execute($query, $binds);
    }
    
    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM retiradas WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        
        return $db->execute($query, $binds);
    }
    
}
