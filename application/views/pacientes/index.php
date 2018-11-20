<html lang="en">
<head>
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <div class="container">

        <?php if($this->session->flashdata("danger")) : ?>
            <p class="alert alert-danger">
                <?= $this->session->flashdata("danger"); ?>
            </p>
        <?php endif ?>
        
        <?php if($this->session->userdata("usuario_logado")) : ?>

            <h1>Pacientes</h1>

            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Nome</th> 
                    <th>CPF</th>
                    <th>Plano de Saúde</th>
                    <th>Ações</th>
                </tr>
                <?php foreach($pacientes as $paciente) :?>
                    <tr>    
                        <td><?= $paciente["id"]?></td>
                        <td><?= $paciente["nome"]?></td>
                        <td><?= $paciente["cpf"]?></td>
                        <td><?= character_limiter($paciente["plano_saude"], 15)?></td>
                        <td>
                            <?= anchor("pacientes/{$paciente['id']}", " ", array("class" => "fa fa-search")) ?>
                        </td>
                    </tr>
                <?php endforeach?>
            </table>

            <?= anchor('pacientes/formulario', 'Cadastro Paciente', array("class" => "btn btn-primary")) ?>
            <?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")) ?>

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
            ?>'

        <?php endif ?>
    </div>
</body>
</html>