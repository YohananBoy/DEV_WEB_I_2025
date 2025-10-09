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

    public function atualizarCliente(Cliente $c, $nome, $cpf, $telefone)
    {
        $c->nome     = $nome != "" ? $nome : $c->nome;
        $c->cpf      = $cpf != "" ? $cpf : $c->cpf;
        $c->telefone = $telefone != "" ? $telefone : $c->telefone;
    }

    public function removerCliente(Cliente $c)
    {
        foreach ($this->clientes as $index => $cliente) {
            if ($cliente === $c) {
                unset($this->clientes[$index]);
            }
        }
    }

    public function listarClientes()
    {
        foreach ($this->clientes as $cliente) {
            echo $cliente->exibirDados() . "\n";
        }
    }

    public function adicionarVeiculo(Veiculo $v)
    {
        array_push($this->veiculos, $v);
    }

    public function atualizarCarro(Carro $v, $marca, $modelo, $ano, $disponivel, $qtdPortas)
    {
        $v->marca      = $marca != "" ? $marca : $v->marca;
        $v->modelo     = $modelo != "" ? $modelo : $v->modelo;
        $v->ano        = $ano != "" ? $ano : $v->ano;
        $v->disponivel = $disponivel != "" ? $disponivel : $v->disponivel;
        $v->qtdPortas  = $qtdPortas != "" ? $qtdPortas : $v->qtdPortas;
    }

    public function atualizarMoto(Moto $v, $marca, $modelo, $ano, $disponivel, $cilindradas)
    {
        $v->marca       = $marca != "" ? $marca : $v->marca;
        $v->modelo      = $modelo != "" ? $modelo : $v->modelo;
        $v->ano         = $ano != "" ? $ano : $v->ano;
        $v->disponivel  = $disponivel != "" ? $disponivel : $v->disponivel;
        $v->cilindradas = $cilindradas != "" ? $cilindradas : $v->cilindradas;
    }

    public function removerVeiculo(Veiculo $v)
    {
        foreach ($this->veiculos as $index => $veiculo) {
            if ($veiculo === $v) {
                unset($this->veiculos[$index]);
            }
        }
    }

    public function listarVeiculos()
    {
        foreach ($this->veiculos as $veiculo) {
            echo $veiculo->exibirDados() . "\n";
        }
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
            $retorno .= $locacao->exibirResumo() . "\n";
        }
        return $retorno;
    }
}
