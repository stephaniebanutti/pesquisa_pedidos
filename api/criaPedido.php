<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/dbaccess.php';
include_once '../models/databasequeries.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : die();
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : die();
    $valorTotal = isset($_POST['valorTotal']) ? $_POST['valorTotal'] : die();
    $idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : die();

    $queries = new DatabaseQueries();

    $order = $queries->createOrder($idCliente, $descricao, $quantidade, $valorTotal);
    
    if ($order) {
        http_response_code(201); // Código de status 201 - Created
        echo json_encode(array(
            "status" => "success",
            "message" => "Pedido criado com sucesso.",
            "data" => $order // Inclui os dados do pedido no retorno
        ));
    } else {
        // Erro ao criar o pedido
        http_response_code(500); // Código de status 500 - Internal Server Error
        echo json_encode(array(
            "status" => "error",
            "message" => "Erro ao criar o pedido."
        ));
    }
} else {
    // Método de requisição incorreto
    http_response_code(405); // Código de status 405 - Method Not Allowed
    echo json_encode(array(
        "status" => "error",
        "message" => "Método não permitido."
    ));
}

