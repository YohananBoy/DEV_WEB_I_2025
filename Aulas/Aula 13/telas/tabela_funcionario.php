<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Top</title>
</head>
<body>
    <form method="post">
        <label for="nome">Nome:</label><input name="filtro">
        <button type="submit">Filtrar</button>
    </form>
    <?php
    include("../service/funcionario.service.php");
    $filtro = isset($_POST["nome"])?$_POST["nome"]:"";
    listarFuncionario($filtro);
    ?>
    <a href="cadastro_funcionario.php">Cadastrar Funcionario</a>
</body>
</html>