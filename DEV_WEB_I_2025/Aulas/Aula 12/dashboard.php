<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<header>
        <h1>Site top</h1>
        <h2>O site mais topzera deste mundo!!</h2>
        <a href="logout.php">Logout</a>

        <p>Seja bem vindo(a) <?php echo $_SESSION["login"]["nome"]; ?>!</p>
</header>
<main>
    <form action="" method="post">
        <fieldset>
            <legend>Cadastrar Produto</legend>
            <label>Nome do Produto:</label>
            <input type="text" name="nome">
            <label>Preço:</label>
            <input type="number" name="preco">
        </fieldset>
    </form>
</main>
<?php
$arquivoNovo = fopen("Produto - " . $_SESSION["login"]["email"], "w");

function lerUltimoId($arquivo) {
    $linha = "";
        while(!feof($arquivo)) {
            $linha = fgets($arquivo);
    }
    fclose($arquivo);
$dadosProduto = explode(SEPARADOR, $linha);
return $dadosProduto[0];
}

if(isset($_POST["nome"], $_POST["nome"])) {
    $produto["nome"] = $_POST["nome"];
    $produto["preco"] = $_POST["preco"];

    $linha = "";
    while(!feof($arquivoNovo)) {
        $id = LerUltimoId($arquivoNovo);
        if(empty($id)) {
            $id = 0;
            $linha = "";
        }
        $id++;
        $linha = $linha . $id . SEPARADOR . $produto["nome"] . SEPARADOR . $produto["preco"];
        file_put_contents($arquivoNovo, $linha, FILE_APPEND);
    }
}
?>
</body>
</html>