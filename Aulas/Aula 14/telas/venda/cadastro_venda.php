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
    require_once "../../service/cliente.service.php";

    $venda = "";
    if (isset($_GET["id"])) {
        $venda = pegaVendaPeloId($_GET["id"]);
    }

    $funcionarios = Funcionario::listar("");
    $produtos     = Produto::listar("");
    $clientes     = Cliente::listar("");
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

            <label for="idFuncionario">Funcionario:</label>
            <select name="idFuncionario" id="idFuncionario" required>
                <option value="">Selecione um funcionario</option>
                <?php foreach ($funcionarios as $funcionario) {?>
                    <option value="<?php echo $funcionario->id; ?>"
                        <?php if (! empty($venda) && $venda->idFuncionario == $funcionario->id) {
                                echo "selected";
                        }
                            ?>>
                        <?php echo $funcionario->nome; ?>
                    </option>
                <?php }?>
            </select><br/>

            <label for="idCliente">Cliente:</label>
            <select name="idCliente" id="idCliente" required>
                <option value="">Selecione um cliente</option>
                <?php foreach ($clientes as $cliente) {?>
                    <option value="<?php echo $cliente->id; ?>"
                        <?php if (! empty($venda) && $venda->idCliente == $cliente->id) {
                                echo "selected";
                        }
                            ?>>
                        <?php echo $cliente->nome; ?>
                    </option>
                <?php }?>
            </select><br/>


            <label for="data">Data:</label>
            <input type="date" id="data" name="data"
                   value="<?php if (! empty($venda)) {
                                  echo $venda->data;
                              } else {
                                  echo date('Y-m-d');
                          }
                          ?>" required/><br/>

            <label for="formaDePagamento">Forma de Pagamento:</label>
            <select id="formaDePagamento" name="formaDePagamento" required>
                <option value="Pix" <?php
                                        if (! empty($venda) && $venda->formaDePagamento == "Pix") {
                                            echo "selected";
                                    }
                                    ?>>Pix</option>
                <option value="Dinheiro" <?php
                                             if (! empty($venda) && $venda->formaDePagamento == "Dinheiro") {
                                                 echo "selected";
                                         }
                                         ?>>Dinheiro</option>
                <option value="Credito" <?php
                                            if (! empty($venda) && $venda->formaDePagamento == "Credito") {
                                                echo "selected";
                                        }
                                        ?>>Cartão de Crédito</option>
                <option value="Debito" <?php
                                           if (! empty($venda) && $venda->formaDePagamento == "Debito") {
                                               echo "selected";
                                       }
                                       ?>>Cartão de Débito</option>
            </select>


            <label for="desconto">Desconto:</label>
            <input type="number" id="desconto" name="desconto" min="0"
                   value="<?php if (! empty($venda)) {
                                  echo $venda->desconto;
                          }
                          ?>" required/><br/>

            <h3>Itens da Venda</h3>
            <div id="itensContainer">
            <?php 
            if (!empty($venda) && !empty($venda->itens)) {
                $itensArray = explode("|", $venda->itens);
                foreach ($itensArray as $item) {
                    $itemArray = explode(",", $item);
                    ?>
                    <div class="itemVenda">
                        <label>Produto:</label>
                        <select name="idProduto[]" required>
                            <option value="">Selecione um produto</option>
                            <?php foreach ($produtos as $produto) { ?>
                                <option value="<?php echo $produto->id; ?>"
                                    <?php echo ($produto->id == $itemArray[0]) ? "selected" : ""; ?>>
                                    <?php echo $produto->nome . " - R$ " . $produto->preco; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <label>Qtd:</label>
                        <input type="number" name="quantidade[]" min="1" value="<?php echo trim($itemArray[1]); ?>" required>
                    </div>
            <?php }
            } else { ?>
                <div class="itemVenda">
                    <label>Produto:</label>
                    <select name="idProduto[]" required>
                        <option value="">Selecione um produto</option>
                        <?php foreach ($produtos as $produto) { ?>
                            <option value="<?php echo $produto->id; ?>">
                                <?php echo $produto->nome . " - R$ " . $produto->preco; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <label>Qtd:</label>
                    <input type="number" name="quantidade[]" min="1" value="1" required>
                </div>
            <?php } ?>
            </div>



<button type="button" id="btnAddItem">➕ Adicionar Produto</button>


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
