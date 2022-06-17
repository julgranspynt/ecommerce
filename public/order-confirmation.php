<?php
require('../src/config.php');

if (empty($_SESSION['cartItems'])) {
    header('Location:checkout.php');
    exit;
}

$cartItems = $_SESSION['cartItems'];
/* unset($_SESSION['cartItems']); */

?>

