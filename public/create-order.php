<?php
require('../src/config.php');
    
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
        
        $user = $userDbHandler->FetchUserByEmail($email);
        $userId= isset($user['id']) ? $user['id'] : null;


        /* CREATE IF USER DOESN'T EXIST */
        if (empty($user)) {
            $userId = $userDbHandler->insertIntoUser($firstName, $lastName, $email, $password, $phone, $street, $postalCode, $city, $country);
            
        }
    

        /* CREATE ORDER */
        $orderId = $orderDbHandler->insertIntoOrder($userId, $cartTotalSum, $firstName, $lastName, $street, $postalCode, $city, $country);
        


        foreach ($_SESSION['cartItems'] as $item) {
            $orderDbHandler->createOrder($orderId,$item);

        }

        header('Location: order-confirmation.php');
        exit;
    }

    header('Location: checkout.php');
    exit;
    } 
?>


