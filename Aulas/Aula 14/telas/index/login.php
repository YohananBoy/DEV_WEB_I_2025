<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/padaria.css">
</head>
<body>
<header>
        <div id="logo">
            <img src="../img/Padaria Topzera.png" alt="">
            <h2>a padaria mais top da redondeza</h2>
        </div>
        <div id="usuario">
            <p><?php 
            if (isset($_SESSION["login"]) && $_SESSION["login"] != []) {
                echo $_SESSION["login"]["nome"] . " (" . $_SESSION["login"]["email"] . ") <a href='logout.php'>Logout</a>";
            } ?></p>
            
        </div>
    </header>
    <main>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <label for="senha">Senha:</label>
            <input type="password" name="senha">
            <button type="submit">Logar</button>
            </form>
            <p>Não tem uma conta? <a href="../usuario/cadastro_usuario.php">Cadastre-se</a></p>
    </main>
    <?php
        require_once "../../service/usuario.service.php";
        if (! isset($_SESSION["login"])) {
            $_SESSION["login"] = [];
        } else if (! empty($_SESSION["login"])) {
            header('Location: index.php');
            exit();
        }

        if (isset($_POST["email"]) && isset($_POST["senha"])) {
            $email = trim($_POST["email"]);
            $senha = trim($_POST["senha"]);

            $usuario = verificaUsuario($email, $senha);
            if ($usuario) {
                $_SESSION["login"] = [
                    "id"    => $usuario->id,
                    "nome"  => $usuario->nome,
                    "email" => $usuario->email,
                ];

                header('Location: index.php');
                exit();
            } else {
                echo "Credenciais Incorretas";
            }

        }

        var_dump($_SESSION["login"]);

    ?>
</body>
</html>
