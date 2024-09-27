<?php

namespace Model;

use Model\VO\CursosVO;

final class CursosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT  * FROM cursos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CursosVO(
                $row["id"], 
                $row["nome"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {}

    public function insert($vo) {}
    
    public function update($vo) {}
    
    public function delete($vo) {}
    
}
