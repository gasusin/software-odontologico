<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exames extends CI_Controller {

    public function detalhes_exame($id_paciente, $nome_paciente, $id_exame){

        $this->load->model("exames_model");

        $exame = $this->exames_model->getExamePaciente($id_paciente, $id_exame);

        $dados = array("exame" => $exame, "id_paciente" => $id_paciente, "nome_paciente" => $nome_paciente);
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
                // "data_exame" => convertDataForDB($this->input->post("data_exame")),
                "data_exame" => $this->input->post("data_exame"),
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
                // "data_exame" => convertDataForDB($this->input->post("data_exame")),
                "data_exame" => $this->input->post("data_exame"),
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

    public function delete_exame($idPaciente, $idExame){
        $this->load->model("exames_model");
        $this->exames_model->deleteById($idPaciente, $idExame);

        redirect('pacientes/detalhes/'.$idPaciente);
    }

    public function download($nome_paciente, $arquivo){

        // Define o tempo máximo de execução em 0 para as conexões lentas
        set_time_limit(0);
        
        // Local do arquivo
        $arquivoLocal = FCPATH . "assets\\uploads\\".$arquivo; // caminho absoluto do arquivo
        
        // Verifica se o arquivo existe
        if (!file_exists($arquivoLocal)) {
            echo "ERRO: Arquivo inexistente";
            exit;
        }
        
        // Novo nome do arquivo
        $novoNome = 'Exame-'.$nome_paciente.'.png';

       // Parse Info / Get Extension
        $path_parts = pathinfo($arquivoLocal);
        $ext = strtolower($path_parts["extension"]);

        // Determine Content Type
        switch ($ext) {
          case "pdf": $ctype="application/pdf"; break;
          case "exe": $ctype="application/octet-stream"; break;
          case "zip": $ctype="application/zip"; break;
          case "doc": $ctype="application/msword"; break;
          case "xls": $ctype="application/vnd.ms-excel"; break;
          case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
          case "gif": $ctype="image/gif"; break;
          case "png": $ctype="image/png"; break;
          case "jpeg":
          case "jpg": $ctype="image/jpg"; break;
          default: $ctype="application/force-download";
        }

        header("Pragma: public"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false); // required for certain browsers
        header("Content-Type: $ctype");
        header("Content-Disposition: attachment; filename=\"".$novoNome."\";" );
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($arquivoLocal));
        ob_clean();
        flush();
        readfile( $arquivoLocal );
        exit;
    }
}