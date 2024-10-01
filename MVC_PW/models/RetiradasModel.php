<?php

namespace Model;

use Model\VO\RetiradasVO;

final class RetiradasModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT r.id, r.id_aluno, r.id_livro, r.data_retirada, r.data_devolucao, l.titulo AS nome_livro, a.nome AS nome_aluno 
        FROM retiradas r
        JOIN livros l ON l.id = r.id_livro
        JOIN alunos a ON a.id = r.id_aluno";

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
        $query = "SELECT r.id, r.id_aluno, r.id_livro, r.data_retirada, r.data_devolucao, l.nome as nome_livro, a.nome as nome_aluno FROM retiradas r
        JOIN livros l ON l.id = r.id_livro
        JOIN alunos a ON l.id = r.id_aluno WHERE a.id = :id";
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

        date_default_timezone_set('GMT-3');
        $today = date("Y/m/d");  


        $query = "INSERT INTO retiradas (id_aluno, id_livro, data_retirada, data_devolucao) 
                  VALUES (:id_aluno, :id_livro, :data_retirada, :data_devolucao)";
        
        $binds = [
            ":id_aluno" => $vo->getIdAluno(),
            ":id_livro" => $vo->getIdLivro(),
            ":data_retirada" => $today,
            ":data_devolucao" => $vo->getDataDevolucao()
        ];

        print_r($binds);
        
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
