<?php
require_once "veiculo.class.php";

class Carro extends Veiculo
{
    public $qtdPortas;

    public function __construct($marca, $modelo, $ano, $disponivel, $qtdPortas)
    {
        parent::__construct($marca, $modelo, $ano, $disponivel);
        $this->qtdPortas = $qtdPortas;

    }

    public function exibirDados()
    {
        return parent::exibirDados() . "Portas: {$this->qtdPortas}";
    }
}
