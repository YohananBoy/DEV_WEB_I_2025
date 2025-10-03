<?php

echo "Escreva uma frase: ";
$frase = fgets(STDIN);

$fraseBoa = rand(0, 1);
if ($fraseBoa) {
    echo "Gostei da frase parabens\n";
} else {
    echo "É ta meio merda\n";
}

echo "Escolhe uma palavra q tu quer substituir: ";
$substituinte = fgets(STDIN);
echo "Tu quer substituir isso por oq? ";
$substituicao = fgets(STDIN);

function contaPalavras($frase)
{
    $palavras = explode(" ", $frase);
    return count($palavras);
}

function contaVogais($frase)
{
    $palavras      = explode(" ", $frase);
    $vogais        = ["a", "e", "i", "o", "u"];
    $qtdVogais     = 0;
    $qtdConsoantes = 0;

    for ($i = 0; $i < count($palavras); $i++) {
        for ($j = 0; $j < strlen($palavras[$i]); $j++) {
            if (in_array(strtolower($palavras[$i][$j]), $vogais)) {
                $qtdVogais++;
            } else if (ctype_alpha($palavras[$i][$j])) { //sinceramente nao conheco essa funcao mas aparentemente ela ignora caracteres que nao sao letras
                $qtdConsoantes++;
            }
        }
    }

    return [$qtdVogais, $qtdConsoantes];
}

function maiorPalavra($frase)
{
    $palavras = explode(" ", $frase);
    $maior    = "";
    foreach ($palavras as $palavra) {
        $maior = strlen($maior) < strlen($palavra) ? $palavra : $maior;
    }

    return trim($maior);
}

function substituiPalavra($frase, $substituinte, $substituicao)
{
    $palavras  = explode(" ", $frase);
    $novaFrase = [];

    foreach ($palavras as $palavra) {
        $novaFrase[] = strtolower($palavra) == strtolower($substituinte) ? $substituicao : $palavra;
    }

    return implode(" ", $novaFrase);
}

$qtd       = contaPalavras($frase);
$letras    = contaVogais($frase);
$maior     = maiorPalavra($frase);
$novaFrase = substituiPalavra($frase, $substituinte, $substituicao);

echo
    "Dados sobre a frase:
    Tem {$qtd} palavras
    Tem {$letras[0]} vogais e {$letras[1]} consoantes
    A maior palavra eh {$maior}
    Depois de substiuir a frase ficou bem melhor
    {$novaFrase}";
