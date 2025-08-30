<?php
require_once "../../model/cliente.class.php";
function cadastrarCliente($nome, $telefone)
{
    $cliente = new Cliente(null, $nome, $telefone);
    $cliente->cadastrar();

}

function pegaClientePeloId($id)
{
    return Cliente::pegaPorId($id, __DIR__ . "/../db/cliente.txt", "Cliente");
}

function alterarCliente($id, $novoNome, $novoTelefone)
{
    $cliente = Cliente::pegaPorId($id, __DIR__ . "/../db/cliente.txt", "Cliente");
    if ($cliente) {
        $cliente->nome     = $novoNome;
        $cliente->telefone = $novoTelefone;
        $cliente->alterar();
    }
}

function removerCliente($id)
{
    $cliente = Cliente::pegaPorId($id, __DIR__ . "/../db/cliente.txt", "Cliente");
    if ($cliente) {
        $cliente->remover();
    }
}

function listarCliente($filtroNome)
{
    $clientes = Cliente::listar($filtroNome);
    echo "<table border ='1'><thead><tr><th>Nome</th><th>Telefone</th>";
    echo "<th>Ações</th>";
    echo "</tr></thead><tbody>";
    foreach ($clientes as $cliente) {
        echo "<tr><td>" . $cliente->nome . "</td>";
        echo "<td>" . $cliente->telefone . "</td>";
        echo "<td><a href='http://localhost:3000/Aulas/Aula%2014/telas/cliente/cadastro_cliente.php?id=" . $cliente->id . "'>Alterar</a>";
        echo " | ";
        echo "<a href='http://localhost:3000/Aulas/Aula%2014/telas/cliente/executa_acao_cliente.php?acao=remover&id=" . $cliente->id . "'>Remover</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

}
