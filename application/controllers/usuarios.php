<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {

	public function index() {

		if ($this->session->userdata("usuario_logado")) {
			redirect("pacientes");die;
		}else{
			$this->load->view("login/logon.php");
		}

	}

    public function novo() {

        $usuario = array(
            "nome" => $this->input->post("nome"),
            "senha" => md5($this->input->post("senha"))
        );

        $this->load->model("usuarios_model");
        $this->usuarios_model->insert($usuario);
        $this->load->view("usuarios/novo");
    }
}