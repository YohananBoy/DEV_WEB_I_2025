<?php
$contatos = [];

function addContato(&$array, $nome, $telefone)
{
    foreach ($array as $contato) {
        if (strtolower(trim($contato["nome"])) == strtolower(trim($nome))) {
            echo "Erro\n";
            return false;
        }

    }
    $novoContato = [
        "nome"     => trim($nome),
        "telefone" => trim($telefone),
    ];

    array_push($array, $novoContato);
    echo "Contato Adicionado com sucesso\n";
    return true;

}

function removerContato(&$array, $nome)
{
    foreach ($array as $index => $contato) {
        if (strtolower(trim($contato["nome"])) == strtolower(trim($nome))) {
            echo "Contato removido\n";
            unset($array[$index]);
            return true;
        }
    }
    echo "Erro";
    return false;

}

function buscarContato($array, $nome)
{
    foreach ($array as $index => $contato) {
        if (strtolower(trim($contato["nome"])) == strtolower(trim($nome))) {
            echo "Nome: " . $contato["nome"];
            echo "Telefone: " . $contato["telefone"];
            return true;
        }

    }
    echo "Erro";
    return false;
}

function listarContatos($array)
{
    $tam = count($array);
    for ($i = 0; $i < $tam; $i++) {
        for ($j = 0; $j < $tam - $i - 1; $j++) {
            if (strtolower($array[$j]["nome"]) > strtolower($array[$j + 1]["nome"])) {

                $aux           = $array[$j];
                $array[$j]     = $array[$j + 1];
                $array[$j + 1] = $aux;
            }
        }
    }
    foreach ($array as $contato) {
        echo "Nome: {$contato['nome']} - Telefone: {$contato['telefone']}\n";
    }

}

$resp;
$nome;
$telefone;

do {
    echo "Bem vindo a lista de contatos do telefone toptop2000!\nO que deseja fazer? (1 = Ver lista de contatos \ 2 = Adicionar Contato \ 3 = Remover Contato \ 4 = Buscar Contato \ 0 = Sair :c)\n";
    $resp = fgets(STDIN);
    switch (intval($resp)) {
        case 1:
            listarContatos($contatos);
            break;
        case 2:
            echo "Nome: ";
            $nome = fgets(STDIN);
            echo "Telefone: ";
            $telefone = fgets(STDIN);
            addContato($contatos, $nome, $telefone);
            break;
        case 3:
            echo "Nome: ";
            $nome = fgets(STDIN);
            removerContato($contatos, $nome);
            break;
        case 4:
            echo "Nome: ";
            $nome = fgets(STDIN);
            buscarContato($contatos, $nome);
            break;
    }
} while ($resp != 0);
