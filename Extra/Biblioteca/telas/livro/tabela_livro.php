<?php include "../autentificacao.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Livro</title>
</head>
<body>
    <?php include "../header.php"?>
    <main>
    <form action="" method="post">
        <input type="text" name="filtro">
        <button type="submit">Filtrar</button>
    </form>
    <?php
        require_once dirname(__DIR__) . "/../service/livro.service.php";
        $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
        listarLivro($filtro);
    ?>
    </main>
    <?php include "../footer.php"?>
</body>
</html>
