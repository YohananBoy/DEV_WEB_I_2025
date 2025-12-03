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
    public function login($dadosRecebidos)
    {
        session_start();

        $email     = $dadosRecebidos->email;
        $senha     = $dadosRecebidos->senha;
        $SQL       = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $resultado = $this->conn->query($SQL);

        if ($resultado && $resultado->num_rows > 0) {
            $usuario                   = $resultado->fetch_array();
            $_SESSION["usuario_id"]    = $usuario["id"];
            $_SESSION["usuario_nome"]  = $usuario["nome"];
            $_SESSION["usuario_email"] = $usuario["email"];

            return [
                "erro"     => false,
                "mensagem" => "Login realizado com sucesso!",
            ];
        }

        return [
            "erro"     => true,
            "mensagem" => "Email ou senha incorretos!",
        ];

    }

    public function verificar()
    {
        session_start();

        if (isset($_SESSION["usuario_id"])) {
            return
                ["logado" => true,
                "nome"    => $_SESSION["usuario_nome"],
                "email"   => $_SESSION["usuario_email"],
            ];
        }
        return ["logado" => false];

    }

    public function logout()
    {
        session_start();
        session_destroy();

        return ["erro" => false, "mensagem" => "Logout realizado com sucesso!"];
    }

}
