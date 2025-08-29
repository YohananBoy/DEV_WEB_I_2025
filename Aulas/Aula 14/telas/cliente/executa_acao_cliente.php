<?php
require_once "../../service/cliente.service.php";
$acao     = $_POST["acao"] ?? $_GET["acao"] ?? null;
$nome     = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$id       = $_POST["id"] ?? $_GET["id"] ?? null;
if ($acao == "cadastrar") {
    cadastrarCliente($nome, $telefone);
    echo "Cadastrado com sucesso";
} else if ($acao == "alterar") {
    alterarCliente($id, $nome, $telefone);
    echo "Alterado com sucesso";
} else if ($acao == "remover") {
    removerCliente($id);
    echo "Removido com sucesso";
} else {
    echo "Ação inválida";
}
