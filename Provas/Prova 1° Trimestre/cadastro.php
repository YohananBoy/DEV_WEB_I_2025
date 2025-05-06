<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Empregado</title>
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

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #4285f4;
      font-weight: bold;
    }

    nav a:hover {
      color: #357ae8;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 32px;
      height: 32px;
      background-color: #4285f4;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    main {
      padding: 20px;
    }

    form input, form select {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 300px;
    }

    button {
      padding: 10px 20px;
      background-color: #4285f4;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<?php session_start(); ?>
  <header>
    <nav>
      <a href="cadastro.php">Cadastro</a>
      <a href="listagem.php">Listagem</a>
    </nav>
    <h2>Cadastro de Empregados</h2>
    <div class="user-info">
      <span><?php echo $_SESSION["login"]["nome"] . " " . $_SESSION["login"]["email"]?></span>
      <div class="user-avatar">J</div>
    </div>
  </header>

  <main>
    <h2>Cadastro de Empregado</h2>
    <form action="" method="post">
      <input type="text" name="nomeDoEmpregado" placeholder="Nome do Empregado" required>
      <input type="email" name="emailDoEmpregado" placeholder="E-mail do Empregado" required>
      <select name="cargo" required>
        <option disabled selected>Selecione o Cargo</option>
        <option value="Analista">Analista</option>
        <option value="Desenvolvedor">Desenvolvedor</option>
        <option value="Gerente">Gerente</option>
      </select>
      <input type="number" name="salario" placeholder="Salário" required>
      <input type="date" name="dataDeAdmissao" placeholder="Data de Admissão" required>
      <select name="departamento" required>
        <option disabled selected>Departamento</option>
        <option value="TI">TI</option><option value="RH">RH</option><option value="Financeiro">Financeiro</option>
        <option value="Marketing">Marketing</option><option value="Vendas">Vendas</option>
      </select>
      <button type="submit">Cadastrar</button>
    </form>

<?php 
	if(!isset($_SESSION["empregados"])) {
		$_SESSION["empregados"] = [];
	}
	
	if(isset($_POST["nomeDoEmpregado"]) && isset($_POST["emailDoEmpregado"]) && isset($_POST["cargo"]) && isset($_POST["salario"]) && isset($_POST["dataDeAdmissao"]) && isset($_POST["departamento"])) {
		$empregado = 	["nomeDoEmpregado" => $_POST["nomeDoEmpregado"],
				"emailDoEmpregado" => $_POST["emailDoEmpregado"],
				"cargo" => $_POST["cargo"],
				"salario" => $_POST["salario"],
				"dataDeAdmissao" => $_POST["dataDeAdmissao"],
				"departamento" => $_POST["departamento"]];

		$_SESSION["empregados"][$_SESSION["login"]["email"]][] = $empregado;
		echo "Cadastrado com sucesso";
	}
?>
  </main>
</body>
</html>