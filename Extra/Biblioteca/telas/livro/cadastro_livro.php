<?php include "../autentificacao.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livro</title>
</head>
<body>
    <?php
        require_once dirname(__DIR__) . "/../service/livro.service.php";
        //seta a variavel livro, se o id for mandado pelo link, pega o objeto e guarda na variavel
        $livro = "";
        if (isset($_GET["id"])) {
            $livro = pegaLivroPeloId($_GET["id"]);
        }

    ?>
    <?php include "../header.php"?>
    <main>

        <form action="executa_acao_livro.php" method="post">
            <input type="hidden"
            name="acao"
            value="<?php
                       //se livro nao ta vazio, quer dizer que tem um objeto salvo nele. nesse caso, a ação se torna alterar
                       if (! empty($livro)) {
                           echo "alterar";
                       } else {
                           echo "cadastrar";
                       }

                   ?>">
            <?php if (! empty($livro)) {?>
            <input type="hidden" name="id" value="<?php echo $livro->id ?>">
            <?php }?>
            <label for="titulo">Titulo: </label>
            <input type="text"
            name="titulo"
            id="titulo"
            value="<?php //a partir daqui começa a pegar todas as informações do objeto e botar no value do input
                       if (! empty($livro)) {
                           echo $livro->titulo;
                   }
                   ?>">
            <label for="titulo">Autor: </label>
            <input type="text"
            name="autor"
            id="autor"
            value="<?php if (! empty($livro)) {
                           echo $livro->autor;
                   }
                   ?>">
            <label for="titulo">Data de Publicacao: </label>
            <input type="date"
            name="dataPublicacao"
            id="dataPublicacao"
            value="<?php if (! empty($livro)) {
                           echo $livro->dataPublicacao;
                   }
                   ?>">
            <button type="submit">
                <?php if (! empty($livro)) {
                        echo "Alterar";
                    } else {
                        echo "Cadastrar";
                    }
                ?>
            </button>
            </form>
    </main>
        <?php include "../footer.php"?>

</body>
</html>
