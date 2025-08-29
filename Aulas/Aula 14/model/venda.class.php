<?php
require_once "class_pai.class.php";
require_once "produto.class.php";

class Venda extends ClassePai
{
    public $idProduto;
    public $quantidade;
    public $data;

    public function __construct($id, $idProduto, $quantidade, $data)
    {
        parent::__construct($id, __DIR__ . "/../db/venda.txt");
        $this->idProduto  = $idProduto;
        $this->quantidade = $quantidade;
        $this->data       = $data;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR .
        $this->idProduto . self::SEPARADOR .
        $this->quantidade . self::SEPARADOR .
        $this->data;
    }

    public static function listar($filtroIdProduto)
    {
        $arquivo = fopen(__DIR__ . "/../db/venda.txt", "r");
        $retorno = [];
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            if ($filtroIdProduto === "" || trim($dados[1]) == strval($filtroIdProduto)) {
                $retorno[] = new Venda(
                    $dados[0],
                    $dados[1],
                    $dados[2],
                    trim($dados[3])
                );
            }

        }
        return $retorno;
    }

    public function pegaProduto()
    {
        return Produto::pegaPorId($this->idProduto, __DIR__ . "/../db/produto.txt", "Produto");
    }

    public function calcularTotal()
    {
        $produto = $this->pegaProduto();
        if ($produto) {
            return $this->quantidade * $produto->preco;
        }
        return 0;
    }

}
