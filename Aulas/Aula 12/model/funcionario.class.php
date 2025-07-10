<?php
    class Funcionario extends ClassePai{
        public $nome;
        public $telefone;
        public $salario;

        public function _construct($id, $nome, $salario, $telefone) {
            parent::_construct($id, $nomeArquivo);
            $this->nome = $nome;
            $this->salario = $salario;
            $this->telefone = $telefone;
        }

        function montaLinhaDados() {
            return  $this->id.$this->separador.$this->nome.$this->separador.$this->salario.$this->separador.$this->telefone;
        }
    }
?>