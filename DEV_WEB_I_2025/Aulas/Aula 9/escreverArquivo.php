<?php
$array = ["oi", "tudo", "bem"];

$arquivo = fopen("novoArquivo.txt", "w");

$nome = readline("Qual teu nome paizão?\n");
array_push($array,$nome);

if($arquivo) {
    fwrite($arquivo, implode("\n", $array));
    fclose($arquivo);

}