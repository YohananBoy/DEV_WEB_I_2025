<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="../css/padaria.css">
    <script src="cadastro_usuario.js"></script>
</head>
<body>
<?php
require_once "../../service/usuario.service.php";
  $usuario = "";
  if(isset($_GET["id"]))
      $usuario = pegaUsuarioPeloId($_GET["id"]);
?>
    <header>
        <div id="logo">
            <img src="../img/Padaria Topzera.png" alt="">
            <h2>a padaria mais top da redondeza</h2>
        </div>
        <div id="usuario">
            <p><?php 
            if (isset($_SESSION["login"]) && $_SESSION["login"] != []) {
                echo $_SESSION["login"]["nome"] . " (" . $_SESSION["login"]["email"] . ") <a href='../index/logout.php'>Logout</a>";
            } ?></p>
            
        </div>
    </header>
    <main>
        <form id="formCadastroUsuario" action="executa_acao_usuario.php" method="post">
        <input type="hidden" name="acao" value="<?php echo !empty($usuario) ? "alterar" : "cadastrar"; ?>"/>
        <?php if(!empty($usuario)) { ?>
                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>"/>
            <?php } ?>
        <label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?php if(!empty($usuario)) 
        echo $usuario->nome; ?>"/><br/>
        <label for="email">Email:</label><input type="email" id="email" name="email" value="<?php if(!empty($usuario)) 
        echo $usuario->email; ?>"/>
        <label for="senha">Senha:</label><input type="password" id="senha" name="senha" value="<?php 
        if(!empty($usuario)) 
        echo $usuario->senha; 
        ?>"/>
        <button type="submit"><?php if(!empty($usuario)) {
            echo "Alterar";
        } else echo "Cadastrar"; ?></button>
        </form>
    
        <a href="tabela_usuario.php">Tabela Usuario</a>
    </main>
</body>
</html>