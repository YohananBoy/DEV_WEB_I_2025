<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Top</title>
</head>
<body>
<form method="post">
        <label>Nome:</label><input name="filtro">
        <button type="submit">Filtrar</button>
    </form>
    <?php
    include("../service/produto.service.php");
    $filtro = isset($_POST["filtro"])?$_POST["filtro"]:"";
    listarProduto($filtro);
    ?>
    <a href="cadastro_produto.php">Cadastrar Produto</a>
</body>
</html>