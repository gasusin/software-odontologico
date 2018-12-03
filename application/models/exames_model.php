<?php
class Exames_model extends CI_Model {

    public function insert($exame){
        $this->db->insert("exame", $exame);
    }

    public function getByIdPaciente($id){
        $this->db->where("id_paciente", $id);
        return $this->db->get("exame")->row_array(); 
    }

    public function update($id_paciente, $exame) {
        $this->db->update(
            "exame", 
            array(
                "id_paciente" => $id_paciente,
                "descricao" => $exame["descricao"],
                "data_exame" => $exame["data_exame"],
                "id_usuario_cadastro" => $exame["id_usuario_cadastro"],
                "tipo" => $exame["tipo"]
            ), 
            array("id" => $exame["id"])
        );
    }

    public function deleteById($id){
        $this->db->delete('exame', array('id' => $id));
    }

    public function getExames($id){
        $found = null;

        $this->db->where("id_paciente", $id);
        return $this->db->get("exame")->result_array();
    }

    public function getExamePaciente($id_paciente, $id_exame){
        $found = null;

        $this->db->where("id_paciente", $id_paciente);
        $this->db->where("id", $id_exame);
        return $this->db->get("exame")->row_array();
    }
}