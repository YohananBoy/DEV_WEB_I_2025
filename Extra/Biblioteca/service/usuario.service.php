<?php
require_once dirname(__DIR__) . "/model/usuario.class.php";

function cadastrarUsuario($nome, $email, $senha)
{
    $usuario = new Usuario(null, $nome, $email, $senha);
    $usuario->cadastrar();
}

function pegaUsuarioPeloId($id)
{
    return Usuario::pegaPorId($id);
}

function alterarUsuario($id, $novoNome, $novoEmail, $novaSenha)
{
    $usuario = pegaUsuarioPeloId($id);
    if ($usuario) {
        $usuario->nome  = $novoNome;
        $usuario->email = $novoEmail;
        $usuario->senha = $novaSenha;
        $usuario->alterar();
    }
}

function removerUsuario($id)
{
    $usuario = pegaUsuarioPeloId($id);
    if ($usuario) {
        $usuario->remover();
    }
}

function listarUsuario($filtro)
{
    $usuarios = Usuario::listar($filtro);
    echo "<table border='1'>
    <thead>
    <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Senha</th>
    <th colspan='2'>Ações</th>
    </tr>
    </thead>
    <tbody>";

    foreach ($usuarios as $usuario) {
        echo "<tr>
        <td>$usuario->nome</td>
        <td>$usuario->email</td>
        <td>$usuario->senha</td>
        <td><a href='cadastro_usuario.php?id=$usuario->id'>Alterar</a></td>
        <td><a href='executa_acao_usuario.php?acao=remover&id=$usuario->id'>Remover</a></td>
        </tr>";
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
