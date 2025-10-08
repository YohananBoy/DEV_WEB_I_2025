<?php
require_once "entidade.class.php";

abstract class Veiculo extends Entidade
{
    public $marca;
    public $modelo;
    public $ano;
    public $disponivel;

    public function __construct($marca, $modelo, $ano, $disponivel)
    {
        $this->marca      = $marca;
        $this->modelo     = $modelo;
        $this->ano        = $ano;
        $this->disponivel = $disponivel;
    }

    public function alugar()
    {
        $this->disponivel = $this->disponivel ? false : $this->disponivel;
    }
    public function devolver()
    {
        $this->disponivel = ! $this->disponivel ? true : $this->disponivel;
    }

    public function exibirDados()
    {
        $estado = $this->disponivel ? "Disponível" : "Alugado";
        return "Marca: {$this->marca} - Modelo: {$this->modelo} - Ano: {$this->ano} - Estado: {$estado}\n";
    }
}
