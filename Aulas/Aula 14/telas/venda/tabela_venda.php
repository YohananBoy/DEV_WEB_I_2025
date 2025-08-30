<?php
    session_start();
    if (! isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: ../index/login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Venda</title>
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
                <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>
</body>
</html>
