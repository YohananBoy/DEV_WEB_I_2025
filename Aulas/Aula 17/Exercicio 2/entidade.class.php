<?php
abstract class Entidade
{
    public function criar($objeto, $array)
    {
        array_push($array, $objeto);
    }

    public function atualizar($objetoAntigo, $objetoNovo, &$array)
    {
        foreach ($array as $i => $instancia) {
            if ($instancia === $objetoAntigo) {
                $array[$i] = $objetoNovo;
                return true;
            }
        }
        return false;
    }

    public function deletar($objeto, $array)
    {
        foreach ($array as $i => $instancia) {
            if ($instancia === $objeto) {
                unset($array[$i]);
            }
        }
    }

    public function listar($array)
    {
        foreach ($array as $instancia) {
            echo $instancia->exibirDados();
        }
    }
}
