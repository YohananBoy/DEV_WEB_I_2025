<?php
require_once "class_pai.class.php";
class Funcionario extends ClassePai
{
    public $nome;
    public $telefone;
    public $salario;

    public function __construct($id, $nome, $salario, $telefone)
    {
        parent::__construct($id, __DIR__ . "/../db/funcionario.txt");
        $this->nome     = $nome;
        $this->salario  = $salario;
        $this->telefone = $telefone;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR . $this->nome . self::SEPARADOR . $this->salario . self::SEPARADOR . $this->telefone;
    }
    public static function listar($filtroNome)
    {
        $arquivo = fopen("../../db/funcionario.txt", "r");
        $retorno = [];
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados  = explode(self::SEPARADOR, $linha);
            $nome   = strtolower($dados[1]);
            $filtro = strtolower($filtroNome);
            if ($filtro === "" || str_contains($nome, $filtro)) {
                array_push($retorno, new Funcionario($dados[0], $dados[1], $dados[2], $dados[3]));
            }

        }
        return $retorno;
    }
}
