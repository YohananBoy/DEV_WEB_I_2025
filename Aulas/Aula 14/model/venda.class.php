<?php
require_once "class_pai.class.php";
require_once "funcionario.class.php";
require_once "produto.class.php";
require_once "cliente.class.php";
require_once "item_venda.class.php";

class Venda extends ClassePai
{
    public $idFuncionario;
    public $idCliente;
    public $data;
    public $formaDePagamento;
    public $desconto;
    public $itens = [];

    public function __construct($id, $idFuncionario, $idCliente, $data, $formaDePagamento, $desconto, $itens)
    {
        parent::__construct($id, __DIR__ . "/../db/venda.txt");
        $this->idFuncionario    = $idFuncionario;
        $this->idCliente        = $idCliente;
        $this->data             = $data;
        $this->formaDePagamento = $formaDePagamento;
        $this->desconto         = $desconto;
        $this->itens            = $itens;
    }

    public function montaLinhaDados()
    {
        $itensStr = [];
        foreach ($this->itens as $item) {
            $itensStr[] = $item->idProduto . "," . $item->quantidade;
        }

        $itensConcatenados = implode("|", $itensStr);

        return $this->id . self::SEPARADOR .
        $this->idFuncionario . self::SEPARADOR .
        $this->idCliente . self::SEPARADOR .
        $this->data . self::SEPARADOR .
        $this->formaDePagamento . self::SEPARADOR .
        $this->desconto . self::SEPARADOR .
        $itensConcatenados;
    }

    public static function listar($filtroIdProduto)
    {
        $arquivo = fopen(__DIR__ . "/../db/venda.txt", "r");
        $retorno = [];
        while (! feof($arquivo)) {
            $linha = trim(fgets($arquivo));
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            if ($filtroIdProduto === "" || trim($dados[1]) == strval($filtroIdProduto)) {
                $retorno[] = $venda = new Venda(
                    $dados[0],
                    $dados[1],
                    $dados[2],
                    trim($dados[3]),
                    $dados[4],
                    $dados[5],
                    []
                );

                $itensStr = explode("|", trim($dados[6]));
                foreach ($itensStr as $itemStr) {
                    if (empty($itemStr)) {
                        continue;
                    }

                    $valores      = explode(",", $itemStr);
                    $idProduto    = $valores[0];
                    $quantidade   = $valores[1];
                    $venda->adicionarItem(new ItemVenda($idProduto, $quantidade));
                }
            }

        }
        return $retorno;
    }

    public function pegaFuncionario()
    {
        return Funcionario::pegaPorId($this->idFuncionario, __DIR__ . "/../db/funcionario.txt", "Funcionario");
    }

    public function pegaProduto()
    {
        return Produto::pegaPorId($this->idProduto, __DIR__ . "/../db/produto.txt", "Produto");
    }

    public function pegaCliente()
    {
        return Cliente::pegaPorId($this->idCliente, __DIR__ . "/../db/cliente.txt", "Cliente");
    }

    public function adicionarItem(ItemVenda $item)
    {
        $this->itens[] = $item;
    }

    public function calcularTotal()
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->calcularSubtotal();
        }
        return $total;
    }

}
