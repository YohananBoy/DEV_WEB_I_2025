<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Extra/Biblioteca/telas/css/style.css"">
</head>
<body>
    <header>
        <div>
            <h1>BiblioCEFET</h1>
            <h2>A biblioteca do CEFET-RJ</h2>
        </div>
        <nav>
            <ul>
               <li><h3>Livro</h3></li>
               <li><a href="<?php echo '/Extra/Biblioteca/telas/livro/cadastro_livro.php'; ?>" >Cadastro</a></li>
               <li><a href="<?php echo '/Extra/Biblioteca/telas/livro/tabela_livro.php'; ?> ">Tabela</a></li>
            </ul>
            <ul>
               <li><h3>Usuário</h3></li>
               <li><a href="<?php echo '/Extra/Biblioteca/telas/usuario/cadastro_usuario.php'; ?>" >Cadastro</a></li>
               <li><a href="<?php echo '/Extra/Biblioteca/telas/usuario/tabela_usuario.php'; ?> ">Tabela</a></li>
            </ul>
        </nav>
        <div id="usuario">
        <?php
            if (isset($_SESSION["login"]) && $_SESSION["login"] != []) {
            echo $_SESSION["login"]["nome"] . " (" . $_SESSION["login"]["email"] . ") <a href='/Extra/Biblioteca/telas/logout.php'>Logout</a>";
        }?></p>
        </div>
    </header>
</body>
</html>
