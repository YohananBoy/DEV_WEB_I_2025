<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Venda</title>
</head>
<body>
    <form method="post">
        <label>ID Produto:</label>
        <input name="filtro" placeholder="Digite o ID do produto"/>
        <button>Filtrar</button>
    </form>

    <?php
        require_once "../../service/venda.service.php";

        $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
        listarVenda($filtro);
    ?>

    <a href="cadastro_venda.php">Cadastrar Venda</a>
</body>
</html>
