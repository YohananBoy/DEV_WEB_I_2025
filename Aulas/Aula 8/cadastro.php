<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] == []) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadin do Seu Zé</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 1rem 0 0;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 2rem;
            max-width: 600px;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 2rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: bold;
        }

        input,
        button {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>Mercadin do Seu Zé</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastro.php">Cadastrar Produtos</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <p><?php echo "Bem vindo(a) " . $_SESSION["login"]["username"] . "!" ?></p>
    </header>
    <hr>
    <main>
        <form action="cadastro.php" method="get">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" id="nome">
            <label>Preço:</label>
            <input type="number" name="preco" id="preco" step="0.01" min="0">
            <button type="submit">Cadastrar Produto</button>
        </form>
    </main>

    <?php
    $username = $_SESSION["login"]["username"];
    if (!isset($_SESSION["produtos"][$username])) {
        $_SESSION["produtos"][$username] = [];
    }
    function validaProduto($produtoNovo)
    {
        $username = $_SESSION["login"]["username"];
        $produtosCadastrados = $_SESSION["produtos"][$username];

        $produtosRepetidos = array_filter($produtosCadastrados, function ($valor) use ($produtoNovo) {
            if ($valor["nome"] == $produtoNovo["nome"]) {
                return true;
            }
            return false;
        });

        return count($produtosRepetidos) > 0 ? false : true;
    }

    if (isset($_GET["nome"], $_GET["preco"])) {
        $produtoNovo = [
            "nome" => $_GET["nome"],
            "preco" => $_GET["preco"]
        ];



        if (validaProduto($produtoNovo)) {
            array_push($_SESSION["produtos"][$username], $produtoNovo);
            echo "Produto cadastrado.";
        } else
            echo "Erro! Produto não cadastrado.";
    }
    ?>

    <!--Gerado com gpt-->
    <script defer>
        const precoInput = document.getElementById('preco');

        precoInput.addEventListener('blur', () => {
            let valor = parseFloat(precoInput.value);
            if (!isNaN(valor)) {
                precoInput.value = valor.toFixed(2);
            }
        });
    </script>
</body>

</html>