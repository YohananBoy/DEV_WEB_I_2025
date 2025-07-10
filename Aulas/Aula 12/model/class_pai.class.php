<?php
    abstract class ClassePai {
        public $id;
        protected $nomeArquivo = "";
        protected $separador = "#";

        public function _construct($id) {
            $this->id = $id;
            $this->nomeArquivo = $nomeArquivo;
        }

        abstract function montaLinhaDados();
        public function cadastrar() {
            $arquivo = fopen($this->$nomeArquivo, "a");
            fwrite($arquivo, $this->montaLinhaDados());
            fclose($arquivo);
        }

        public function remover() {
        
        }

        public function listar() {
        
        }

        public function alterar() {
        
        }
    }
?>