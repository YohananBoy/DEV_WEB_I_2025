<?php
require_once "entidade.class.php";

class Locacao extends Entidade
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
    }

    public function calcularTotal()
    {
        return $this->valorDiaria * $this->dias;
    }

    public function finalizar()
    {
        $this->veiculo->devolver();
    }

    public function exibirDados()
    {
        return "Cliente: {$this->cliente->nome} - Veículo: {$this->veiculo->marca} {$this->veiculo->modelo} {$this->veiculo->ano} - Alugado por {$this->dias} dias - Valor da Diária: {$this->valorDiaria} - Total a ser pago: " . $this->calcularTotal() . "\n";
    }
}
