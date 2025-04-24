<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja legal</title>
</head>
<body>
    <form action="" method="get">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome">
        <label>Categoria:</label>
        <select name="categoria" id="categoria">
            <option value="limpeza">Limpeza</option>
            <option value="cereais">Cereais</option>
            <option value="armarinho">Armarinho</option>
        </select>
        <label>Fabricante:</label>
        <input type="text" name="fabricante" id="fabricante">
        <button type="submit">Cadastrar</button>
    </form>

    <?php
    session_start();
    if(isset($_GET["nome"]) && isset($_GET["categoria"]) && isset($_GET["fabricante"])) {
        $nome = $_GET["nome"];
        $categoria = $_GET["categoria"];
        $fabricante = $_GET["fabricante"];

        $_SESSION["produtos"] += [$nome => $categoria, $fabricante];
        var_dump($_SESSION["produtos"]);
    }
    ?>
</body>
</html>