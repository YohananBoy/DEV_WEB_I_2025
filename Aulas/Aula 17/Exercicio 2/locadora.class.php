<?php

class Locadora
{
    public $clientes, $veiculos, $locacoes;

    public function __construct($clientes, $veiculos, $locacoes)
    {
        $this->clientes = $clientes;
        $this->veiculos = $veiculos;
        $this->locacoes = $locacoes;
    }

    public function adicionarCliente(Cliente $c)
    {
        array_push($this->clientes, $c);
    }

    public function adicionarVeiculo(Veiculo $v)
    {
        array_push($this->veiculos, $v);
    }

    public function registrarLocacao(Locacao $l)
    {
        array_push($this->locacoes, $l);
    }

    public function registrarDevolucao(Locacao $locacao)
    {
        foreach ($this->locacoes as $index => $l) {
            if ($l === $locacao) {
                $locacao->veiculo->devolver();
                unset($this->locacoes[$index]);
                break;
            }
        }
    }

    public function listarVeiculosDisponiveis()
    {
        $retorno = "";
        foreach ($this->veiculos as $veiculo) {
            $retorno = $veiculo->disponivel ? $retorno . $veiculo->exibirDados() . "\n" : $retorno;
        }
        return $retorno;
    }

    public function listarLocacoes()
    {
        $retorno = "";
        foreach ($this->locacoes as $locacao) {
            $retorno = "Cliente: {$locacao->cliente->exibirDados()} - Veículo: {$locacao->veiculo->exibirDados()} - Alugado por {$locacao->dias} dias - Valor da diária: {$locacao->valorDiaria}";
            return $retorno;
        }
    }
}
