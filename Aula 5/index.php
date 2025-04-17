<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 5</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<form action="" method="get">
    <h1>Envio</h1>
    <input type="number" name="linha" id="linha" placeholder="n° de linhas">
    <input type="number" name="coluna" id="coluna" placeholder="n° de colunas">
    <button type="submit">Enviar</button>
</form>

<a href="login.php">Login</a>

<?php
if (!isset($_GET["linha"])) {
} else {
    $nLinha = $_GET["linha"];
    $nColuna = $_GET["coluna"];

    $tabela = "<table>";
    for ($i = 0; $i < $nLinha; $i++) {
        $tabela .= "<tr>";
        for ($j = 0; $j < $nColuna; $j++) {
            $tabela .= "<td>" . "L" . $i + 1 . "C" . $j + 1 . "</td>";
        }
        $tabela .= "</tr>";
    }

    $tabela .= "</table>";
    echo $tabela;
}
?>
</body>
</html>