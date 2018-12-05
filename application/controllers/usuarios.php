<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {

	protected $CI;
	
	public function __construct() {

	    parent::__construct();

	    $this->CI =& get_instance();

	    $this->CI->load->helper(['form', 'url', 'security']);

	}

	public function index() {
		$this->session->unset_userdata("usuario_logado");
		$this->load->view("login/logon.php");
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

    public function autenticar(){
        
        $this->load->model("usuarios_model");

        $nome = $this->input->post("nome");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->usuarios_model->getLogin($nome, $senha);

        if($usuario){
            $this->session->set_userdata("usuario_logado", $usuario);
            //$this->session->set_flashdata("success", "Logado com sucesso!");
        } else {
            $this->session->set_flashdata("danger", "Usuário ou senha inválida.");
        }

        redirect('/pacientes');die;
    }

    /*public function logout(){
        $this->session->unset_userdata("usuario_logado");
        //$this->session->set_flashdata("success", "Deslogado com sucesso!");
        redirect('/');
    }*/

    public function logout() {
		$this->session->unset_userdata("usuario_logado");
		redirect('/usuarios', 'refresh');die;
    }
}