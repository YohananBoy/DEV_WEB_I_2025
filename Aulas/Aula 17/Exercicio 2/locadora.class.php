<?php
require_once "entidade.class.php";

class Locadora extends Entidade
{
    public $clientes, $veiculos, $locacoes;

    public function __construct($clientes, $veiculos, $locacoes)
    {
        $this->clientes = $clientes;
        $this->veiculos = $veiculos;
        $this->locacoes = $locacoes;
    }

    public function adicionarCliente($cliente)
    {
        array_push($this->clientes, $cliente);
    }

    public function adicionarVeiculo($veiculo)
    {
        array_push($this->veiculos, $veiculo);
    }

    public function registrarLocacao($locacao)
    {
        array_push($this->locacoes, $locacao);
    }

    public function registrarDevolucao($locacao)
    {
        foreach ($this->locacoes as $index => $l) {
            if ($l === $locacao) {
                unset($this->locacoes[$index]);
                break;
            }
        }

    }

    public function listarVeiculosDisponiveis()
    {
        $retorno = "";
        foreach ($this->veiculos as $veiculo) {
            $retorno = $veiculo->disponivel ? $retorno . $veiculo->marca . $veiculo->modelo . $veiculo->ano . "\n" : $retorno;
        }
        return $retorno;
    }

    public function listarLocacoes()
    {
        $retorno = "";
        foreach ($this->locacoes as $locacao) {
            $retorno = "Cliente: {$this->cliente} - Veículo: {$this->veiculo->marca} {$this->veiculo->modelo} {$this->veiculo->ano} - Alugado por {$this->dias} dias - Valor da diária: {$this->valorDiaria}";
            return $retorno;

        }
    }
}
