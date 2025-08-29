<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Cliente</title>
</head>
<body>
    <form method="post">
        <label>Nome:</label><input name="filtro"/>
        <button>Filtrar</button>
    </form>
    <?php
        require_once "../../service/cliente.service.php";
        $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
        listarCliente($filtro);
    ?>
    <a href="cadastro_cliente.php">Cadastrar Cliente</a>
</body>
</html>