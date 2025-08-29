<?php
require_once "../../service/venda.service.php";

$acao = $_POST["acao"] ?? $_GET["acao"] ?? null;

$id         = $_POST["id"] ?? $_GET["id"] ?? null;
$idProduto  = $_POST["idProduto"] ?? $_GET["idProduto"] ?? null;
$quantidade = $_POST["quantidade"] ?? $_GET["quantidade"] ?? null;
$data       = $_POST["data"] ?? $_GET["data"] ?? null;

if ($acao == "cadastrar") {
    cadastrarVenda($idProduto, $quantidade, $data);
    echo "Venda cadastrada com sucesso";
} else if ($acao == "alterar") {
    alterarVenda($id, $idProduto, $quantidade, $data);
    echo "Venda alterada com sucesso";
} else if ($acao == "remover") {
    removerVenda($id);
    echo "Venda removida com sucesso";
} else {
    echo "Ação inválida";
}
