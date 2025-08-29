<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <script src="cadastro_cliente.js"></script>
</head>
<body>
    <form id="formCadastroCliente" action="executa_acao_cliente.php" method="post">
        <input type="hidden" name="acao" value="cadastrar"/>
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"])?$_GET["id"]:"" ?>"/>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome"/>
        <label for="telefone">Telefone:</label><input type="text" id="telefone" name="telefone"/>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="tabela_cliente.php">Tabela Cliente</a>
</body>
</html>