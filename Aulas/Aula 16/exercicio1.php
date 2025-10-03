<?php

function dificuldade($numero)
{
    $tentativas = 0;
    switch ($numero) {
        case 1:
            $tentativas = 10;
            break;
        case 2:
            $tentativas = 5;
            break;
        case 3:
            $tentativas = 3;
            break;
    }

    return $tentativas;
}

function jogo($numero, $tentativas)
{
    do {
        echo "Tente adivinhar o número (tentativas = " . $tentativas . ")\n";
        $resp = fgets(STDIN);
        $tentativas--;

        if ($resp < $numero) {
            echo "É maior\n";
        } else if ($resp > $numero) {
            echo "É menor\n";
        } else if ($resp == $numero) {
            echo "OLOKO TU É PIKA MEMO CONSEGUIU FALTANDO " . $tentativas . " TENTATIVA(S)!\n";
            return;
        }

        if ($tentativas == 0) {
            echo "VC É UM LIXO O NÚMERO ERA " . $numero . "\n";
            return;
        }
    } while ($tentativas >= 0);
}

echo "Escolha o nível de dificuldade. (1 = fácil, 2 = médio, 3 = difícil)\n";

do {
    $resp = fgets(STDIN);
} while ($resp != 1 && $resp != 2 && $resp != 3);

$numero = rand(1, 100);

$tentativas = dificuldade($resp);

jogo($numero, $tentativas);
