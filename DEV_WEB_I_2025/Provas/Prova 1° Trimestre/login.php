<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Cadastro de Empregados</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    main {
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 300px;
    }

    form input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 10px;
      background-color: #4285f4;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    form button:hover {
      background-color: #357ae8;
    }
  </style>
</head>
<body>
  <header>
    <h2>Cadastro de Empregados</h2>
  </header>

  <main>
    <form action="" method="post">
      <h2>Login</h2>
      <input type="email" name ="email" placeholder="E-mail" required>
      <input type="password" name ="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>

<a href="listagem.php">Clique aqui para entrar na tela de listagem</a>
    </form>

	<?php
		session_start();
		
		$usuarios = 	["emaillegal@gmail.com" => ["nome" => "Yohanan","email" => "emaillegal@gmail.com", "senha" => "casaco roxo"],
				"fortnite@gmail.com" => ["nome" => "Miguel","email" => "fortnite@gmail.com","senha" => "catwoman"],
				"paganismoocultismo123@gmail.com" => ["nome" => "Marx","email" => "paganismoocultismo123@gmail.com","senha" => "macacobananamacaco3d"]];
	

		if(!isset($_SESSION["login"])) {
			$_SESSION["login"] = [];
		}
	
		$logado = false;
		if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {
			foreach($usuarios as $usuario) {
				if(isset($usuarios[$_POST["email"]]) && $usuario["email"] == $_POST["email"] && $usuario["senha"] == $_POST["senha"]) {
					$_SESSION["login"] = $usuario;
					$logado = true;
				}
			}
			if(!$logado) {
				echo "Email ou senha incorretos";
			}
		}
	?>
  </main>
</body>
</html>
