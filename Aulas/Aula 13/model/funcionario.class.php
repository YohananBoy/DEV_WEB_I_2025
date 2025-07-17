<?php
    include("class_pai.class.php");

    class Funcionario extends ClassePai {
        public $nome;
        public $telefone;
        public $salario;

        public function __construct($id, $nome, $salario, $telefone) {
            parent::__construct($id, "funcionario.txt");
            $this->nome = $nome;
            $this->salario = $salario;
            $this->telefone = $telefone;
        }

        function montaLinhaDados()
        {
            return $this->id.$this->separador.$this->nome.$this->separador.$this->salario.$this->separador.$this->telefone;
        }
    }
?>