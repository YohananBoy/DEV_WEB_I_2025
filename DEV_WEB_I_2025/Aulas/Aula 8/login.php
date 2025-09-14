<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadin do Seu Zé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h1 {
            color: #2c3e50;
        }

        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #219150;
        }

        p {
            margin-top: 20px;
        }

        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <h1>Mercadin do Seu Zé</h1>
    <p>Efetue o login para comprar.</p>

    <form action="login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = [];
    }

    $usuarios = [
        ["username" => "ze", "password" => "1234"],
        ["username" => "yohanan", "password" => "banana"]
    ];

    if (isset($_POST["username"], $_POST["password"])) {
        foreach ($usuarios as $usuario) {
            if ($usuario["username"] == $_POST["username"] && $usuario["password"] == $_POST["password"]) {
                $_SESSION["login"] = $usuario;
                header("Location: index.php");
                exit;
            }
        }
        echo '<p class="error">Credenciais incorretas</p>';
    }
    ?>
</body>

</html>