<?php
include("../service/funcionario.service.php");
$acao = $_POST["acao"];
$nome = $_POST["nome"]?$_POST["nome"]:null;
$salario = $_POST["salario"]?$_POST["salario"]:null;
$telefone = $_POST["telefone"]?$_POST["telefone"]:null;
$id = $_POST["id"]?$_POST["id"]:null;

if($acao == "cadastrar") {
    cadastrarFuncionario($nome, $salario, $telefone);
    echo "Cadastrado com sucesso";
}