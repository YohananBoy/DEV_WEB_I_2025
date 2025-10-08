<?php
require_once "funcionario.class.php";

class Desenvolvedor extends Funcionario
{
    public function calcularBonus()
    {
        return $this->salario * 1.1;
    }
}
