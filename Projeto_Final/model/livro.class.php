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
    public $disponivel;

//     CREATE TABLElivro(
//     id BIGINTPRIMARYKEYNOTNULLAUTO_INCREMENT,
//     titulo VARCHAR(100),
//     autor VARCHAR(100),
//     editora VARCHAR(100),
//     anoPublicacao INT,
//     genero VARCHAR(30),
//     localizacao CHAR(2),
//     ISSN VARCHAR(9),
//     disponivel BOOLEAN
// )

// INSERT INTOlivro(titulo, autor, editora, anoPublicacao, genero, localizacao, ISSN, disponivel)VALUES
// ('O Senhor dos Anéis', 'J. R. R. Tolkien', 'HarperCollins', 1954, 'Fantasia', 'A1', '1234-6789', 1),
// ('Dom Casmurro', 'Machado de Assis', 'Editora Globo', 1899, 'Romance', 'B2', '9876-4321', 1),
// ('1984', 'George Orwell', 'Companhia das Letras', 1949, 'Distopia', 'C3', '1112-2333', 1),
// ('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'HarperCollins', 1943, 'Infantil', 'D4', '4445-5666', 1),
// ('Harry Potter e a Pedra Filosofal', 'J. K. Rowling', 'Rocco', 1997, 'Fantasia', 'E5', '7778-8999', 1),
// ('A Revolução dos Bichos', 'George Orwell', 'Companhia das Letras', 1945, 'Sátira', 'F6', '1011-2131', 1),
// ('O Hobbit', 'J. R. R. Tolkien', 'HarperCollins', 1937, 'Fantasia', 'G7', '1415-6171', 1),
// ('A Metamorfose', 'Franz Kafka', 'Editora 34', 1915, 'Ficção', 'H8', '1819-0212', 1),
// ('Orgulho e Preconceito', 'Jane Austen', 'Penguin', 1813, 'Romance', 'I9', '2223-4252', 1),
//     ('It: A Coisa', 'Stephen King', 'Suma', 1986, 'Terror', 'J1', '2627-8293', 1);

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
            $dados[7],
            $dados[8]
        );
    }

    public function cadastrar($conn)
    {
        $SQL = "INSERT INTO livro (titulo, autor, editora, anoPublicacao, genero, localizacao, ISSN, disponivel) VALUES (
            '$this->titulo',
            '$this->autor',
            '$this->editora',
            '$this->anoPublicacao',
            '$this->genero',
            '$this->localizacao',
            '$this->ISSN',
            '$this->disponivel'
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
            ISSN = '$this->ISSN',
            disponivel = '$this->disponivel'
        WHERE id = $this->id";
        $conn->query($SQL);
    }
    public static function pegaPorId($id, $conn)
    {
        $SQL       = "SELECT * FROM livro WHERE id = $id";
        $resultado = $conn->query($SQL);
        if ($resultado) {
            $dados = $resultado->fetch_array();
            return new Livro(
                $dados['id'],
                $dados['titulo'],
                $dados['autor'],
                $dados['editora'],
                $dados['anoPublicacao'],
                $dados['genero'],
                $dados['localizacao'],
                $dados['ISSN'],
                $dados['disponivel'],
            );
        }
    }

    public function __construct($id, $titulo, $autor, $editora, $anoPublicacao, $genero, $localizacao, $ISSN, $disponivel)
    {
        parent::__construct($id, "database/livro.txt");
        $this->titulo        = $titulo;
        $this->autor         = $autor;
        $this->editora       = $editora;
        $this->anoPublicacao = $anoPublicacao;
        $this->genero        = $genero;
        $this->localizacao   = $localizacao;
        $this->ISSN          = $ISSN;
        $this->disponivel    = $disponivel;
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
                $dados['ISSN'],
                $dados['disponivel'],
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
        $this->ISSN . self::SEPARADOR .
        $this->disponivel;
    }
}
