<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pacientes extends CI_Controller {

    public function index(){
        
        $this->load->model("pacientes_model");
        $pacientes = $this->pacientes_model->getAll();
        
        $dados = array("pacientes" => $pacientes);
        
        $this->load->view("pacientes/index.php", $dados);
    }

    public function formulario(){
        $this->load->view("pacientes/formulario");
    }

    public function novo(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("cpf", "cpf", "required");
        $valido = $this->form_validation->run();

        if($valido){
            $usuarioLogado = $this->session->userdata("usuario_logado");
            
            $paciente = array(
                "nome" => $this->input->post("nome"),
                "cpf" => $this->input->post("cpf"),
                "plano_saude" => $this->input->post("plano_saude"),
                "ind_paciente" => 1,
                "id_usuario_criacao" => $usuarioLogado["id"]
            );
            
            $this->load->model("pacientes_model");
            $this->pacientes_model->insert($paciente);
            
            redirect('/');
        } else {
            $this->load->view("pacientes/formulario");
        }

    }

    public function detalhes($id){

        $this->load->model("pacientes_model");
        $this->load->model("exames_model");

        $paciente = $this->pacientes_model->getById($id);
        //$exames = $this->exames_model->getByIdPaciente($paciente["id"]);
        $exames   = $this->pacientes_model->getExames($id);

        $dados = array("pacientes" => $paciente, "exames" => $exames);
        $this->load->helper("typography");
        $this->load->view("pacientes/detalhes", $dados);

    }

    public function edit($id){
        
        $this->load->model("pacientes_model");
        // $this->load->library('upload');

        $paciente = $this->pacientes_model->getById($id);

        $dados = array("pacientes" => $paciente);

        $this->load->view("pacientes/edit", $dados);

    }

    public function update(){
        
        $usuarioLogado = $this->session->userdata("usuario_logado");
        
        $paciente = array(
            "id" => $this->input->post("id"),
            "nome" => $this->input->post("nome"),
            "cpf" => $this->input->post("cpf"),
            "plano_saude" => $this->input->post("plano_saude"),
            "ind_paciente" => 1
        );
        
        $this->load->model("pacientes_model");
        $this->pacientes_model->update($paciente);
        
        $pacientes = $this->pacientes_model->getAll();

        $dados = array("pacientes" => $pacientes);

        //$this->load->view('produtos/tabela', $dados);
        $this->load->view("pacientes/index.php", $dados);
    }

}