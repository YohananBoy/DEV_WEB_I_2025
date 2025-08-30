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
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="../css/padaria.css">
    <script src="cadastro_funcionario.js"></script>
</head>
<body>
<?php
require_once "../../service/funcionario.service.php";
  $funcionario = "";
  if(isset($_GET["id"]))
      $funcionario = pegaFuncionarioPeloId($_GET["id"]);
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
        <form id="formCadastroFuncionario" action="executa_acao_funcionario.php" method="post">
        <input type="hidden" name="acao" value="<?php echo !empty($funcionario) ? "alterar" : "cadastrar"; ?>"/>
        <?php if(!empty($funcionario)) { ?>
                <input type="hidden" name="id" value="<?php echo $funcionario->id; ?>"/>
            <?php } ?>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?php if(!empty($funcionario)) 
        echo $funcionario->nome; ?>"/><br/>
        <label for="salario">Salario:</label><input type="text" id="salario" name="salario" value="<?php if(!empty($funcionario)) 
        echo $funcionario->salario; ?>"/>
        <label for="telefone">Telefone:</label><input type="tel" id="telefone" name="telefone" value="<?php 
        if(!empty($funcionario)) 
        echo $funcionario->telefone; 
        ?>"/>
        <button type="submit"><?php if(!empty($funcionario)) {
            echo "Alterar";
        } else echo "Cadastrar"; ?></button>
        </form>
    
        <a href="tabela_funcionario.php">Tabela Funcionario</a>
                <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>
</body>
</html>