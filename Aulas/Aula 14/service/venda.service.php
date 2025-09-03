<?php
require_once "../../model/venda.class.php";

function cadastrarVenda($idFuncionario, $idCliente, $data, $formaDePagamento, $desconto, $itens)
{
    $objItens = [];
    foreach ($itens as $i) {
        $objItens[] = new ItemVenda($i["idProduto"], $i["quantidade"]);
    }

    $venda = new Venda(null, $idFuncionario, $idCliente, $data, $formaDePagamento, $desconto, $objItens);
    $venda->cadastrar();
}

function pegaVendaPeloId($id)
{
    return Venda::pegaPorId($id, __DIR__ . "/../db/venda.txt", "Venda");
}

function alterarVenda($id, $novoIdFuncionario, $novoIdCliente, $novaData, $novaFormaDePagamento, $novoDesconto, $novosItens)
{
    $venda = Venda::pegaPorId($id, __DIR__ . "/../db/venda.txt", "Venda");
    if ($venda) {
        $venda->idFuncionario    = $novoIdFuncionario;
        $venda->idCliente        = $novoIdCliente;
        $venda->data             = $novaData;
        $venda->formaDePagamento = $novaFormaDePagamento;
        $venda->desconto         = $novoDesconto;

        $venda->itens = [];
        foreach ($novosItens as $i) {
            $venda->adicionarItem(new ItemVenda($i["idProduto"], $i["quantidade"]));
        }

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
                <th>Funcionário</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Forma de Pagamento</th>
                <th>Desconto</th>
                <th>Itens</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>";

    foreach ($vendas as $venda) {
        $funcionario     = $venda->pegaFuncionario();
        $cliente         = $venda->pegaCliente();
        $nomeFuncionario = $funcionario ? $funcionario->nome : "Funcionario não encontrado";
        $nomeCliente     = $cliente ? $cliente->nome : "Cliente não encontrado";
        $total           = $venda->calcularTotal();

        $htmlItens = "<ul>";
        foreach ($venda->itens as $item) {
            $produto     = $item->pegaProduto();
            $nomeProduto = $produto ? $produto->nome : "Produto não encontrado";
            $htmlItens .= "<li>{$nomeProduto} - {$item->quantidade} unid.</li>";
        }
        $htmlItens .= "</ul>";

        echo "<tr>";
        echo "<td>{$nomeFuncionario}</td>";
        echo "<td>{$nomeCliente}</td>";
        echo "<td>{$venda->data}</td>";
        echo "<td>{$venda->formaDePagamento}</td>";
        echo "<td>{$venda->desconto}%</td>";
        echo "<td>{$htmlItens}</td>";
        echo "<td>R$ {$total}</td>";

        echo "<td>
                <a href='http://localhost/dev_web_i_2025/Aulas/Aula%2014/telas/venda/cadastro_venda.php?id={$venda->id}'>Alterar</a> |
                <a href='http://localhost/dev_web_i_2025/Aulas/Aula%2014/telas/venda/executa_acao_venda.php?acao=remover&id={$venda->id}'>Remover</a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}
