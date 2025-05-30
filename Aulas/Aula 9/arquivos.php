<?php 
$arquivo = fopen("texto.txt", "w");

if($arquivo) {
    fwrite($arquivo, "oi eu sou um arquivo novo");
    fclose($arquivo);
}
?>