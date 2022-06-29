<?php
require('../src/config.php');
require('../src/functions.php');
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    $firstName      = trim($_POST['firstName']);
    $lastName       = trim($_POST['lastName']);
    $email          = trim($_POST['email']);
    $password       = trim($_POST['password']);
    $street         = trim($_POST['street']);
    $postalCode     = trim($_POST['postalCode']);
    $phone          = trim($_POST['phone']);
    $city           = trim($_POST['city']);
    $country        = trim($_POST['country']);
    $cartTotalSum   = $_POST['cartTotalSum'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($street) || empty($postalCode) || empty($phone) || empty($city) || empty($country)) 
    {
        header('Location: checkout.php?missingFields');
        exit;
    }

    else {
        if (isset($_POST['createOrderBtn']) && !empty($_SESSION['cartItems'])) {
        
        /* FETCH IF USER EXISTS */
        $sql = "
            SELECT * FROM users
            WHERE email = :email;
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();
        $userId= isset($user['id']) ? $user['id'] : null;


        /* CREATE IF USER DOESN'T EXIST */
        if (empty($user)) {
            /* $userId = insertIntoUser($firstName, $lastName, $email, $password, $phone, $street, $postalCode, $city, $country); */
            $sql = "
                INSERT INTO users (first_name, last_name, email, password, phone, street, postal_code, city, country)
                VALUES (:first_name, :last_name, :email, :password, :phone, :street, :postal_code, :city, :country)
            ";

            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $encryptedPassword);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':postal_code', $postalCode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':country', $country);
            $stmt->execute();
            $userId = $pdo->lastInsertId();
        }
    

        /* CREATE ORDER */
        /* insertIntoOrder($userId, $cartTotalSum, $firstName, $lastName, $street, $postalCode, $city, $country); */
        $sql = "
            INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
            VALUES (:user_id, :total_price, :billing_full_name, :billing_street, :billing_postal_code, :billing_city, :billing_country)
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':total_price', $cartTotalSum);
        $stmt->bindValue(':billing_full_name', $firstName . " " . $lastName);
        $stmt->bindValue(':billing_street', $street);
        $stmt->bindValue(':billing_postal_code', $postalCode);
        $stmt->bindValue(':billing_city', $city);
        $stmt->bindValue(':billing_country', $country);
        $stmt->execute();
        $orderId = $pdo->lastInsertId();


        foreach ($_SESSION['cartItems'] as $item) {
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
            $stmt->execute();
           
        }

        header('Location: order-confirmation.php');
        exit;
    }

    header('Location: checkout.php');
    exit;
    } 
?>


