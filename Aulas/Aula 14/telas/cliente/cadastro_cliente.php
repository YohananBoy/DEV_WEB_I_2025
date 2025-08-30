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
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../css/padaria.css">
    <script src="cadastro_cliente.js"></script>
</head>
<body>
<?php
require_once "../../service/cliente.service.php";
  $cliente = "";
  if(isset($_GET["id"]))
      $cliente = pegaClientePeloId($_GET["id"]);
?>
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
        <form id="formCadastroCliente" action="executa_acao_cliente.php" method="post">
        <input type="hidden" name="acao" value="<?php echo !empty($cliente) ? "alterar" : "cadastrar"; ?>"/>
        <?php if(!empty($cliente)) { ?>
                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>"/>
            <?php } ?>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?php if(!empty($cliente)) 
        echo $cliente->nome; ?>"/><br/>
        <label for="telefone">Telefone:</label><input type="tel" id="telefone" name="telefone" value="<?php 
        if(!empty($cliente)) 
        echo $cliente->telefone; 
        ?>"/>
        <button type="submit"><?php if(!empty($cliente)) {
            echo "Alterar";
        } else echo "Cadastrar"; ?></button>
        </form>
    
        <a href="tabela_cliente.php">Tabela Cliente</a>
        <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>

</body>
</html>