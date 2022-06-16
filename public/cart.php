<?php

    echo "<pre>";
    print_r($_SESSION['cartItems']);
    echo "</pre>"; 

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


<div class="row">
    <div class="col-lg-12 col-sm-12 col-12 main-section">
        <a href="products.php" class="btn btn-info">Products<a>

        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span class="badge badge-pill badge-danger"><?=$cartItemCount ?></span>
            </button>
            
            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping cart" aria-hidden="true"></i><span class="badge badge-pill badge-danger"><?=$cartItemCount ?></span>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total sum: <span class="text-info"><?=$cartTotalSum ?> kr</span></p>
                    </div>

                    <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="./admin/<?=$cartItem['img_url']?>" width=100px>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p><?=$cartItem['title']?></p>
                                <span class="price text-info"><?=$cartItem['price']?> kr</span><br> <span class="count">Quantity: <?=$cartItem['quantity']?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="checkout.php" class="btn btn-primary btn-block">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
