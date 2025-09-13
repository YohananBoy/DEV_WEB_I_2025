<?php
require_once dirname(__DIR__) . "/../service/livro.service.php";

//se existir post["acao"] usa ele, se não usa get["acao"]. se nenhum dos dois existir, null
$acao           = $_POST["acao"] ?? $_GET["acao"] ?? null;
$id             = $_POST["id"] ?? $_GET["id"] ?? null;
$titulo         = $_POST["titulo"] ?? null;
$autor          = $_POST["autor"] ?? null;
$dataPublicacao = $_POST["dataPublicacao"] ?? null;

if ($acao == "cadastrar") {
    cadastrarLivro($titulo, $autor, $dataPublicacao);
    echo "Cadastrado com sucesso";
} elseif ($acao == "alterar") {
    alterarLivro($id, $titulo, $autor, $dataPublicacao);
    echo "Alterado com sucesso";
} elseif ($acao == "remover") {
    removerLivro($id);
    echo "Removido com sucesso";
}
