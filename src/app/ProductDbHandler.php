<?php

class ProductDbHandler {

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function FetchAllProducts(){
        $sql = "SELECT * FROM products;";
        $stmt = $this->pdo->query($sql);
        return  $stmt->fetchAll();
    }


    public function CreateProduct($title, $description, $price, $stock, $newFilePath){
        $sql = "
        INSERT INTO products (title, description, price, stock,img_url)
        VALUES (:title, :description, :price, :stock,:uploadedFile);
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':uploadedFile', $newFilePath);
        $stmt->execute();
    }


    public function FetchProduct(){
        $sql = "
        SELECT * FROM products
        WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['productId']);
        $stmt->execute();
        return  $stmt->fetch();
    }


    public function UpdateProduct($title,$description,$price,$stock,$newFilePath){
        $sql = "
        UPDATE products
        SET title = :title, description = :description, price = :price, stock =:stock, img_url= :uploadedFile
        WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['productId']);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':uploadedFile', $newFilePath);
        $stmt->execute();
    }


    public function FetchProductCart($productId){
        $sql="
        SELECT * FROM products
        WHERE id = :id;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        return $stmt->fetch();
    }


    // public function FetchProductAPI(){
    //     $sql = "SELECT * FROM products";
    //     $state = $this->pdo->query($sql);
    //     return $state->fetch();
    // }


    public function FetchProductProductPage(){
        $sql = "
        SELECT * FROM products
        WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch();
    }

}

?>