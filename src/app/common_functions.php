<?php

function FetchAllProducts(){
    global $pdo;
    $sql = "SELECT * FROM products;";
    $stmt = $pdo->query($sql);
    return  $stmt->fetchAll();
};



function CreateProduct($title,$description,$price,$stock,$newFilePath){
            global $pdo;
            $sql = "
                INSERT INTO products (title, description, price, stock,img_url)
                VALUES (:title, :description, :price, :stock,:uploadedFile);
            ";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':uploadedFile', $newFilePath);
            $stmt->execute();
}


function FetchProduct(){
    global $pdo;

    $sql = "
    SELECT * FROM products
    WHERE id = :id
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['productId']);
    $stmt->execute();
    return  $stmt->fetch();
}



function UpdateProduct($title,$description,$price,$stock,$newFilePath){
    global $pdo;

    $sql = "
    UPDATE products
    SET title = :title, description = :description, price = :price, stock =:stock, img_url= :uploadedFile
    WHERE id = :id
";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['productId']);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':uploadedFile', $newFilePath);
    $stmt->execute();
    }

?>    