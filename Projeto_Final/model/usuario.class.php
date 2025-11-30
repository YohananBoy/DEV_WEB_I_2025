<?php
require_once __DIR__ . "/classe_pai.php";
class Usuario extends ClassePai
{

    public $nome;
    public $email;
    public $senha;

//     CREATE TABLE usuario(
// 	id BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
//     nome VARCHAR(100),
//     email VARCHAR(100),
//     senha VARCHAR(30)
// );

    public function toEntity($dados)
    {
        return new Usuario(
            $dados[0],
            $dados[1],
            $dados[2],
            $dados[3]
        );
    }

    public function cadastrar($conn)
    {
        $SQL = "INSERT INTO usuario (nome, email, senha) VALUES (
            '$this->nome',
            '$this->email',
            '$this->senha'
        )";
        $resultado = $conn->query($SQL);
        if ($resultado) {
            $this->id = $conn->insert_id;
        }
    }

    public function alterar($conn)
    {
        $SQL = "UPDATE usuario SET
            nome = '$this->nome',
            email = '$this->email',
            senha = '$this->senha'
        WHERE id = $this->id";
        $conn->query($SQL);
    }
    public function remover($conn)
    {
        $SQL = "DELETE FROM usuario WHERE id = $this->id";
        $conn->query($SQL);
    }
    public static function pegaPorId($id, $conn)
    {
        $SQL       = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conn->query($SQL);
        if ($resultado) {
            $dados = $resultado->fetch_array();
            return new Usuario(
                $dados['id'],
                $dados['nome'],
                $dados['email'],
                $dados['senha']
            );
        }
    }

    public function __construct($id, $nome, $email, $senha)
    {
        parent::__construct($id, "database/usuario.txt");
        $this->nome  = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public static function listar($filtroNome, $conn)
    {
        $SQL       = "SELECT * FROM usuario WHERE nome LIKE '%$filtroNome%'";
        $resultado = $conn->query($SQL);
        $retorno   = [];
        while ($dados = $resultado->fetch_array()) {
            $usuario = new Usuario(
                $dados['id'],
                $dados['nome'],
                $dados['email'],
                $dados['senha'],
            );
            array_push($retorno, $usuario);
        }
        return $retorno;
    }

    public function montaLinhaDados()
    {
        return $this->id . self::SEPARADOR .
        $this->nome . self::SEPARADOR .
        $this->email . self::SEPARADOR .
        $this->senha;
    }
}
