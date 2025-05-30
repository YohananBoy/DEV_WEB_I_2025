<?php

$arquivo = fopen("texto.txt", "r");

if($arquivo) {
    $conteudo = file_get_contents("texto.txt");
    var_dump($conteudo);

    fclose($arquivo);
}