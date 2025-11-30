<?php
require_once __DIR__ . "/GenericController.php";
require_once __DIR__ . "/../model/usuario.class.php";
class UsuarioController implements GenericController
{

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar($dadosRecebidos)
    {
        $usuario = new Usuario(
            null,
            $dadosRecebidos->nome,
            $dadosRecebidos->email,
            $dadosRecebidos->senha,
        );
        $usuario->cadastrar($this->conn);
    }

    public function listar($dadosRecebidos)
    {
        return Usuario::listar($dadosRecebidos, $this->conn);
    }
    public function alterar($dadosRecebidos)
    {
        $usuario = Usuario::pegaPorId($dadosRecebidos->id, $this->conn);

        $usuario->nome  = $dadosRecebidos->nome;
        $usuario->email = $dadosRecebidos->email;
        $usuario->senha = $dadosRecebidos->senha;

        $usuario->alterar($this->conn);

    }
    public function remover($dadosRecebidos)
    {
        $usuario = Usuario::pegaPorId($dadosRecebidos->id, $this->conn);
        $usuario->remover($this->conn);
    }
}
