<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('js/bootstrap.js'); ?>"></script>
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
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_cadastro_exame">
            <i class="fa fa-list-alt"></i> Cadastrar Exame
        </button>
        <?= anchor('pacientes', '<i class="fa fa-arrow-left"></i> Voltar', array("class" => "btn btn-primary")) ?>


        <!-- Tabela de exames -->
        <div class="container">

            <?php if($this->session->flashdata("danger")) : ?>
                <p class="alert alert-danger">
                    <?= $this->session->flashdata("danger"); ?>
                </p>
            <?php endif ?>
            
            <?php if($this->session->userdata("usuario_logado")) : ?>

                <h1>Exames</h1>

                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Descrição</th> 
                        <th>Tipo</th>
                        <th>Data Exame</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($exames as $exame) :?>

                        <tr>    
                            <td><?= $exame["id"]?></td>
                            <td><?= $exame["descricao"]?></td>
                            <td><?= $exame["tipo"]?></td>
                            <td><?= $exame["data_exame"]?></td>
                            <td>
                                <?= anchor("exames/{$pacientes['id']}/{$pacientes['nome']}/{$exame["id"]}", " ", array("class" => "fa fa-search")) ?>
                                <?= anchor("exames/edit/{$pacientes['id']}/{$exame['id']}", " ", array("class" => "fa fa-edit")) ?>
                                <?= anchor("exames/delete/{$pacientes['id']}/{$exame['id']}", " ", array("class" => "fa fa-times")) ?>
                            </td>
                        </tr>
                    <?php endforeach?>
                </table>


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

        <!-- Modal cadastro exame -->
        <div class="modal fade" id="modal_cadastro_exame" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title"> Cadastrar Exame 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </h2>
              </div>
              <div class="modal-body">
                
                <?php 
                    echo form_open_multipart("exames/novo");

                    echo form_hidden("id_paciente", $pacientes["id"]);

                    echo form_label("Descrição", "descricao");
                    echo form_input(array(
                        "id" => "descricao",
                        "name" => "descricao",
                        "class" => "form-control",
                        "maxlength" => "255",
                        "required" => "required"
                    ));

                    echo form_label("Data do Exame", "data_exame");
                    echo form_input(array(
                        "id" => "data_exame",
                        "name" => "data_exame",
                        "class" => "form-control",
                        "type" => "date",
                        "required" => "required"
                    ));

                    echo form_label("Tipo do Exame", "tipo_exame");
                    echo form_dropdown('tipo_exame', array(
                            "Radiologia" => "Radiologia",
                            "Outros" => "Outros"
                        ), 'large', 'id="tipo_exame" class="form-control"'
                    );
                    
                    echo form_label("Imagem do Exame", "imagem_exame");
                    echo "<input type='file' name='arquivo_exame' required/>";

                ?>
              </div>
              <div class="modal-footer">
                <?php 
                    echo form_button(array(
                        "class" => "btn btn-secondary",
                        "content" => "<i class='fa fa-times'></i> Cancelar",
                        "type" => "button",
                        "data-dismiss" => "modal"
                    ));

                    echo form_button(array(
                        "class" => "btn btn-primary",
                        "content" => "<i class='fa fa-check'></i> Salvar",
                        "type" => "submit"
                    ));
                ?>
              </div>
                <?php
                    echo form_close();
                ?> 
            </div>
          </div>
        </div>
        <!-- Modal cadastro exame -->

    </div>
</body>
</html>