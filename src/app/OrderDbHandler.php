<?php

class OrderDbHandler {
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function fetchAllOrders() {
        $sql = "SELECT * FROM orders;";
        $state = $this->pdo->query($sql);
        return $state->fetchAll();
    }


    public function insertIntoOrder($userId, $cartTotalSum, $firstName, $lastName, $street, $postalCode, $city, $country) {
        $sql = "
        INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
        VALUES (:user_id, :total_price, :billing_full_name, :billing_street, :billing_postal_code, :billing_city, :billing_country)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':total_price', $cartTotalSum);
        $stmt->bindValue(':billing_full_name', $firstName . " " . $lastName);
        $stmt->bindValue(':billing_street', $street);
        $stmt->bindValue(':billing_postal_code', $postalCode);
        $stmt->bindValue(':billing_city', $city);
        $stmt->bindValue(':billing_country', $country);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function deleteOrder() {
        $sql = "
        DELETE FROM orders 
        WHERE id = :id;
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_POST['orderId']);
        return $state->execute();
    }


    public function createOrder($orderId,$item){
        $sql = "
        INSERT INTO order_items (order_id, product_id, product_title, quantity, unit_price)
        VALUES (:order_id, :product_id, :product_title, :quantity, :unit_price)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':order_id', $orderId);
        $stmt->bindValue(':product_id', $item['id']);
        $stmt->bindValue(':product_title', $item['title']);
        $stmt->bindValue(':quantity', $item['quantity']);
        $stmt->bindValue(':unit_price', $item['price']);
        return $stmt->execute();
    }
    
}

?>