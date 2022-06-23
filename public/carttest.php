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


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .dropdown{
        float:right;
        padding-right: 30px;
        }
        .btn{
        border:0px;
        margin:none;
        box-shadow:none;
        }
        .btn-info{
        background-color: transparent;
        }
        .dropdown .dropdown-menu{
        padding:20px;
        top:30px;
        width:350px;
        left:-110px;
        box-shadow:0px 5px 30px black;
        }
        .cart-detail{
        padding:15px 0px;
        }
        .cart-detail-img img{
        width:100%;
        height:100%;
        padding-left:15px;
        }
        .cart-detail-product p{
        margin:0px;
        color:#000;
        font-weight:500;
        }
        .cart-detail .price{
        font-size:12px;
        margin-right:10px;
        font-weight:500;
        }
        .cart-detail .count{
        color:#C2C2DC;
        }
        .checkout{
        border-top:1px solid #d2d2d2;
        padding-top: 15px;
        }
        .checkout .btn-primary{
        border-radius:50px;
        height:50px;
        background-color: pink;
        }
        
    </style>

</head>

<body>
        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-pill badge-danger"><?=$cartItemCount ?></span>
            </button>
            
            <div class="dropdown-menu">
                
                <div class="row total-header-section">

                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger"><?=$cartItemCount ?></span>
                    </div>
                
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info"><?=$cartTotalSum ?> kr</span></p>
                    </div>
            
                </div>
                
                <div class="product-row">
                    <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                        <div class="row cart-detail">

                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="./admin/<?=$cartItem['img_url']?>">
                            </div>
                    
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p><?=$cartItem['title']?></p>
                                <span class="price text-info"><?=$cartItem['price']?> kr</span> <span class="count"> Quantity: <?=$cartItem['quantity']?></span>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <button class="btn btn-primary btn-block">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>