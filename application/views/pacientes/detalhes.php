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
    </div>
    
    <div class="container">
        <!-- Consulta de Exames -->
        <h3>Exames</h3>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            <?php foreach($exames as $exame) :?>
                <tr>    
                    <td><?= $exame["id"]?></td>
                    <td><?= $exame["descricao"]?></td>
                    <td><?= $exame["data_exame"]?></td>
                    <td>
                        <?= anchor("", " ", array("class" => "fa fa-delete")) ?>
                    </td>
                </tr>
            <?php endforeach?>
        </table>
    </div>
</body>
</html>