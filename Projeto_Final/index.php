<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . "/controller/GenericController.php";
require_once __DIR__ . "/controller/LivroController.php";
require_once __DIR__ . "/controller/UsuarioController.php";
$metodo     = $_SERVER['REQUEST_METHOD'];
$modulo     = isset($_GET['modulo']) ? $_GET['modulo'] : null;
$controller = null;
// localhost/index.php?modulo=livro
switch ($modulo) {
    case "usuario":
        $controller = new UsuarioController();
        break;
    case "livro":
        $controller = new LivroController();
        break;
    default:
        return json_encode("{erro: true, mensagem: 'Módulo Inválido'}");
}
$dadosRecebidos = json_decode(file_get_contents("php://input", true));
switch ($metodo) {
    case "POST":
        $controller->cadastrar($dadosRecebidos);
        echo json_encode(["erro" => false, "mensagem" => "Cadastrado com sucesso!"]);
        exit;
    case "GET":
        echo json_encode($controller->listar($dadosRecebidos));
        exit;
    case "PUT":
        echo json_encode($controller->alterar($dadosRecebidos));
        exit;
    case "DELETE":
        $controller->remover($dadosRecebidos);
        echo json_encode(["erro" => false, "mensagem" => "Removido com sucesso!"]);
        exit;
}
