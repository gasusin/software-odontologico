<?php
class Exames_model extends CI_Model {

    public function insert($exame){
        $this->db->insert("exame", $exame);
    }
}