<?
    include("../model/funcionario.class.php");
    function cadastrarFuncionario($nome, $salario, $telefone) {
        $funcionario = new Funcionario(null, $nome, $salario, $telefone);
        $funcionario->cadastrar();

    }

    function alterarFuncionario($id, $novoNome, $novoSalario, $novoTelefone) {
        
    }

    function removerFuncionario($id) {
        
    }

    function listarFuncionario($filtroNome) {
        $funcionarios = Funcionario::listar();
        echo "<table border='1'><thead><tr><th>Nome</th><th>Salário</th><th>Telefone</th></tr></thead><tbody>";
        foreach($funcionarios as $funcionario) {
            echo "<tr><td>".$funcionario->nome."</td>";
            echo "<td>".$funcionario->salario."</td>";
            echo "<td>".$funcionario->telefone."</td></tr>";
        }
        echo "</tbody></table>";

    }

?>