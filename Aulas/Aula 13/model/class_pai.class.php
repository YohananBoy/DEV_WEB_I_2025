<?php
    abstract class ClassePai {
        public $id;
        private $nomeArquivo="";
        protected $separador = "#";
        public function __construct($id, $nomeArquivo) {
            $this->id = $id;
            $this->nomeArquivo = "../db/" . $nomeArquivo;
        }
        abstract function montaLinhaDados();

        public function encontraUltimoId() {
            $arquivo = fopen($this->nomeArquivo, "r");
            $idTemp = 1;
            while(!feof($arquivo)) {
                $linha = trim(fgets($arquivo));
                if(empty($linha))
                    continue;
                var_dump($linha);
                $dados = explode($this->separador, $linha);
                $idTemp = intval($dados[0]) + 1;
                echo "idTemp= " . $idTemp . "<br>";
            }
            $this->id = $idTemp;
        }

        public function cadastrar() {
            $this->encontraUltimoId();
            //TODO: Cadastrar  no arquivo.
            $arquivo = fopen($this->nomeArquivo, "a");
            fwrite($arquivo, $this->montaLinhaDados()."\n");
            fclose($arquivo);
        }
        public function remover() {
            //TODO: Remover funcionário do arquivo.
        }
        public function listar() {
            //TODO: Listar funcionários do arquivo.
        }
        public function alterar() {
            //TODO: Alterar linha do funcionário funcionário no arquivo.
        }
    }

?>