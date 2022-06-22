<?php

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .cart-dropdown {
            float: left;
            overflow: hidden;
        }

        .cart-dropdown .dropbtn {
            cursor: pointer;
            font-size: 16px;  
            border: none;
            outline: none;
            padding: 14px 16px;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .show {
            display: block;
        }

        div.row.cart-detail {
            border: 1px solid black;
        }

        a.checkoutBtn {
            background-color: pink;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            display: inline-block;
        }
    </style>
</head>
<body>
    
    <div class="cart-dropdown">
        <button><ion-icon  name="cart-outline" class="icon dropbtn" onclick="myFunction()"></ion-icon></i><span class="cart-counter"><?=$cartItemCount ?></span></button>
    
        <div class="dropdown-content" id="myDropdown">
    
            <div><h3 style="text-align: left;">Cart items: </h3></div>
    
            <div class="product-row">
                <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                    <div class="row cart-detail">
                        <h4><?=$cartItem['title']?></h4>

                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="./admin/<?=$cartItem['img_url']?>" width=100px>
                        </div>

                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <span><?=$cartItem['price']?> kr</span><br> <span class="count">Quantity: <?=$cartItem['quantity']?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div><h3 style="text-align: left;">Total sum: <span><?=$cartTotalSum ?> kr</span></h3></div>

            <div><a href="checkout.php" class="checkoutBtn">Checkout</a></div>
    
        </div>
    </div> 
   
</body>
</html>