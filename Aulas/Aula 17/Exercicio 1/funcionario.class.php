<?php

abstract class Funcionario
{
    public $nome;
    public $salario;

    public function __construct($nome, $salario)
    {
        $this->nome    = $nome;
        $this->salario = $salario;
    }

    abstract public function calcularBonus();

    public static function listar($funcionarios)
    {
        echo "Lista de funcionários\n";
        foreach ($funcionarios as $funcionario) {
            echo "Nome: " . $funcionario->nome . " - Salário: " . $funcionario->salario . " - Salário com bônus: " . $funcionario->calcularBonus() . "\n";
        }
    }
}
