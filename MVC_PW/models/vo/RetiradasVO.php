<?php

namespace Model\VO;

final class RetiradasVO extends VO {

    private $id_aluno;
    private $id_livro;
    private $nome_aluno;
    private $nome_livro;
    private $data_retirada;
    private $data_devolucao;
    
    public function __construct($id = 0, $id_aluno = "", $id_livro = 0, $data_retirada = "", $data_devolucao = "", $nome_aluno = "", $nome_livro = "") {
        parent::__construct($id);
        $this->id_aluno = $id_aluno;
        $this->id_livro = $id_livro;
        $this->data_retirada = $data_retirada;
        $this->data_devolucao = $data_devolucao;
        $this->nome_aluno = $nome_aluno;
        $this->nome_livro = $nome_livro;
    }
    
    public function getIdAluno() {
        return $this->id_aluno;
    }

    public function setIdAluno($id_aluno) {
        $this->id_aluno = $id_aluno;
    }
    public function getNomeAluno() {
        return $this->nome_aluno;
    }

    public function setNomeAluno($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }
    public function getNomeLivro() {
        return $this->nome_livro;
    }

    public function setNomeLivro($nome_livro) {
        $this->nome_livro = $nome_livro;
    }

    public function getIdLivro() {
        return $this->id_livro;
    }

    public function setIdLivro($id_livro) {
        $this->id_livro = $id_livro;
    }

    public function getDataRetirada() {
        return $this->data_retirada;
    }

    public function setDataRetirada($data_retirada) {
        $this->data_retirada = $data_retirada;
    }

    public function getDataDevolucao() {
        return $this->data_devolucao;
    }

    public function setDataDevolucao($data_devolucao) {
        $this->data_devolucao = $data_devolucao;
    }
}
    