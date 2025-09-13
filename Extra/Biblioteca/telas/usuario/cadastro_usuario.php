

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
</head>
<body>
    <?php
        require_once dirname(__DIR__) . "/../service/usuario.service.php";
        //seta a variavel usuario, se o id for mandado pelo link, pega o objeto e guarda na variavel
        $usuario = "";
        if (isset($_GET["id"])) {
            $usuario = pegaUsuarioPeloId($_GET["id"]);
        }

    ?>
    <?php include "../header.php"?>
    <main>

        <form action="executa_acao_usuario.php" method="post">
            <input type="hidden"
            name="acao"
            value="<?php
                       //se usuario nao ta vazio, quer dizer que tem um objeto salvo nele. nesse caso, a ação se torna alterar
                       if (! empty($usuario)) {
                           echo "alterar";
                       } else {
                           echo "cadastrar";
                       }

                   ?>">
            <?php if (! empty($usuario)) {?>
            <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
            <?php }?>
            <label for="nome">Nome: </label>
            <input type="text"
            name="nome"
            id="nome"
            value="<?php //a partir daqui começa a pegar todas as informações do objeto e botar no value do input
                       if (! empty($usuario)) {
                           echo $usuario->nome;
                   }
                   ?>">
            <label for="email">Email: </label>
            <input type="email"
            name="email"
            id="email"
            value="<?php if (! empty($usuario)) {
                           echo $usuario->email;
                   }
                   ?>">
            <label for="senha">Senha: </label>
            <input type="password"
            name="senha"
            id="senha"
            value="<?php if (! empty($usuario)) {
                           echo $usuario->senha;
                   }
                   ?>">
            <button type="submit">
                <?php if (! empty($usuario)) {
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
