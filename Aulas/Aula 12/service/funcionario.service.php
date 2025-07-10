<?php
    function cadastrarFuncionario($nome, $salario, $telefone) {
        $funcionario = new Funcionario(null, $nome, $salario, $telefone);
        echo $funcionario->nome;
        echo $funcionario->salario;
    }
    
    function alterarFuncionario($id, $nome, $salario, $telefone) {

    }

    function removerFuncionario($id) {

    }
    
    function listar($nome) {

    }
?>