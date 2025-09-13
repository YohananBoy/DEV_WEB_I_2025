<?php
require_once dirname(__DIR__) . "/model/classe_pai.class.php";

class Usuario extends ClassePai
{
    public $nome;
    public $email;
    public $senha;

    public function __construct($id, $nome, $email, $senha)
    {
        parent::__construct($id, dirname(__DIR__) . "/db/usuario.txt");
        $this->nome  = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR . $this->nome . self::SEPARADOR . $this->email . self::SEPARADOR . $this->senha;
    }

    public static function pegaPorId($id)
    {
        $arquivo = fopen(dirname(__DIR__) . "/db/usuario.txt", "r");

        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            //separa os dados numa array e se for o id do objeto desejado, instancia o objeto com seus dados
            $dados = explode(self::SEPARADOR, trim($linha));
            if ($dados[0] == $id) {
                fclose($arquivo);
                return new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);
            }
        }

        fclose($arquivo);
        return false;

    }

    public static function listar($filtro)
    {
        $arquivo = fopen(dirname(__DIR__) . "/db/usuario.txt", "r");
        $retorno = [];

        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            //separa os dados numa array e compara o filtro com o nome
            $dados  = explode(self::SEPARADOR, $linha);
            $nome   = strtolower($dados[1]);
            $filtro = strtolower($filtro);
            if ($filtro == "" || str_contains($nome, $filtro)) {
                array_push($retorno, new Usuario($dados[0], $dados[1], $dados[2], $dados[3]));
            }
        }

        return $retorno;
    }
}
