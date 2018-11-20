<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1> Paciente </h1>
        </div>
        <div class="row">
            <label>Nome: <?= $pacientes["nome"]?></label>
        </div>
        <div class="row">
            <label>CPF: <?= $pacientes["cpf"]?></label>
        </div>
        <div class="row">
            <label>Plano de Saúde: <?= $pacientes["plano_saude"]?></label>
        </div>
    
        <!-- Cadastrar Imagem -->

        <h2> Cadastrar Exame </h2>

        <?php 
            echo form_open("exames/novo");

            echo form_hidden("id_paciente", $pacientes["id"]);

            echo form_label("Descrição", "descricao");
            echo form_input(array(
                "id" => "descricao",
                "name" => "descricao",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label("Data do Exame", "data_exame");
            echo form_input(array(
                "id" => "data_exame",
                "name" => "data_exame",
                "class" => "form-control"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Salvar",
                "type" => "submit"
            ));

            echo form_close();
        ?> 
    </div>
</body>
</html>