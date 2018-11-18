<?php 
class Pacientes_model extends CI_Model {

    public function getAll(){
        $this->db->where("ind_paciente", 1);
        return $this->db->get("pessoa")->result_array();
    }

    public function insert($paciente){
        $this->db->insert("pessoa", $paciente);
    }

    public function getById($id){
        $this->db->where("id", $id);
        return $this->db->get("pessoa")->row_array(); 
    }

}