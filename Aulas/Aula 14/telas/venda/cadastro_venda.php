<?php
    session_start();
    if (! isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: ../index/login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Venda</title>
    <link rel="stylesheet" href="../css/padaria.css">
    <script src="cadastro_venda.js"></script>
</head>
<body>
<?php
    require_once "../../service/venda.service.php";
    require_once "../../service/produto.service.php";

    $venda = "";
    if (isset($_GET["id"])) {
        $venda = pegaVendaPeloId($_GET["id"]);
    }

    // carrega lista de produtos para o select
    $produtos = Produto::listar("");
?>
    <header>
        <div id="logo">
            <img src="../img/Padaria Topzera.png" alt="">
            <h2>a padaria mais top da redondeza</h2>
        </div>
        <div id="usuario">
            <p><?php echo $_SESSION["login"]["nome"] . " (" . $_SESSION["login"]["email"] . ")"; ?></p>
            <a href="../index/logout.php">Logout</a>
        </div>
    </header>
    <main>
        <form id="formCadastroVenda" action="executa_acao_venda.php" method="post">
            <input type="hidden" name="acao" value="<?php echo ! empty($venda) ? "alterar" : "cadastrar"; ?>"/>
            <?php if (! empty($venda)) {?>
                <input type="hidden" name="id" value="<?php echo $venda->id; ?>"/>
            <?php }?>
    
            <label for="idProduto">Produto:</label>
            <select name="idProduto" id="idProduto" required>
                <option value="">Selecione um produto</option>
                <?php foreach ($produtos as $produto) {?>
                    <option value="<?php echo $produto->id; ?>"
                        <?php if (! empty($venda) && $venda->idProduto == $produto->id) {
                                echo "selected";
                        }
                            ?>>
                        <?php echo $produto->nome . " - R$ " . $produto->preco; ?>
                    </option>
                <?php }?>
            </select><br/>
    
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" min="1"
                   value="<?php if (! empty($venda)) {
                                  echo $venda->quantidade;
                          }
                          ?>" required/><br/>
    
            <label for="data">Data:</label>
            <input type="date" id="data" name="data"
                   value="<?php if (! empty($venda)) {
                                  echo $venda->data;
                              } else {
                                  echo date('Y-m-d');
                          }
                          ?>" required/><br/>
    
            <button type="submit">
                <?php echo ! empty($venda) ? "Alterar" : "Cadastrar"; ?>
            </button>
        </form>
    
        <a href="tabela_venda.php">Tabela Venda</a>
                <br>
        <br>
        <a href="../index/index.php">Voltar ↩️</a>
    </main>
</body>
</html>
