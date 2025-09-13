<?php
require_once dirname(__DIR__) . "/model/livro.class.php";

function cadastrarLivro($titulo, $autor, $dataPublicacao)
{
    $livro = new Livro(null, $titulo, $autor, $dataPublicacao);
    $livro->cadastrar();
}

function pegaLivroPeloId($id)
{
    return Livro::pegaPorId($id);
}

function alterarLivro($id, $novoTitulo, $novoAutor, $novaDataPublicacao)
{
    $livro = pegaLivroPeloId($id);
    if ($livro) {
        $livro->titulo         = $novoTitulo;
        $livro->autor          = $novoAutor;
        $livro->dataPublicacao = $novaDataPublicacao;
        $livro->alterar();
    }
}

function removerLivro($id)
{
    $livro = pegaLivroPeloId($id);
    if ($livro) {
        $livro->remover();
    }
}

function listarLivro($filtro)
{
    $livros = Livro::listar($filtro);
    echo "<table border='1'>
    <thead>
    <tr>
    <th>Título</th>
    <th>Autor</th>
    <th>Data de Publicação</th>
    <th colspan='2'>Ações</th>
    </tr>
    </thead>
    <tbody>";

    foreach ($livros as $livro) {
        echo "<tr>
        <td>$livro->titulo</td>
        <td>$livro->autor</td>
        <td>$livro->dataPublicacao</td>
        <td><a href='cadastro_livro.php?id=$livro->id'>Alterar</a></td>
        <td><a href='executa_acao_livro.php?acao=remover&id=$livro->id'>Remover</a></td>
        </tr>";
    }
    echo "</tbody></table>";

}
