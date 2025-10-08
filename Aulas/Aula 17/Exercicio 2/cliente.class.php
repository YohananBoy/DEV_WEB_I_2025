<?php
require_once "entidade.class.php";

class Cliente extends Entidade
{
    public $nome;
    public $cpf;
    public $telefone;

    public function __construct($nome, $cpf, $telefone)
    {
        $this->nome     = $nome;
        $this->cpf      = $cpf;
        $this->telefone = $telefone;
    }

    public function exibirDados()
    {
        return "Nome: {$this->nome} - CPF: {$this->cpf} - Telefone: {$telefone}\n";
    }
}
