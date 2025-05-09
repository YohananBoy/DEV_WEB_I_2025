<?php
session_start();
if(isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
    echo "Bem vindo(a) " . $_SESSION["login"]["user"] . "!";
} else {
    header('Location: login.php');
    exit;
}
// Criar uma array 8x8 para o tabuleiro
$tabuleiro = array();

// Inicializando o tabuleiro
for ($i = 0; $i < 8; $i++) {
    for ($j = 0; $j < 8; $j++) {
        // Definindo as casas
        if (($i + $j) % 2 == 0) {
            $tabuleiro[$i][$j] = 0; // Casa vazia
        } else {
            if ($i < 3) {
                // Peças do jogador 1 (negras)
                $tabuleiro[$i][$j] = 1;
            } elseif ($i > 4) {
                // Peças do jogador 2 (brancas)
                $tabuleiro[$i][$j] = 2;
            } else {
                // Espaços vazios no meio
                $tabuleiro[$i][$j] = 0;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuleiro de Damas</title>
    <style>
        main {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        table {
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
            position: relative; /* Importante para centralizar a peça */
        }
        .preto {
            background-color: #4f4f4f;
        }
        .branco {
            background-color: #ffffff;
        }
        .peca {
            border-radius: 50%;
            position: absolute; /* Usado para centralizar a peça */
            top: 50%; /* Alinha verticalmente */
            left: 50%; /* Alinha horizontalmente */
            transform: translate(-50%, -50%); /* Ajusta para o centro exato */
            width: 30px;
            height: 30px;
        }
        .peca1 {
            background-color: #000; /* Peças negras */
        }
        .peca2 {
            background-color: #fff; /* Peças brancas */
        }
    </style>
</head>
<body>
<main>
<table>
    <?php
    // Exibir o tabuleiro como uma tabela HTML
    for ($i = 0; $i < 8; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 8; $j++) {
            // Determina a classe para a célula
            $classe = (($i + $j) % 2 == 0) ? 'branco' : 'preto';

            // Adiciona a peça no caso de haver uma
            $classePeca = '';
            if ($tabuleiro[$i][$j] == 1) {
                $classePeca = 'peca peca1'; // Peça do jogador 1 (negras)
            } elseif ($tabuleiro[$i][$j] == 2) {
                $classePeca = 'peca peca2'; // Peça do jogador 2 (brancas)
            }

            echo "<td class='$classe'>";
            if ($classePeca) {
                echo "<div class='$classePeca'></div>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</main>
</body>
</html>
