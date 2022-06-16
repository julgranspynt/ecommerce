<?php
require('../src/config.php');

if (!empty($_POST['quantity'])) {
    $productId  = (int) $_POST['productId'];
    $quantity   = (int) $_POST['quantity'];

    /* echo "<pre>";
    print_r($_POST);
    echo "</pre>"; */

    $sql="
        SELECT * FROM products
        WHERE id = :id;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch();

    /* echo "<pre>";
    print_r($product);
    echo "</pre>";  */     

    if ($product) {
            echo "<pre>";
            print_r('time to add item to cart');
            echo "</pre>";   
        $product = array_merge($product, ['quantity' => $quantity]);

        $cartItem = [$productId => $product];

        /* echo "<pre>";
        print_r($cartItem);
        echo "</pre>";  */  
        
        if (empty($_SESSION['cartItems'])) {
            echo "<pre>";
            print_r('run this block if adding first item into empty cart');
            echo "</pre>"; 
            $_SESSION['cartItems'] = $cartItem;
        } else {
            if (isset($_SESSION['cartItems'][$productId])) {
                echo "<pre>";
                print_r('run this block if adding items to an existing cartList with item alrdy in list');
                echo "</pre>"; 
                $_SESSION['cartItems'][$productId]['quantity'] += $quantity;
            } else {
                echo "<pre>";
                print_r('run this block if adding items to an existing cartList');
                echo "</pre>"; 
                $_SESSION['cartItems'] += $cartItem;
            }
            
        }

        /* echo "<pre>";
        print_r($_SESSION['cartItems']);
        echo "</pre>";  */
       

    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

