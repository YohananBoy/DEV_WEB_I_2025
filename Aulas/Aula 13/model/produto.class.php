<?php
    include("class_pai.class.php");
    class Produto extends ClassePai {
        public $nome;
        public $preco;

        public function __construct($id, $nome, $preco) {
            parent::__construct($id, "../db/produto.txt");
            $this->nome = $nome;
            $this->preco = $preco;
        }

        function montaLinhaDados()
        {
            return $this->id.self::SEPARADOR.$this->nome.self::SEPARADOR.$this->preco;
        }  

        static public function listar() {
            $arquivo = fopen("../db/produto.txt", "r");
            $retorno = [];
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                array_push($retorno, new Produto($dados[0], $dados[1], $dados[2]));
            }
            return $retorno;
        }
    }

?>