<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exames extends CI_Controller {

    public function novo(){

        $usuarioLogado = $this->session->userdata("usuario_logado");
        $idPaciente = $this->input->post("id_paciente");

        $this->load->helper("date");
        $this->load->model("exames_model");

        $exames = array(
            "descricao" => $this->input->post("descricao"),
            "data_exame" => convertDataForDB($this->input->post("data_exame")),
            "id_usuario_criacao" => $usuarioLogado["id"],
            "id_paciente" => $idPaciente
        );

        $this->exames_model->insert($exames);

        redirect(`pacientes/detalhes?id=${$idPaciente}`);
    }
}