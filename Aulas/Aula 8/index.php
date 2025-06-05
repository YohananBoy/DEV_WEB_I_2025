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
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 2rem;
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
            max-width: 800px;
            margin: 2rem auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        thead {
            background-color: #e0e0e0;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            font-size: 1.1rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 600px) {

            th,
            td {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            nav ul {
                flex-direction: column;
                gap: 0.5rem;
            }
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
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $username = $_SESSION["login"]["username"];
                if (empty($_SESSION["produtos"][$username]) or !isset($_SESSION["produtos"][$username])) {
                    echo '<tr><td colspan="2">Não há produtos cadastrados</td></tr>';
                } else {
                    foreach ($_SESSION["produtos"][$username] as $produto) {
                        echo '<tr><td>' . $produto["nome"] . '</td><td>' . $produto["preco"] . '</td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>