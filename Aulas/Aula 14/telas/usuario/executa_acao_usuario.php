<?php
require_once "../../service/usuario.service.php";
$acao     = $_POST["acao"] ?? $_GET["acao"] ?? null;
$nome     = isset($_POST['nome']) ? $_POST['nome'] : null;
$email  = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$id       = $_POST["id"] ?? $_GET["id"] ?? null;
if ($acao == "cadastrar") {
    cadastrarUsuario($nome, $email, $senha);
    echo "Cadastrado com sucesso";
} else if ($acao == "alterar") {
    alterarUsuario($id, $nome, $email, $senha);
    echo "Alterado com sucesso";
} else if ($acao == "remover") {
    removerUsuario($id);
    echo "Removido com sucesso";
} else {
    echo "Ação inválida";
}
