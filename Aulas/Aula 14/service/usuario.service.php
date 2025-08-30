<?php
require_once "../../model/usuario.class.php";
function cadastrarUsuario($nome, $email, $senha)
{
    $usuario = new Usuario(null, $nome, $email, $senha);
    $usuario->cadastrar();

}

function pegaUsuarioPeloId($id)
{
    return Usuario::pegaPorId($id, __DIR__ . "/../db/usuario.txt", "Usuario");
}

function alterarUsuario($id, $novoNome, $novoEmail, $novaSenha)
{
    $usuario = Usuario::pegaPorId($id, __DIR__ . "/../db/usuario.txt", "Usuario");
    if ($usuario) {
        $usuario->nome  = $novoNome;
        $usuario->email = $novoEmail;
        $usuario->senha = $novaSenha;
        $usuario->alterar();
    }
}

function removerUsuario($id)
{
    $usuario = Usuario::pegaPorId($id, __DIR__ . "/../db/usuario.txt", "Usuario");
    if ($usuario) {
        $usuario->remover();
    }
}

function listarUsuario($filtroNome)
{
    $usuarios = Usuario::listar($filtroNome);
    echo "<table border ='1'><thead><tr><th>Nome</th><th>Email</th><th>Senha</th>";
    echo "<th>Ações</th>";
    echo "</tr></thead><tbody>";
    foreach ($usuarios as $usuario) {
        echo "<tr><td>" . $usuario->nome . "</td>";
        echo "<td>" . $usuario->email . "</td>";
        echo "<td>" . $usuario->senha . "</td>";
        echo "<td><a href='http://localhost:3000/Aulas/Aula%2014/telas/usuario/cadastro_usuario.php?id=" . $usuario->id . "'>Alterar</a>";
        echo " | ";
        echo "<a href='http://localhost:3000/Aulas/Aula%2014/telas/usuario/executa_acao_usuario.php?acao=remover&id=" . $usuario->id . "'>Remover</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

}

function verificaUsuario($email, $senha)
{
    $usuarios = Usuario::listar("");
    foreach ($usuarios as $usuario) {
        if ($email == trim($usuario->email) && $senha == trim($usuario->senha)) {
            return $usuario;
        }
    }
    return false;
}
