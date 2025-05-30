<?php
$lines = file("novoArquivo.txt");

foreach($lines as $line) {
    echo $line;
}