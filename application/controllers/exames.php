<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exames extends CI_Controller {

    public function detalhes_exame($id_paciente, $id_exame){

        $this->load->model("exames_model");

        $exame = $this->exames_model->getExamePaciente($id_paciente, $id_exame);

        $dados = array("exame" => $exame, "id_paciente" => $id_paciente);
        $this->load->helper("typography");
        $this->load->view("exames/detalhes_exame", $dados);

    }

    public function novo(){
        
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $idPaciente    = $this->input->post("id_paciente");

        $this->load->helper("date");
        $this->load->model("exames_model");

        $config["upload_path"]   = FCPATH . "assets\uploads";
        $config["allowed_types"] = "jpg|png|gif|pdf|zip|rar|doc|xls";
        $config["encrypt_name"]  = TRUE;

        // Cria pasta se não existe
        if (!is_dir($config["upload_path"])) {
            mkdir($config["upload_path"], 0777, true);
        }

        $this->load->library("upload", $config);
        
        if($this->upload->do_upload('arquivo_exame')){
            $info_arquivo = $this->upload->data();
            $nome_arquivo = $info_arquivo['file_name'];

            $exames = array(
                "descricao" => $this->input->post("descricao"),
                "data_exame" => convertDataForDB($this->input->post("data_exame")),
                "id_usuario_cadastro" => $usuarioLogado["id"],
                "id_paciente" => $idPaciente,
                "tipo" => $this->input->post("tipo_exame"),
                "nome_arquivo" => $nome_arquivo
            );
    
            $this->exames_model->insert($exames);
        } else {
            var_dump("ERRO");
            exit;
            $erros = $this->upload->display_errors();
            $alerta = array(
                "class" => "danger",
                "mensagem" => $erros
            );
        }
        
        redirect('pacientes/detalhes/'.$idPaciente);
    }

    public function edit_exame($id_paciente, $id_exame){
        
        $this->load->model("exames_model");

        $exame = $this->exames_model->getExamePaciente($id_paciente, $id_exame);

        $dados = array("exame" => $exame, "id_paciente" => $id_paciente);

        $this->load->view("exames/edit_exame", $dados);

    }

    public function update(){
        
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $idPaciente    = $this->input->post("id_paciente");

        $this->load->helper("date");
        $this->load->model("exames_model");
        /*
        $config["upload_path"]   = FCPATH . "assets\uploads";
        $config["allowed_types"] = "jpg|png|gif|pdf|zip|rar|doc|xls";
        $config["encrypt_name"]  = TRUE;

        // Cria pasta se não existe
        if (!is_dir($config["upload_path"])) {
            mkdir($config["upload_path"], 0777, true);
        }

        $this->load->library("upload", $config);
        
        if($this->upload->do_upload('arquivo_exame')){
            $info_arquivo = $this->upload->data();
            $nome_arquivo = $info_arquivo['file_name'];*/

            $exame = array(
                "id" => $this->input->post("id"),
                "descricao" => $this->input->post("descricao"),
                "data_exame" => convertDataForDB($this->input->post("data_exame")),
                "id_usuario_cadastro" => $usuarioLogado["id"],
                /*"id_paciente" => $idPaciente,*/
                "tipo" => $this->input->post("tipo_exame")/*,
                "nome_arquivo" => $nome_arquivo*/
            );
    
            $this->exames_model->update($idPaciente, $exame);
        /*} else {
            var_dump("ERRO");
            exit;
            $erros = $this->upload->display_errors();
            $alerta = array(
                "class" => "danger",
                "mensagem" => $erros
            );
        }*/
        
        redirect('pacientes/detalhes/'.$idPaciente);
    }

    public function delete($idExame, $idPaciente){
        $this->load->model("exames_model");
        $this->exames_model->deleteById($idExame);
    }
}