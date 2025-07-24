<?php
    include("../model/funcionario.class.php");
    function cadastrarFuncionario($nome, $salario, $telefone) {
        $funcionario = new Funcionario(null, $nome, $salario, $telefone);
        $funcionario->cadastrar();

    }

    function pegaFuncionarioPeloId($id) {
        return Funcionario::pegaPorId($id);
    }

    function alterarFuncionario($id, $novoNome, $novoSalario, $novoTelefone) {
        
    }

    function removerFuncionario($id) {
        
    }

    function listarFuncionario($filtroNome) {
        $funcionarios = Funcionario::listar($filtroNome);
        echo "<table border ='1'><thead><tr><th>Nome</th><th>Salário</th><th>Telefone</th>";
        echo "<th>Ações</th>";
        echo "</tr></thead><tbody>";
        foreach($funcionarios as $funcionario) {
            echo "<tr><td>".$funcionario->nome."</td>";
            echo "<td>".$funcionario->salario."</td>";
            echo "<td>".$funcionario->telefone."</td>";
            echo "<td><a href='http://localhost/yohanan/DEV_WEB_I_2025/Aulas/Aula%2013/telas/cadastro_funcionario.php?id=".$funcionario->id."'>Alterar</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";

    }

?>