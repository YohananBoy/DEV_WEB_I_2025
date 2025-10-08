<?php
require_once("funcionario.class.php");
require_once("gerente.class.php");
require_once("desenvolvedor.class.php");

$funcionarios = [
    new Gerente("Marcos Silva", 10000),
    new Desenvolvedor("Ana Paula", 7000),
    new Desenvolvedor("Carlos Souza", 8500),
    new Gerente("Fernanda Lima", 12000),
    new Desenvolvedor("Juliana Torres", 9000)
];

Funcionario::listar($funcionarios);