<?php
define("SEPARADOR", "#");
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
$rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
$cep = isset($_POST["cep"]) ? $_POST["cep"] : "";
$logradouro = isset($_POST["logradouro"]) ? $_POST["logradouro"] : "";
$numero = isset($_POST["numero"]) ? $_POST["numero"] : "";

escreverLinha($nome, $cpf, $rg, $cep, $logradouro, $numero);
function escreverLinha($nome, $cpf, $rg, $cep, $logradouro, $numero) {
    $linha = "\n";
    $id = lerUltimoId();
    if(empty($id)) {
        $id = 0;
        $linha = "";
    }
    $id++;
    $linha = $linha.$id.SEPARADOR.$nome.SEPARADOR.$cpf.SEPARADOR.$rg.SEPARADOR.$cep.SEPARADOR.$logradouro.SEPARADOR.$numero;
    file_put_contents("empregados.txt", $linha, FILE_APPEND);
}

function lerUltimoId() {
$arquivo = fopen("empregados.txt", "r");
$linha = "";
    while(!feof($arquivo)) {
        $linha = fgets($arquivo);
}
fclose($arquivo);
$dadosEmpregado = explode(SEPARADOR, $linha);
return $dadosEmpregado[0];
}