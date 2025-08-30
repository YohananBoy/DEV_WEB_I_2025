<?php
    session_start();
    if (! isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            <a href="logout.php">Logout</a>
        </div>
    </header>
    <main>
        <h2>Tabelas</h2>
        <ul>
            <li><a href="../cliente/tabela_cliente.php">Cliente</a></li>
            <li><a href="../funcionario/tabela_funcionario.php">Funcionário</a></li>
            <li><a href="../produto/tabela_produto.php">Produto</a></li>
            <li><a href="../usuario/tabela_usuario.php">Usuário</a></li>
            <li><a href="../venda/tabela_venda.php">Venda</a></li>
        </ul>

        <p style="margin-top: 30px">Aviso: caso algum link não funcionar, altere o service.php da respectiva página</p>
    </main>
</body>
</html>
