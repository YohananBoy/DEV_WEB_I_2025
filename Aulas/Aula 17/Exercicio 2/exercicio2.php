<?php
require_once "carro.class.php";
require_once "cliente.class.php";
require_once "locacao.class.php";
require_once "locadora.class.php";
require_once "moto.class.php";

$cliente1 = new Cliente("Miguel Nunes", "14911025786", "22981867748");
$cliente2 = new Cliente("Enzo Darcy", "27611939108", "22999521161");
$cliente3 = new Cliente("Bernardo Marques", "06839802701", "22998223142");

$moto1 = new Moto("Yamaha", "MT-07", 2022, true, 689);
$moto2 = new Moto("Honda", "CB 500F", 2021, true, 471);

$carro1 = new Carro("Toyota", "Corolla", 2023, true, 4);
$carro2 = new Carro("Volkswagen", "Gol", 2019, true, 2);

$locacao1 = new Locacao($cliente1, $carro2, 3, 600);
$carro2->alugar();
$locacao2 = new Locacao($cliente3, $moto2, 10, 480);
$moto2->alugar();

echo "Resumo das locações:\n" . $locacao1->exibirResumo() . $locacao2->exibirResumo();

do {
    echo "(1 = Registrar locação / 2 = Devolução de veículo / 3 = Cliente / 4 = Veículo / 5 = Listar locações e veículos disponíveis / 0 = Sair)";
    $resp = fgets(STDIN);

    switch ($resp) {
        case 1:"Insira";
    }

} while ($resp != 0);
