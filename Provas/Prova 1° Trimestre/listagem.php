
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Empregados</title>
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
<?php session_start();
var_dump($_SESSION);

 ?>
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
    <h2>Empregados Cadastrados</h2>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Cargo</th>
          <th>E-mail</th>
          <th>Salário (R$)</th>
          <th>Imposto (R$)</th>
        </tr>
      </thead>
      <tbody>
	<?php 
		foreach($_SESSION["empregados"][$_SESSION["login"]["email"]] as $empregado) {
			$imposto;
			if($empregado["salario"] <= 5000) {
				if($empregado["cargo"] == "Analista") {
					$imposto = ($empregado["salario"]/100) * 10;
				}
				if($empregado["cargo"] == "Gerente") {
					$imposto = ($empregado["salario"]/100) * 12;
				}
				if($empregado["cargo"] == "Desenvolvedor") {
					$imposto = ($empregado["salario"]/100) * 11;
				}
			}

			if($empregado["salario"] > 5000 && $empregado["salario"] <= 15000) {
				if($empregado["cargo"] == "Analista") {
					$imposto = ($empregado["salario"]/100) * 12;
				}
				if($empregado["cargo"] == "Gerente") {
					$imposto = ($empregado["salario"]/100) * 14;
				}
				if($empregado["cargo"] == "Desenvolvedor") {
					$imposto = ($empregado["salario"]/100) * 13;
				}
			}

			if($empregado["salario"] > 15000) {
				$imposto = ($empregado["salario"]/100) * 18;
			}
			echo 	"<tr>".
					"<td>".$empregado["nomeDoEmpregado"]."</td>".
					"<td>".$empregado["cargo"]."</td>".
					"<td>".$empregado["emailDoEmpregado"]."</td>".
					"<td>".$empregado["salario"]."</td>".
					"<td>".$imposto."</td>".
				"</tr>";
		}
	?>
      </tbody>
    </table>
  </main>
</body>
</html>