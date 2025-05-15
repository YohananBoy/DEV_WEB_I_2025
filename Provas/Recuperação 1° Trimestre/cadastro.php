<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Paciente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["login"])) header("Location: login.php");
?>
  <div class="container">
    <h2>Cadastro de Paciente</h2>
    <p><strong>Usuário logado: </strong><?php echo $_SESSION["login"]["email"]; ?></p>

    <form method="POST" action="cadastro.php">
      <label for="nome">Nome do Paciente:</label>
      <input type="text" name="nome" required>

      <label for="genero">Gênero:</label>
      <select name="genero" required>
        <option>Masculino</option>
        <option>Feminino</option>
        <option>Outro</option>
      </select>

      <label for="idade">Idade:</label>
      <input type="number" name="idade" required>

      <label for="sangue">Tipo Sanguíneo:</label>
      <select name="sangue" required>
        <option>A+</option>
        <option>A−</option>
        <option>B+</option>
        <option>B−</option>
        <option>AB+</option>
        <option>AB−</option>
        <option>O+</option>
        <option>O−</option>
      </select>

      <label for="doenca">Doença Diagnosticada:</label>
      <input type="text" name="doenca" required>

      <label for="gravidade">Gravidade:</label>
      <select name="gravidade" required>
        <option>Leve</option>
        <option>Moderado</option>
        <option>Grave</option>
        <option>Crítico</option>
      </select>

      <label for="data">Data de Admissão:</label>
      <input type="date" name="data" required>

      <button type="submit">Cadastrar Paciente</button>
    </form>

    <p><a href="lista.php">🔙 Ir para Lista de Pacientes</a></p>
	<p><a href="login.php">↩️ Voltar ao Login</a></p>
	
	<?php
		if(!isset($_SESSION["pacientes"][$_SESSION["login"]["email"]])) {
			$_SESSION["pacientes"][$_SESSION["login"]["email"]] = [];
		}
	
		if(isset($_POST["nome"], $_POST["genero"], $_POST["idade"], $_POST["sangue"], $_POST["doenca"], $_POST["gravidade"], $_POST["data"])) {
				$paciente = ["nome" => $_POST["nome"],
							"genero" => $_POST["genero"],
							"idade" => $_POST["idade"],
							"sangue" => $_POST["sangue"],
							"doenca" => $_POST["doenca"],
							"gravidade" => $_POST["gravidade"],
							"data" => $_POST["data"]];
							
				$_SESSION["pacientes"][$_SESSION["login"]["email"]][] = $paciente;
				echo "Paciente " . $paciente["nome"] . " cadastrado com sucesso!";
		}
	?>
  </div>
</body>
</html>
