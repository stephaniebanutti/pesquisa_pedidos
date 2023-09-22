<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/dbaccess.php';
include_once '../models/databasequeries.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pedido_id = isset($_POST['pedido_id']) ? $_POST['pedido_id'] : die();

    $queries = new DatabaseQueries();
    $exclusao = $queries->deleteOrder($pedido_id);

    if ($exclusao) {
        http_response_code(200); // Código de status 200 - OK
        echo json_encode(array(
            "status" => "success",
            "message" => "Pedido excluído com sucesso."
        ));
    } else {
        // Erro ao excluir o pedido
        http_response_code(500); // Código de status 500 - Internal Server Error
        echo json_encode(array(
            "status" => "error",
            "message" => "Erro ao excluir o pedido."
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
