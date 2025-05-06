<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja legal</title>
</head>

<body>
    <form action="" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome">
        <label>Categoria:</label>
        <select name="categoria" id="categoria">
            <option value="Limpeza">Limpeza</option>
            <option value="Cereais">Cereais</option>
            <option value="Armarinho">Armarinho</option>
        </select>
        <label>Fabricante:</label>
        <input type="text" name="fabricante" id="fabricante">
        <button type="submit">Cadastrar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <?php
    session_start();

    if (!isset($_SESSION["produtos"])) {
        $_SESSION["produtos"] = [];
    }

    function dadosValidos($campos)
    {
        foreach ($campos as $campo) {
            if (!isset($_POST[$campo]) || trim($_POST[$campo]) === "") {
                return false;
            }
        }
        return true;
    }


    if (dadosValidos(["nome", "categoria", "fabricante"])) {
        $produto = [
            "nome" => $_POST["nome"],
            "categoria" => $_POST["categoria"],
            "fabricante" => $_POST["fabricante"]
        ];

        $_SESSION["produtos"][] = $produto;
    }

    if (isset($_POST["limpar"])) {
        $_SESSION["produtos"] = [];
    }
    ?>

    <p><a href="listar.php">Ver Produtos Cadastrados</a></p>
</body>

</html>