<?php
require_once "../../service/venda.service.php";

$acao = $_POST["acao"] ?? $_GET["acao"] ?? null;

$id               = $_POST["id"] ?? $_GET["id"] ?? null;
$idFuncionario    = $_POST["idFuncionario"] ?? $_GET["idFuncionario"] ?? null;
$idCliente        = $_POST["idCliente"] ?? $_GET["idCliente"] ?? null;
$data             = $_POST["data"] ?? $_GET["data"] ?? null;
$formaDePagamento = $_POST["formaDePagamento"] ?? $_GET["formaDePagamento"] ?? null;
$desconto         = $_POST["desconto"] ?? $_GET["desconto"] ?? null;

$idProdutos    = $_POST['idProduto'];
$quantidades   = $_POST['quantidade'];

$itens = [];
for ($i = 0; $i < count($idProdutos); $i++) {
    $itens[] = [
        "idProduto"    => $idProdutos[$i],
        "quantidade"   => $quantidades[$i],
    ];
}

if ($acao == "cadastrar") {
    cadastrarVenda($idFuncionario, $idCliente, $data, $formaDePagamento, $desconto, $itens);
    echo "Venda cadastrada com sucesso";
} else if ($acao == "alterar") {
    alterarVenda($id, $idFuncionario, $idCliente, $data, $formaDePagamento, $desconto, $itens);
    echo "Venda alterada com sucesso";
} else if ($acao == "remover") {
    removerVenda($id);
    echo "Venda removida com sucesso";
} else {
    echo "Ação inválida";
}
