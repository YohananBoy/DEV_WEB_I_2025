<?
  include("../service/funcionario.service.php");
  var_dump($_POST);
  $acao = $_POST["acao"] ?? $_GET["acao"] ?? null;
  $nome = isset($_POST['nome'])?$_POST['nome']:null;
  $salario = isset($_POST['salario'])?$_POST['salario']:null;
  $telefone = isset($_POST['telefone'])?$_POST['telefone']:null;
  $id = $_POST["id"] ?? $_GET["id"] ?? null;
  if($acao=="cadastrar") {
    cadastrarFuncionario($nome, $salario, $telefone);
    echo "Cadastrado com sucesso";
  }
  else if($acao=="alterar") {
    alterarFuncionario($id, $nome, $salario, $telefone);
    echo "Alterado com sucesso";
  }
  else if($acao=="remover") {
    removerFuncionario($id);
    echo "Removido com sucesso";
  }
  else {
    echo "Ação inválida";
  }
?>