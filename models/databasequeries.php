<?php

require_once('dbaccess.php');


class DatabaseQueries {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getCustomerByCPF($cpf) {
        $query = "SELECT * FROM customers WHERE cpf = :cpf";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getOrder($customer_id) {
        $query = "SELECT * FROM test.orders o INNER JOIN test.customers c ON c.customer_id = o.customer_id INNER JOIN test.products p ON p.product_id = o.product_id WHERE o.customer_id = :customer_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public function createOrder($idcustomer, $description, $quantity, $total_price) {
        $query = "INSERT INTO orders (customer_id, product_id, quantity, total_price) VALUES (:customer_id, :product_id, :quantity, :total_price)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customer_id', $idcustomer);
        $stmt->bindParam(':product_id', $description);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $total_price);
    
        if ($stmt->execute()) {
            $orderId = $this->db->lastInsertId(); // Obtém o ID do pedido recém-inserido
            return True;
        } else {
            return false;
        }
    }
    
    public function deleteOrder($pedido_id) {
        $query = "DELETE FROM test.orders WHERE order_id = :pedido_id";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':pedido_id', $pedido_id);
        
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function updateOrder($description, $quantity, $total_price, $orderId) {
        $query = "UPDATE test.orders SET product_id = :product_id, quantity = :quantity, total_price = :total_price WHERE order_id = :order_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $description);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':order_id', $orderId);
    
        if ($stmt->execute()) {
            return true;
            return false;
        }
    }
    
}
?>
