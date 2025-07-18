<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Top</title>
</head>
<body>
    <?php
    include("../service/funcionario.service.php");
    listarFuncionario("");
    ?>
    <a href="cadastro_funcionario.php">Cadastrar Funcionario</a>
</body>
</html>