<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["login"])) header("Location: login.php");

function calculaRisco($gravidade, $idade) {
	$risco = "";
	
	switch($gravidade) {
		case "Leve" : $risco = "Baixo";
		break;
		case "Moderado" : $risco = "Médio";
		break;
		case "Grave" : $risco = "Alto";
		break;
		case "Crítico" : 
			if($idade < 60) $risco = "Muito alto";
			else $risco = "Extremo";
		break;
	}
	
	return $risco;
}
?>
  <div class="container">
    <h2>Pacientes Cadastrados</h2>
    <p><strong>Usuário logado:</strong> <?php echo $_SESSION["login"]["email"]; ?> (Perfil: <?php echo $_SESSION["login"]["perfil"]; ?>)</p>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Idade</th>
          <th>Doença</th>
          <th>Gravidade</th>
          <th>Risco</th>
        </tr>
      </thead>
      <tbody>
		<?php
		if(isset($_SESSION["pacientes"][$_SESSION["login"]["email"]])) {
			foreach($_SESSION["pacientes"][$_SESSION["login"]["email"]] as $paciente) {
				echo	"<tr>" . 
						"<td>". $paciente["nome"] ."</td>" .
						"<td>". $paciente["idade"] ."</td>" .
						"<td>". $paciente["doenca"] ."</td>" .
						"<td>". $paciente["gravidade"] ."</td>" .
						"<td>". calculaRisco($paciente["gravidade"], $paciente["idade"]) ."</td>" .
						"</tr>";
			}
		}
		?>

      </tbody>
    </table>

    <p><a href="cadastro.php">➕ Cadastrar Novo Paciente</a></p>
	<p><a href="login.php">↩️ Voltar ao Login</a></p>
  </div>
</body>
</html>
