<?php

namespace Model\VO;

final class AlunosVO extends VO {

    private $nome;
    private $data_nasc;
    private $id_curso;
    private $cpf;
    private $nome_curso;
    
    public function __construct($id = 0, $nome = "", $data_nasc = null, $id_curso = 0, $cpf = "", $nome_curso = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->data_nasc = $data_nasc;
        $this->id_curso = $id_curso;
        $this->cpf = $cpf;
        $this->nome_curso = $nome_curso;
    }

    public function getNome() {
        return $this->nome;
    }
    public function getNomeCurso() {
        return $this->nome_curso;
    }

    public function getDataNasc() {
        return $this->data_nasc;
    }

    public function getIdCurso() {
        return $this->id_curso;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setNomeCurso($nome_curso) {
        $this->nome_curso = $nome_curso;
    }
    
    public function setDataNasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }

    public function setIdCurso($id_curso) {
        $this->id_curso = $id_curso;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
}
