<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Top</title>
</head>
<body>
<form action="" method="post">
    <label>Nome:</label>
    <input type="text" name="filtro">
    <button type="submit">Filtrar</button>
</form>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Número</th>
            </tr>
        </thead>
        <tbody>
            <?php
                define("SEPARADOR", "#");
                $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";
                $arquivo = fopen("empregados.txt", "r");
                $linha = "";
                while(!feof($arquivo)) {
                $linha = fgets($arquivo);
                $dadosEmpregado = explode(SEPARADOR, $linha);
                $nome = $dadosEmpregado[1];
                $cpf = $dadosEmpregado[2];
                if(str_contains($nome, $filtro)) {
                    echo "<tr><td>".$nome."</td><td>".$cpf."</td></tr>";
                }
                }
                fclose($arquivo);
            ?>
        </tbody>
    </table>
</body>
</html>