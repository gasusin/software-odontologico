<?php
class Exames_model extends CI_Model {

    public function insert($exame){
        $this->db->insert("exame", $exame);
    }

    public function getByIdPaciente($id){
        $this->db->where("id_paciente", $id);
        return $this->db->get("exame")->row_array(); 
    }

    public function deleteById($id){
        $this->db->delete('exame', array('id' => $id));
    }
}