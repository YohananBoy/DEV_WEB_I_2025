<?php
    include("class_pai.class.php");
    class Funcionario extends ClassePai {
        public $nome;
        public $telefone;
        public $salario;

        public function __construct($id, $nome, $salario, $telefone) {
            parent::__construct($id, "../db/funcionario.txt");
            $this->nome = $nome;
            $this->salario = $salario;
            $this->telefone = $telefone;
        }

        function montaLinhaDados()
        {
            return $this->id.self::SEPARADOR.$this->nome.self::SEPARADOR.$this->salario.self::SEPARADOR.$this->telefone;
        }    
        static public function listar($filtroNome) {
            $arquivo = fopen("../db/funcionario.txt", "r");
            $retorno = [];
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                if(str_contains($filtroNome, $dados[1]))
                    array_push($retorno, new Funcionario($dados[0], $dados[1], $dados[2], $dados[3]));
            }
            return $retorno;
        }
    }
?>