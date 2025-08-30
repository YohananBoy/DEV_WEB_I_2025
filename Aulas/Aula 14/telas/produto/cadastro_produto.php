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
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="../css/padaria.css">
    <script src="cadastro_produto.js"></script>
</head>
<body>
<?php
require_once "../../service/produto.service.php";
  $produto = "";
  if(isset($_GET["id"]))
      $produto = pegaProdutoPeloId($_GET["id"]);
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
        <form id="formCadastroProduto" action="executa_acao_produto.php" method="post">
        <input type="hidden" name="acao" value="<?php echo !empty($produto) ? "alterar" : "cadastrar"; ?>"/>
        <?php if(!empty($produto)) { ?>
                <input type="hidden" name="id" value="<?php echo $produto->id; ?>"/>
            <?php } ?>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?php if(!empty($produto)) 
        echo $produto->nome; ?>"/><br/>
        <label for="preco">Preco:</label><input type="tel" id="preco" name="preco" value="<?php 
        if(!empty($produto)) 
        echo $produto->preco; 
        ?>"/>
        <button type="submit"><?php if(!empty($produto)) {
            echo "Alterar";
        } else echo "Cadastrar"; ?></button>
        </form>
    
        <a href="tabela_produto.php">Tabela Produto</a>
                <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>
</body>
</html>