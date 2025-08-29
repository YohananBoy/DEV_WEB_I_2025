<?php
require_once "../../model/venda.class.php";

function cadastrarVenda($idProduto, $quantidade, $data)
{
    $venda = new Venda(null, $idProduto, $quantidade, $data);
    $venda->cadastrar();
}

function pegaVendaPeloId($id)
{
    return Venda::pegaPorId($id, __DIR__ . "/../db/venda.txt", "Venda");
}

function alterarVenda($id, $novoIdProduto, $novaQuantidade, $novaData)
{
    $venda = Venda::pegaPorId($id, __DIR__ . "/../db/venda.txt", "Venda");
    if ($venda) {
        $venda->idProduto  = $novoIdProduto;
        $venda->quantidade = $novaQuantidade;
        $venda->data       = $novaData;
        $venda->alterar();
    }
}

function removerVenda($id)
{
    $venda = Venda::pegaPorId($id, __DIR__ . "/../db/venda.txt", "Venda");
    if ($venda) {
        $venda->remover();
    }
}

function listarVenda($filtroIdProduto = "")
{
    $vendas = Venda::listar($filtroIdProduto);

    echo "<table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>";

    foreach ($vendas as $venda) {
        $produto     = $venda->pegaProduto();
        $nomeProduto = $produto ? $produto->nome : "Produto não encontrado";
        $total       = $venda->calcularTotal();

        echo "<tr>";
        echo "<td>{$produto->id}</td>";
        echo "<td>{$nomeProduto}</td>";
        echo "<td>{$venda->quantidade}</td>";
        echo "<td>{$venda->data}</td>";
        echo "<td>{$total}</td>";

        echo "<td>
                <a href='http://localhost:3000/Aulas/Aula%2014/telas/venda/cadastro_venda.php?id={$venda->id}'>Alterar</a> |
                <a href='http://localhost:3000/Aulas/Aula%2014/telas/venda/executa_acao_venda.php?acao=remover&id={$venda->id}'>Remover</a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}
