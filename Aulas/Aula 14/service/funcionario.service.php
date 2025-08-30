<?php
require_once "../../model/funcionario.class.php";
function cadastrarFuncionario($nome, $salario, $telefone)
{
    $funcionario = new Funcionario(null, $nome, $salario, $telefone);
    $funcionario->cadastrar();

}

function pegaFuncionarioPeloId($id)
{
    return Funcionario::pegaPorId($id, __DIR__ . "/../db/funcionario.txt", "Funcionario");
}

function alterarFuncionario($id, $novoNome, $novoSalario, $novoTelefone)
{
    $funcionario = Funcionario::pegaPorId($id, __DIR__ . "/../db/funcionario.txt", "Funcionario");
    if ($funcionario) {
        $funcionario->nome     = $novoNome;
        $funcionario->salario  = $novoSalario;
        $funcionario->telefone = $novoTelefone;
        $funcionario->alterar();
    }
}

function removerFuncionario($id)
{
    $funcionario = Funcionario::pegaPorId($id, __DIR__ . "/../db/funcionario.txt", "Funcionario");
    if ($funcionario) {
        $funcionario->remover();
    }
}

function listarFuncionario($filtroNome)
{
    $funcionarios = Funcionario::listar($filtroNome);
    echo "<table border ='1'><thead><tr><th>Nome</th><th>Salário</th><th>Telefone</th>";
    echo "<th>Ações</th>";
    echo "</tr></thead><tbody>";
    foreach ($funcionarios as $funcionario) {
        echo "<tr><td>" . $funcionario->nome . "</td>";
        echo "<td>" . $funcionario->salario . "</td>";
        echo "<td>" . $funcionario->telefone . "</td>";
        echo "<td><a href='http://localhost:3000/Aulas/Aula%2014/telas/funcionario/cadastro_funcionario.php?id=" . $funcionario->id . "'>Alterar</a>";
        echo " | ";
        echo "<a href='http://localhost:3000/Aulas/Aula%2014/telas/funcionario/executa_acao_funcionario.php?acao=remover&id=" . $funcionario->id . "'>Remover</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

}
