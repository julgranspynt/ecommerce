<?php

    /* echo "<pre>";
    print_r($_SESSION['cartItems']);
    echo "</pre>";  */

    if(!isset($_SESSION['cartItems'])) {
        $_SESSION['cartItems'] = [];
    }

    $cartItemCount = 0;
    $cartTotalSum = 0;
    foreach ($_SESSION['cartItems'] as $cartId => $cartItem) {
        $cartTotalSum += $cartItem['price'] * $cartItem['quantity'];
        $cartItemCount += $cartItem['quantity'];
    }

?>
