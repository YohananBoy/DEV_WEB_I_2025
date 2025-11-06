<?php
  require_once __DIR__ . "/GenericController.php";
require_once  "./model/livro.class.php";
class LivroController implements GenericController{
    
    function cadastrar($dadosRecebidos){
        $livro = new Livro(
            null,
            $dadosRecebidos->titulo,
            $dadosRecebidos->autor,
            $dadosRecebidos->editora,
            $dadosRecebidos->anoPublicacao,
            $dadosRecebidos->genero,
            $dadosRecebidos->localizacao,
            $dadosRecebidos->ISSN
        );
        $livro->cadastrar();
    }

    function listar($dadosRecebidos){
        return Livro::listar($dadosRecebidos);
    }
    function alterar($dadosRecebidos){
        $livro = LivroController::pegaPorId($dadosRecebidos->id);
        $livro->titulo = $dadosRecebidos["titulo"];
        $livro->autor = $dadosRecebidos["autor"];
        $livro->editora = $dadosRecebidos["editora"];
        $livro->anoPublicacao = $dadosRecebidos["anoPublicacao"];
        $livro->genero = $dadosRecebidos["genero"];
        $livro->localizacao = $dadosRecebidos["localizacao"];
        $livro->ISSN = $dadosRecebidos["ISSN"];
        $livro->alterar();
    }
    function remover($dadosRecebidos){
       $livro = LivroController::pegaPorId($dadosRecebidos->id);
       $livro->remover();
    }
}

?>