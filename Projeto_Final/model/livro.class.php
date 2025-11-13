<?php
require_once __DIR__ . "/classe_pai.php";
class Livro extends ClassePai
{

    public $titulo;
    public $autor;
    public $editora;
    public $anoPublicacao;
    public $genero;
    public $localizacao;
    public $ISSN;

//     CREATE TABLElivro(
//     id BIGINTPRIMARYKEYNOTNULLAUTO_INCREMENT,
//     titulo VARCHAR(100),
//     autor VARCHAR(100),
//     editora VARCHAR(100),
//     anoPublicacao INT,
//     genero VARCHAR(30),
//     localizacao CHAR(2),
//     ISSN VARCHAR(9)
// )

    public function toEntity($dados)
    {
        return new Livro(
            $dados[0],
            $dados[1],
            $dados[2],
            $dados[3],
            $dados[4],
            $dados[5],
            $dados[6],
            $dados[7]
        );
    }

    public function cadastrar($conn)
    {
        $SQL = "INSERT INTO livro (titulo, autor, editora, anoPublicacao, genero, localizacao, ISSN) VALUES (
            '$this->titulo',
            '$this->autor',
            '$this->editora',
            '$this->anoPublicacao',
            '$this->genero',
            '$this->localizacao',
            '$this->ISSN'
        )";
        $resultado = $conn->query($SQL);
        if ($resultado) {
            $this->id = $conn->insert_id;
        }
    }

    public function alterar($conn)
    {
        $SQL = "UPDATE livro SET
            titulo = '$this->titulo',
            autor = '$this->autor',
            editora = '$this->editora',
            anoPublicacao = '$this->anoPublicacao',
            genero = '$this->genero',
            localizacao = '$this->localizacao',
            ISSN = '$this->ISSN'
        WHERE id = $this->id";
        $conn->query($SQL);
    }
    public static function pegaPorId($id, $conn)
    {
        $SQL       = "SELECT * FROM livro WHERE id = $id";
        $resultado = $conn->mysql_query($SQL);
        if ($resultado) {
            $dados = $conn->fetch_array($resultado);
            return new Livro(
                $dados['id'],
                $dados['titulo'],
                $dados['autor'],
                $dados['editora'],
                $dados['anoPublicacao'],
                $dados['genero'],
                $dados['localizacao'],
                $dados['ISSN']
            );
        }
    }

    public function __construct($id, $titulo, $autor, $editora, $anoPublicacao, $genero, $localizacao, $ISSN)
    {
        parent::__construct($id, "database/livro.txt");
        $this->titulo        = $titulo;
        $this->autor         = $autor;
        $this->editora       = $editora;
        $this->anoPublicacao = $anoPublicacao;
        $this->genero        = $genero;
        $this->localizacao   = $localizacao;
        $this->ISSN          = $ISSN;
    }

    public static function listar($filtroNome, $conn)
    {
        $SQL       = "SELECT * FROM livro WHERE titulo LIKE '%$filtroNome%'";
        $resultado = $conn->query($SQL);
        $retorno   = [];
        while ($dados = $resultado->fetch_array()) {
            $livro = new Livro(
                $dados['id'],
                $dados['titulo'],
                $dados['autor'],
                $dados['editora'],
                $dados['anoPublicacao'],
                $dados['genero'],
                $dados['localizacao'],
                $dados['ISSN']
            );
            array_push($retorno, $livro);
        }
        return $retorno;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR .
        $this->titulo . self::SEPARADOR .
        $this->autor . self::SEPARADOR .
        $this->editora . self::SEPARADOR .
        $this->anoPublicacao . self::SEPARADOR .
        $this->genero . self::SEPARADOR .
        $this->localizacao . self::SEPARADOR .
        $this->ISSN;
    }
}
