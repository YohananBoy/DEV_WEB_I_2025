<?php
require_once "class_pai.class.php";
class Usuario extends ClassePai
{
    public $nome;
    public $email;
    public $senha;

    public function __construct($id, $nome, $email, $senha)
    {
        parent::__construct($id, __DIR__ . "/../db/usuario.txt");
        $this->nome     = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR . $this->nome . self::SEPARADOR . $this->email . self::SEPARADOR . $this->senha;
    }
    public static function listar($filtroNome)
    {
        $arquivo = fopen("../../db/usuario.txt", "r");
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
                array_push($retorno, new Usuario($dados[0], $dados[1], $dados[2], $dados[3]));
            }

        }
        return $retorno;
    }
}
