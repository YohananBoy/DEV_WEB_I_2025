<?php
require_once dirname(__DIR__) . "/../service/usuario.service.php";

//se existir post["acao"] usa ele, se não usa get["acao"]. se nenhum dos dois existir, null
$acao  = $_POST["acao"] ?? $_GET["acao"] ?? null;
$id    = $_POST["id"] ?? $_GET["id"] ?? null;
$nome  = $_POST["nome"] ?? null;
$email = $_POST["email"] ?? null;
$senha = $_POST["senha"] ?? null;

if ($acao == "cadastrar") {
    cadastrarUsuario($nome, $email, $senha);
    echo "Cadastrado com sucesso";
} elseif ($acao == "alterar") {
    alterarUsuario($id, $nome, $email, $senha);
    echo "Alterado com sucesso";
} elseif ($acao == "remover") {
    removerUsuario($id);
    echo "Removido com sucesso";
}
