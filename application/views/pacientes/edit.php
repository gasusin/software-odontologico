<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edição de Pacientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url("js/jquery.maskedinput.min.js");?>"></script><!-- Máscara -->
</head>
<body>
<?php
require_once(dirname(dirname(dirname(__FILE__))).'\controllers\valida_usuario.php');
?>

    <div class="container">

        <h1> Edição de Paciente</h1>

        <?= validation_errors("<p class='alert alert-danger'>", "</p>")?>

        <?php 
            echo form_open("pacientes/update");

            echo form_hidden("id", $pacientes["id"]);

            echo form_label("Nome", "nome");
            echo form_input(array(
                "id" => "nome",
                "name" => "nome",
                "class" => "form-control",
                "maxlength" => "255",
                "value" => set_value("nome", $pacientes["nome"])
            ));

            echo form_label("CPF", "cpf");
            echo form_input(array(
                "id" => "cpf",
                "name" => "cpf",
                "class" => "form-control",
                "maxlength" => "14",
                "required" => "true",
                "value" => set_value("cpf", $pacientes["cpf"])
            ));

            echo form_label("Plano de Saúde", "plano_saude");
            echo form_input(array(
                "id" => "plano_saude",
                "name" => "plano_saude",
                "class" => "form-control",
                "maxlength" => "255",
                "value" => set_value("plano_saude", $pacientes["plano_saude"])
            ));

            echo anchor('pacientes', '<i class="fa fa-times"></i> Cancelar', array("class" => "btn btn-primary"));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "<i class='fa fa-check'></i> Salvar",
                "type" => "submit"
            ));


            echo form_close();
        ?>    
    </div>

     <script type="text/javascript">
        $(document).ready(function(){
          $('#cpf').mask('999.999.999-99');
        });
    </script>
</body>
</html>