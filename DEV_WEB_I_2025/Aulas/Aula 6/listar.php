<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body>
    <table border="1" cellpadding="5">
        <tr>
            <td>Nome</td>
            <td>Categoria</td>
            <td>Fabricante</td>
        </tr>
        <?php
        foreach ($_SESSION["produtos"] as $produtoArray) {
            $nome = $produtoArray["nome"];
            $categoria = $produtoArray["categoria"];
            $fabricante = $produtoArray["fabricante"];

            echo    "<tr>
                        <td>$nome</td>
                        <td>$categoria</td> 
                        <td>$fabricante</td> 
                    </tr>";
        }
        ?>
    </table>

    <p><a href="cadastro.php">Voltar</a></p>
</body>

</html>