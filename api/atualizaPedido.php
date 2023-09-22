<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/dbaccess.php';
include_once '../models/databasequeries.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $orderId = isset($_POST['orderId']) ? $_POST['orderId'] : die();
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : die();
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : die();
    $valorTotal = isset($_POST['valorTotal']) ? $_POST['valorTotal'] : die();

    // Consulta SQL para atualizar o pedido
    $queries = new DatabaseQueries();
    $result = $queries->updateOrder($descricao, $quantidade, $valorTotal, $orderId);
    

    if ($result) {
        http_response_code(200); // Código de status 200 - OK
        echo json_encode(array(
            "status" => "success",
            "message" => "Pedido atualizado com sucesso."
        ));
    } else {
        // Erro ao atualizar o pedido
        http_response_code(500); // Código de status 500 - Internal Server Error
        echo json_encode(array(
            "status" => "error",
            "message" => "Erro ao atualizar o pedido."
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

?>
