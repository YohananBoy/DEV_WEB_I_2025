<?php
require_once "../../model/produto.class.php";
function cadastrarProduto($nome, $preco)
{
    $produto = new Produto(null, $nome, $preco);
    $produto->cadastrar();

}

function pegaProdutoPeloId($id)
{
    return Produto::pegaPorId($id, __DIR__ . "/../db/produto.txt", "Produto");
}

function alterarProduto($id, $novoNome, $novoPreco)
{
    $produto = Produto::pegaPorId($id, __DIR__ . "/../db/produto.txt", "Produto");
    if ($produto) {
        $produto->nome  = $novoNome;
        $produto->preco = $novoPreco;
        $produto->alterar();
    }
}

function removerProduto($id)
{
    $produto = Produto::pegaPorId($id, __DIR__ . "/../db/produto.txt", "Produto");
    if ($produto) {
        $produto->remover();
    }
}

function listarProduto($filtroNome)
{
    $produtos = Produto::listar($filtroNome);
    echo "<table border ='1'><thead><tr><th>Nome</th><th>Preco</th>";
    echo "<th>Ações</th>";
    echo "</tr></thead><tbody>";
    foreach ($produtos as $produto) {
        echo "<tr><td>" . $produto->nome . "</td>";
        echo "<td>" . $produto->preco . "</td>";
        echo "<td><a href='http://localhost:3000/Aulas/Aula%2014/telas/produto/cadastro_produto.php?id=" . $produto->id . "'>Alterar</a>";
        echo " | ";
        echo "<a href='http://localhost:3000/Aulas/Aula%2014/telas/produto/executa_acao_produto.php?acao=remover&id=" . $produto->id . "'>Remover</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

}
