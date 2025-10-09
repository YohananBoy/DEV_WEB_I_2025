<?php
require_once "veiculo.class.php";

class Moto extends Veiculo
{
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $disponivel, $cilindradas)
    {
        parent::__construct($marca, $modelo, $ano, $disponivel);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados()
    {
        return parent::exibirDados() . " Cilindradas: {$this->cilindradas}";
    }
}
