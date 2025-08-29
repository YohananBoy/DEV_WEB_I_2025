<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Top</title>
</head>
<body>
    <header>
        <h1>Site top</h1>
        <h2>O site mais topzera deste mundo!!</h2>
        <a href="logout.php">Logout</a>
    </header>
    <main>
        <form action="" method="post">
            <fieldset>
                <legend>Login</legend>
                <label>Email:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <label>Senha:</label>
                <input type="password" name="senha" id="senha" required>
                <br><br>
                <button type="submit">Logar</button>
            </fieldset>
        </form>
    </main>
    <?php
    session_start();
    if(!isset($_SESSION["login"])) {
        $_SESSION["login"] = [];
    }
    if(isset($_POST["email"], $_POST["senha"])) {
        $usuario = [];
        $usuario["email"] = $_POST["email"];
        $usuario["senha"] = $_POST["senha"];

        define("SEPARADOR", "#");
        $arquivo = fopen("dados.txt", "r");
        $linha = "";
        while(!feof($arquivo)) {
            $linha = trim(fgets($arquivo));
            $dadosLogin = explode(SEPARADOR, $linha);

            $nome = $dadosLogin[1];
            $email = $dadosLogin[2];
            $senha = $dadosLogin[3];
            
            if($usuario["email"] == $email && $usuario["senha"] == $senha) {
                $_SESSION["login"]["nome"] = $nome;
                $_SESSION["login"]["email"] = $email;
                $_SESSION["login"]["senha"] = $senha;
                echo "Login efetuado com sucesso!";
                header("Location: dashboard.php");
                exit;
            }
        }
        echo "Erro no login";
    }
    ?>
</body>
</html>