<?php
require_once "class_pai.class.php";
class Cliente extends ClassePai
{
    public $nome;
    public $telefone;

    public function __construct($id, $nome, $telefone)
    {
        parent::__construct($id, __DIR__ . "/../db/cliente.txt");
        $this->nome     = $nome;
        $this->telefone = $telefone;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR . $this->nome . self::SEPARADOR . $this->telefone;
    }
    public static function listar($filtroNome)
    {
        $arquivo = fopen("../../db/cliente.txt", "r");
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
                array_push($retorno, new Cliente($dados[0], $dados[1], $dados[2]));
            }

        }
        return $retorno;
    }
}
