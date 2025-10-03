<?php
  include("../service/produto.service.php");
  $acao = $_POST['acao'];
  $nome = isset($_POST['nome'])?$_POST['nome']:null;
  $preco = isset($_POST['preco'])?$_POST['preco']:null;
  $id = isset($_POST['id'])?$_POST['id']:null;
  if($acao=="cadastrar") {
    cadastrarProduto($nome, $preco);
    echo "Cadastrado com sucesso";
  }
?>

<a href="tabela_produto.php">Tabela Produto</a>