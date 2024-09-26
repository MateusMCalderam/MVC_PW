<?php

namespace Model\VO;

final class AlunosVO extends VO {

    private $nome;
    private $data_nasc;
    private $id_curso;
    private $cpf;
    
    public function __construct($id = 0, $nome = "", $data_nasc = null, $id_curso = 0, $cpf = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->data_nasc = $data_nasc;
        $this->id_curso = $id_curso;
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
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
