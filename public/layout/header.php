<?php
include('cart.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <nav>
    <div class ="header-column">
      <div class="header">
        <div class="navigation">
        <a href="./mypage.php"><ion-icon name="person-outline" class="icon"></ion-icon></a>
        <a href="./logout.php"><ion-icon  name="log-in-outline" class="icon"></ion-icon></a>
        <a href="./search.php"><ion-icon  name="search-outline" class="icon"></ion-icon></a>
        <div class="cart-dropdown">
          <button>
            <ion-icon  name="cart-outline" class="icon dropbtn" onclick="myFunction()"></ion-icon></i><span class="cart-counter"><?=$cartItemCount ?></span>
          </button>
          
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

            <div><h3 style="text-align: left;">Total sum: <span><?=$cartTotalSum ?> kr</span></h3></div>

            <div><a href="checkout.php" class="checkoutBtn">Checkout</a></div>
            
          </div>
        </div> 
        </div>
         <div class="logo-img">
         <a href="./index.php"><img src="./img/LOGOwithoutcircle.png" alt="" width ="350px" height="200px"></a>
        </div>

      </div>
    </div>
  </nav>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>

