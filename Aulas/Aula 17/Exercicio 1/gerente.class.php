<?php
require_once "funcionario.class.php";

class Gerente extends Funcionario
{
    public function calcularBonus()
    {
        return $this->salario * 1.2;
    }
}
