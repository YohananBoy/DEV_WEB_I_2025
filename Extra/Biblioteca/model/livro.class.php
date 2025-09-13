<?php
require_once dirname(__DIR__) . "/model/classe_pai.class.php";

class Livro extends ClassePai
{
    public $titulo;
    public $autor;
    public $dataPublicacao;

    public function __construct($id, $titulo, $autor, $dataPublicacao)
    {
        parent::__construct($id, dirname(__DIR__) . "/db/livro.txt");
        $this->titulo         = $titulo;
        $this->autor          = $autor;
        $this->dataPublicacao = $dataPublicacao;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR . $this->titulo . self::SEPARADOR . $this->autor . self::SEPARADOR . $this->dataPublicacao;
    }

    public static function pegaPorId($id)
    {
        $arquivo = fopen(dirname(__DIR__) . "/db/livro.txt", "r");

        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            //separa os dados numa array e se for o id do objeto desejado, instancia o objeto com seus dados
            $dados = explode(self::SEPARADOR, trim($linha));
            if ($dados[0] == $id) {
                fclose($arquivo);
                return new Livro($dados[0], $dados[1], $dados[2], $dados[3]);
            }
        }

        fclose($arquivo);
        return false;

    }

    public static function listar($filtro)
    {
        $arquivo = fopen(dirname(__DIR__) . "/db/livro.txt", "r");
        $retorno = [];

        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            //separa os dados numa array e compara o filtro com o titulo
            $dados  = explode(self::SEPARADOR, $linha);
            $titulo = strtolower($dados[1]);
            $filtro = strtolower($filtro);
            if ($filtro == "" || str_contains($titulo, $filtro)) {
                array_push($retorno, new Livro($dados[0], $dados[1], $dados[2], $dados[3]));
            }
        }

        return $retorno;
    }
}
