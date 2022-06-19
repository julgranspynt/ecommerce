<?php
require('../src/config.php');
include('layout/header.php');

if (empty($_SESSION['cartItems'])) {
    header('Location:checkout.php');
    exit;
}

$cartItems = $_SESSION['cartItems'];
/* unset($_SESSION['cartItems']); */
$totalSum = 0;
foreach ($cartItems as $cartId => $cartItem) {
    $totalSum += $cartItem['price'] * $cartItem['quantity'];
}

unset($_SESSION['cartItems']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <title>order<?=htmlentities($cartId) ?>confirmation</title>
</head>
<body>
    <div class="container">
        
        <h1>Thank you for your order!</h1>

        <p>Your order confirmation has been sent to your email. Feel free to contact us if you have any questions.</p>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th style="width: 15%">Product</th>
                    <th style="width: 50%">Name</th>
                    <th style="width: 10%">Quantity</th>
                    <th style="width: 25%">Price per product</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($cartItems as $item): ?>
                    <tr>
                        <td><img src="admin/<?=$item['img_url']?>" width="100"></td>
                        <td><?=$item['title']?></td>
                        <td><?=$item['quantity']?></td>
                        <td><?=$item['price']?> kr</td>
                    </tr>
                <?php endforeach; ?>

                <tr class="border-top">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total: <?=$cartTotalSum?> kr</b></td>
                </tr>
            </tbody>

        </table>
    </div>       
</body>
</html>

<?php include ('layout/footer.php') ?>