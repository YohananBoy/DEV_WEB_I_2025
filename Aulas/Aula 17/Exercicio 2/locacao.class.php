<?php

class Locacao
{
    public $cliente;
    public $veiculo;
    public $dias;
    public $valorDiaria;

    public function __construct($cliente, $veiculo, $dias, $valorDiaria)
    {
        $this->cliente     = $cliente;
        $this->veiculo     = $veiculo;
        $this->dias        = $dias;
        $this->valorDiaria = $valorDiaria;
        $veiculo->alugar();
    }

    public function calcularTotal()
    {
        return $this->valorDiaria * $this->dias;
    }

    public function finalizar()
    {
        $this->veiculo->devolver();
    }

    public function exibirResumo()
    {
        return "[Cliente: {$this->cliente->exibirDados()}\nVeículo: {$this->veiculo->exibirDados()}\nAlugado por {$this->dias} dias - Valor da Diária: {$this->valorDiaria} - Total a ser pago: " . $this->calcularTotal() . "]";
    }
}
