<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <script src="cadastro_produto.js"></script>
</head>
<body>
    <form id="formCadastroProduto" action="executa_acao_produto.php" method="post">
        <input type="hidden" name="acao" value="cadastrar"/>
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"])?$_GET["id"]:"" ?>"/>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome"/>
        <label for="preco">Preço:</label><input type="text" id="preco" name="preco"/>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="tabela_produto.php">Tabela Funcionario</a>
</body>
</html>