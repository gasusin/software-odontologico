<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .center {
            margin: auto;
            width: 25%;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="center">
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
        </div>
    </div>
</body>
</html>