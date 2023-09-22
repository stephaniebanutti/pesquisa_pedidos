<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/dbaccess.php';
include_once '../models/databasequeries.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : die();

    $queries = new DatabaseQueries();
    $pedidos = $queries->getOrder($idCliente);

    // Verifique se há pedidos
    if ($pedidos) {
        http_response_code(200); // Código de status 200 - OK
        echo json_encode($pedidos);
    } else {
        http_response_code(404); // Código de status 404 - Not Found
        echo json_encode(array(
            "message" => "Nenhum pedido encontrado para este cliente."
        ));
    }
} else {
    http_response_code(405); // Código de status 405 - Method Not Allowed
    echo json_encode(array(
        "message" => "Método não permitido."
    ));
}
?>
