<?php
require_once "produto.class.php";

class ItemVenda
{
    public $idProduto;
    public $quantidade;

    public function __construct($idProduto, $quantidade)
    {
        $this->idProduto  = $idProduto;
        $this->quantidade = $quantidade;
    }

    public function pegaProduto()
    {
        return Produto::pegaPorId($this->idProduto, __DIR__ . "/../db/produto.txt", "Produto");
    }

    public function calcularSubtotal()
    {
        $produto = $this->pegaProduto();
        if ($produto) {
            return $this->quantidade * $produto->preco;
        }
        return 0;
    }
}
