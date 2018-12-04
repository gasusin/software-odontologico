<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalhe Exame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('js/bootstrap.js'); ?>"></script>

    <style type="text/css">
        
        img {
            max-width: 600px;
            min-height: 400px;
            max-height: 400px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <h1> Exame </h1>
        </div>
        <div class="row">
            <label>Descrição: <?= $exame["descricao"]?></label>
        </div>
        <div class="row">
            <label>Tipo: <?= $exame["tipo"]?></label>
        </div>
        <div class="row">
            <label>Data do Exame: <?= $exame["data_exame"]?></label>
        </div>
        
        <?= anchor('pacientes/detalhes/'.$id_paciente, '<i class="fa fa-arrow-left"></i> Voltar', array("class" => "btn btn-primary")) ?>
        <?= anchor('exames/download/'.$nome_paciente.'/'.$exame['nome_arquivo'], '<i class="fa fa-download"></i> Baixar imagem', array("class" => "btn btn-primary")) ?>
        <!-- <?php //anchor("exames/delete/{$pacientes['id']}/{$exame['id']}", " ", array("class" => "fa fa-times")) ?> -->

        <!-- Tabela de exames -->
        <div class="container">

            <?php if($this->session->flashdata("danger")) : ?>
                <p class="alert alert-danger">
                    <?= $this->session->flashdata("danger"); ?>
                </p>
            <?php endif ?>
            
            <?php if($this->session->userdata("usuario_logado")) : ?>

                <div class="row text-center">
                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets\\uploads\\'.$exame['nome_arquivo']); ?>" >
                </div>


            <?php else : ?>

                <h1>Login</h1>
                <?php
                
                    echo form_open("login/autenticar");

                    echo form_label("Nome", "nome");
                    echo form_input(array(
                        "id" => "nome",
                        "name" => "nome",
                        "class" => "form-control",
                        "maxlength" => "255"
                    ));

                    echo form_label("Senha", "senha");
                    echo form_password(array(
                        "id" => "senha",
                        "name" => "senha",
                        "class" => "form-control",
                        "maxlength" => "255"
                    ));

                    echo form_button(array(
                        "class" => "btn btn-primary",
                        "content" => "Login",
                        "type" => "submit"
                    ));

                    echo form_close();
                ?>

                <h1>Cadastro de Usuário</h1>
                <?php 
                    echo form_open("usuarios/novo");

                    echo form_label("Nome", "nome");
                    echo form_input(array(
                        "id" => "nome",
                        "name" => "nome",
                        "class" => "form-control",
                        "maxlength" => "255"
                    ));

                    echo form_label("Senha", "senha");
                    echo form_password(array(
                        "id" => "senha",
                        "name" => "senha",
                        "class" => "form-control",
                        "maxlength" => "255"
                    ));

                    echo form_button(array(
                        "class" => "btn btn-primary",
                        "content" => "Salvar",
                        "type" => "submit"
                    ));

                    echo form_close();
                ?>

            <?php endif ?>
        </div>
        <!-- Tabela de exames -->

    </div>
</body>
</html>