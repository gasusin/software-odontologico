<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edição de Exame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">

        <h1> Edição de Exame</h1>

        <?= validation_errors("<p class='alert alert-danger'>", "</p>")?>

        <?php 
            echo form_open("exames/update");

            echo form_hidden("id", $exame["id"]);
            echo form_hidden("id_paciente", $id_paciente);

            echo form_label("Descrição", "descricao");
            echo form_input(array(
                "id" => "descricao",
                "name" => "descricao",
                "class" => "form-control",
                "maxlength" => "255",
                "required" => "required",
                "value" => set_value("nome", $exame["descricao"])
            ));

            echo form_label("Data do Exame", "data_exame");
            echo form_input(array(
                "id" => "data_exame",
                "name" => "data_exame",
                "class" => "form-control",
                "required" => "required",
                "value" => set_value("nome", $exame["data_exame"])
            ));

            echo form_label("Tipo do Exame", "tipo_exame");
            echo form_dropdown('tipo_exame', array(
                    "Radiologia" => "Radiologia",
                    "Outros" => "Outros"
                ), $exame["tipo"], 'id="tipo_exame" class="form-control"'
            );
            
            /*echo form_label("Imagem do Exame", "imagem_exame");
            echo "<input type='file' name='arquivo_exame' value='" . $exame["nome_arquivo"] . "' required/>";*/

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Salvar",
                "type" => "submit"
            ));

            echo anchor('pacientes/detalhes/'.$id_paciente, '<i class="fa fa-arrow-left"></i> Voltar', array("class" => "btn btn-primary"));

            echo form_close();
        ?>    
    </div>
</body>
</html>