<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
require_once(dirname(dirname(dirname(__FILE__))).'\controllers\valida_usuario.php');
?>

    <div class="container">

        <?php if($this->session->flashdata("danger")) : ?>
            <p class="alert alert-danger">
                <?= $this->session->flashdata("danger"); ?>
            </p>
        <?php endif ?>
        
        <h1>Pacientes</h1>
        
        <?= anchor('pacientes/formulario', '<i class="fa fa-user"></i> Cadastrar paciente', array("class" => "btn btn-primary")) ?>
        <?php //anchor('login/logout', '<i class="fa fa-sign-out"></i> Logout', array("class" => "btn btn-primary")) ?>
        <?= anchor('usuarios/logout', '<i class="fa fa-sign-out"></i> Logout', array("class" => "btn btn-primary")) ?>
        
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
                        <?= anchor("pacientes/edit/{$paciente['id']}", " ", array("class" => "fa fa-edit")) ?>
                    </td>
                </tr>
            <?php endforeach?>
        </table>

    </div>
</body>
</html>