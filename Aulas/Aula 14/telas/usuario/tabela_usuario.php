<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Usuario</title>
</head>
<body>
    <form method="post">
        <label>Nome:</label><input name="filtro"/>
        <button>Filtrar</button>
    </form>
    <?php
        require_once "../../service/usuario.service.php";
        $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
        listarUsuario($filtro);
    ?>
    <a href="cadastro_usuario.php">Cadastrar Usuario</a>
</body>
</html>