<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/dbaccess.php';
include_once '../models/databasequeries.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : die();

    $queries = new DatabaseQueries();

    $customer = $queries->getCustomerByCPF($cpf);
    if ($customer) {
        http_response_code(200);
        echo json_encode(array(
            "status" => "success",
            "data" => $customer
        ));
    } else {
        http_response_code(404);
        echo json_encode(array(
            "status" => "error",
            "message" => "CPF não encontrado."
        ));
    }
} else {
    http_response_code(405);
    echo json_encode(array(
        "status" => "error",
        "message" => "Método não permitido."
    ));
}

?>