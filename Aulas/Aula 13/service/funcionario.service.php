<?php
    include("../model/funcionario.class.php");

    function cadastrarFuncionario($nome, $salario, $telefone) {
        $funcionario = new Funcionario(null, $nome, $salario, $telefone);
        $funcionario->cadastrar();

    }

    function alterarFuncionario($id, $novoNome, $novoSalario, $novoTelefone) {
        
    }

    function removerFuncionario($id) {
        
    }

    function listar($filtroNome) {

    }

?>