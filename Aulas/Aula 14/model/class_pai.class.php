<?php
abstract class ClassePai
{
    public $id;
    private $nomeArquivo = "";
    const SEPARADOR      = "#";
    public function __construct($id, $nomeArquivo)
    {
        $this->id          = $id;
        $this->nomeArquivo = $nomeArquivo;
    }
    abstract public function montaLinhaDados();

    public function encontraUltimoId()
    {
        $arquivo = fopen($this->nomeArquivo, "r");
        $idTemp  = 1;
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados  = explode(self::SEPARADOR, $linha);
            $idTemp = intval($dados[0]) + 1;
        }
        $this->id = $idTemp;
    }

    public static function pegaPorId($id, $nomeArquivo, $classe)
    {
        $arquivo = fopen($nomeArquivo, "r");
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);
            if ($dados[0] == $id) {
                if ($classe === 'Funcionario') {
                    return new Funcionario($dados[0], $dados[1], $dados[2], $dados[3]);
                } elseif ($classe === 'Cliente') {
                    return new Cliente($dados[0], $dados[1], $dados[2]);
                } elseif ($classe === 'Produto') {
                    return new Produto($dados[0], $dados[1], $dados[2]);
                } elseif ($classe === 'Venda') {
                    return new Venda($dados[0], $dados[1], $dados[2], $dados[3]);
                } elseif ($classe === 'Usuario') {
                    return new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);
                }
            }
        }
        fclose($arquivo);
    }

    public function cadastrar()
    {
        $this->encontraUltimoId();
        //TODO: Cadastrar  no arquivo.
        $arquivo = fopen($this->nomeArquivo, "a");
        fwrite($arquivo, $this->montaLinhaDados() . "\n");
        fclose($arquivo);
    }
    public function remover()
    {
        //TODO: Remover funcionário do arquivo.
        $arquivo  = fopen($this->nomeArquivo, "r+");
        $auxiliar = "";
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            if ($dados[0] != $this->id) {
                $auxiliar .= $linha;
            }
        }
        if (! empty($auxiliar)) {
            ftruncate($arquivo, 0);
            rewind($arquivo);
            fwrite($arquivo, $auxiliar);
        }

        fclose($arquivo);
    }

    public function alterar()
    {
        //TODO: Alterar linha do funcionário funcionário no arquivo.
        $arquivo  = fopen($this->nomeArquivo, "r+");
        $auxiliar = "";
        while (! feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty($linha)) {
                continue;
            }

            $dados = explode(self::SEPARADOR, $linha);

            if ($dados[0] == $this->id) {
                $auxiliar .= $this->montaLinhaDados() . "\n";
            } else {
                $auxiliar .= $linha;
            }
        }
        if (! empty($auxiliar)) {
            ftruncate($arquivo, 0);
            rewind($arquivo);
            fwrite($arquivo, $auxiliar);
        }

        fclose($arquivo);
    }
}
