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

    function FetchUser(){
        global $pdo;
        $sql = "
        SELECT * FROM users
        WHERE id = :id
        ";
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_GET ["userId"]);
        $state->execute();
        return $state->fetch();
    }

    function FetchProductCart($productId){
        global $pdo;
        $sql="
        SELECT * FROM products
        WHERE id = :id;
    ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        return $stmt->fetch();
    };

    function FetchProductAPI(){
        global $pdo;
        $sql = "SELECT * FROM products";
        $state = $pdo->query($sql);
        return $state->fetchALL();
    };

    function FetchUserByEmail($email){
        global $pdo;
        $sql = "
            SELECT * FROM users
            WHERE email = :email
        ";

        $state = $pdo->prepare($sql);
        $state->bindParam(':email', $email);
        $state->execute();
        return $state->fetch();
    }

    function UpdateUserPassword($password,$encryptedPassword){
        global $pdo;

        $sql = "
        UPDATE users
        SET password = :password
        WHERE id = :id
    ";

    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    $state = $pdo->prepare($sql);
    $state->bindParam(':id', $encryptedPassword);
    $state->bindParam(':password', $encryptedPassword);
    $state->execute();
    return $state->fetch();

    }

    function FetchUserBySession(){
        global $pdo;
        $sql = "
        SELECT * FROM users
        WHERE id = :id
    ";
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->execute();
        return $state->fetch();  
    }

    function FetchProductProductPage(){
        global $pdo;
    
        $sql = "
        SELECT * FROM products
        WHERE id = :id
    ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return  $stmt->fetch();
    }


    function Createorder($orderId,$item){
        global $pdo;
        $sql = "
        INSERT INTO order_items (order_id, product_id, product_title, quantity, unit_price)
        VALUES (:order_id, :product_id, :product_title, :quantity, :unit_price)
    ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':order_id', $orderId);
        $stmt->bindValue(':product_id', $item['id']);
        $stmt->bindValue(':product_title', $item['title']);
        $stmt->bindValue(':quantity', $item['quantity']);
        $stmt->bindValue(':unit_price', $item['price']);
        return $stmt->execute();
    }

    






?>    