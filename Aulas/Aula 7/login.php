<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user" id="user" placeholder="User">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <br/>
        <button type="submit">Logar</button>
    </form>

    <?php
    session_start();

    $usuarios = [
        [
            "user" => "Miguelis",
            "senha" => "fortnite"
        ],
        [
            "user" => "Marx ama pod de maçã",
            "senha" => "6000 puffs"
        ]
    ];

    $_SESSION["login"] = [];

    if(isset($_POST["user"]) && isset($_POST["senha"])) {
        $user = $_POST["user"];
        $senha = $_POST["senha"];

        foreach($usuarios as $usuario) {
            if($usuario["user"] == $user && $usuario["senha"] == $senha) {
                $_SESSION["login"] = $usuario;
                echo "bem vindo " . $_SESSION["login"]["user"];
            }
        }
    }
    ?>
</body>
</html>