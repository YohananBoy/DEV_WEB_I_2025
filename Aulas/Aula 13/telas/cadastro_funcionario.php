<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <script src="cadastro_funcionario.js"></script>
</head>
<body>
    <form id="formCadastroFuncionario" action="executa_acao_funcionario.php" method="post">
        <input type="hidden" name="acao" value="cadastrar">
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"])?$_GET["id"]:"" ?>">
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome"/>
        <label for="salario">Salario:</label><input type="text" id="salario" name="salario"/>
        <label for="telefone">Telefone:</label><input type="tel" id="telefone" name="telefone"/>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>