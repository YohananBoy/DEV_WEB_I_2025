<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user" id="user" placeholder="Usuário">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <button type="submit" id="login">Login</button>
    </form>

    <?php
session_start();
$usuarios = [
    'Sturti' => "balões3d",
    'Migxx' => "STROOO",
    'Marx' => "safadinho",
    'Óculos' => "Óculos",
    'Enzo' => "Cabeludo Desgraçado",
];
$user = "";
$senha = "";

if (isset($_POST["user"]) && isset($_POST["senha"])) {
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["senha"] = $_POST["senha"];
}

if (isset($_SESSION["user"]) && isset($_SESSION["senha"])) {
    $user = $_SESSION["user"];
    $senha = $_SESSION["senha"];
}

if ($senha == @$usuarios[$user]) {
    echo "Seja bem vindo " . $user . "!";
} else {
    echo "vagabundo ta tentando entrar na conta dos outros né";
}
?>
</html>