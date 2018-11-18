<?php
class Usuarios_model extends CI_Model {

    public function insert($usuario) {
        $this->db->insert("usuario", $usuario);
    }

    public function getLogin($nome, $senha){
        $this->db->where("nome", $nome);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuario")->row_array();

        return $usuario;
    }
}