<?php
    session_start();
    if (! isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: ../index/login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Produto</title>
    <link rel="stylesheet" href="../css/padaria.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="../img/Padaria Topzera.png" alt="">
            <h2>a padaria mais top da redondeza</h2>
        </div>
        <div id="usuario">
            <p><?php echo $_SESSION["login"]["nome"] . " (" . $_SESSION["login"]["email"] . ")"; ?></p>
            <a href="../index/logout.php">Logout</a>
        </div>
    </header>
    <main>
        <form method="post">
            <label>Nome:</label><input name="filtro"/>
            <button>Filtrar</button>
        </form>
        <?php
            require_once "../../service/produto.service.php";
            $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
            listarProduto($filtro);
        ?>
        <a href="cadastro_produto.php">Cadastrar Produto</a>
                <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>
</body>
</html>