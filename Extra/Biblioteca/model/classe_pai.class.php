<?php
//essa classe é a pai de todas. tem as funções primárias que todas as classes usarão
abstract class ClassePai
{
    public $id;
    private $nomeArquivo;
    const SEPARADOR = "|";

    //função que instancia o objeto
    public function __construct($id, $nomeArquivo)
    {
        $this->id          = $id;
        $this->nomeArquivo = $nomeArquivo;

    }

    //funções que cada classe herdeira deverá ter.
    abstract public function montaLinhaDados();
    abstract public static function pegaPorId($id);

    public function pegaUltimoId()
    {
        $arquivo = fopen($this->nomeArquivo, "r");
        $idTemp  = 1;

        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            //pega o que ta na linha e transforma numa array
            $dados = explode(self::SEPARADOR, $linha);
            //transforma o id de string pra inteiro e soma mais 1
            $idTemp = intval($dados[0]) + 1;
        }
        //muda o valor do id do objeto
        $this->id = $idTemp;
    }

    public function cadastrar()
    {
        $this->pegaUltimoId();
        $arquivo = fopen($this->nomeArquivo, "a");
        //escreve no db do jeito que foi configurado no montaLinhaDados
        fwrite($arquivo, $this->montaLinhaDados() . "\n");
        fclose($arquivo);
    }

    public function remover()
    {
        $arquivo = fopen($this->nomeArquivo, "r+");
        $aux     = "";
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            //se nao for o id do objeto que será removido, vai adicionando a linha na auxiliar
            if ($dados[0] != $this->id) {
                $aux .= $linha;
            }
        }

        if (! empty($aux)) {
            ftruncate($arquivo, 0);
            rewind($arquivo);
            fwrite($arquivo, $aux);

        }

        fclose($arquivo);
    }

    public function alterar()
    {
        $arquivo = fopen($this->nomeArquivo, "r+");
        $aux     = "";
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            //se for o id do objeto, remontará a linha com as novas informações do objeto
            if ($dados[0] == $this->id) {
                $aux .= $this->montaLinhaDados() . "\n";
            } else {
                $aux .= $linha;
            }

        }
        if (! empty($aux)) {
            ftruncate($arquivo, 0);
            rewind($arquivo);
            fwrite($arquivo, $aux);
        }

        fclose($arquivo);
    }

}
