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
<html>
<head>
<title>Search</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<style>

</style>
</head>
</html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div>
<link rel="stylesheet" href="./css/style.css?v=<?php echo time();?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<nav>
    <div class ="header-column">
      <div class="header">

        <div class="navigation">

          <a href="./mypage.php"><ion-icon name="person-outline" class="icon"></ion-icon></a>    
          
          <?php if( $_SESSION['email']): ?>
              <a href="./logout.php"><ion-icon  name="log-out-outline" class="icon"></ion-icon></a>
          <?php else: ?>
              <a href="./login.php"><ion-icon  name="log-in-outline" class="icon"></ion-icon></a>
          <?php endif; ?>

          <div class="cart-dropdown">
            <button><ion-icon  name="cart-outline" class="icon dropbtn" onclick="myFunction()"></ion-icon></i><span class="cart-counter"><?=$cartItemCount ?></span></button>
    
            <div class="dropdown-content" id="myDropdown">
        
                <div>
                  <legend> Cart items: </legend>
                </div>
        
                <ul class="product-row">
                    <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                        <li class="row cart-detail">
                      
                            <div class="cart-detail-img">
                                <img src="./admin/<?=$cartItem['img_url']?>" width=100px>
                            </div>

                            <div class="cart-detail-product">
                                <p><strong><?=$cartItem['title']?></strong></p>
                                <span><?=$cartItem['price']?> kr</span><br> <span class="count">Quantity: <?=$cartItem['quantity']?></span>
                            </div>

                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="checkout">
                  <h5>Total sum: <span><?=$cartTotalSum ?> kr</span></h5><br>
                  <a href="checkout.php" class="checkoutBtn">Checkout</a>
                </div>
        
            </div>

                    </div>
          <a type="button" class="" data-toggle="modal" 
                    data-target="#updateModal" data-id="<?=htmlentities($product['id'])?>" data-title="<?=htmlentities($key['title'])?>"  
                    data-description="<?=htmlentities($product['description'])?>" 
                    data-stock="<?=htmlentities($product['stock'])?>" 
                    data-price="<?=htmlentities($product['price'])?>"><ion-icon  name="search-outline" class="icon"></ion-icon></a>
        </div>
        <div>       

        <div class="logo-img">
        <a href="./index.php"><img src="./img/LOGOwithoutcircle.png" alt="" width ="350px" height="200px"></a>
        </div>

      </div>
    </div>
</nav>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content search-header">
          <div class="modal-header" >
            <legend>Search for a product </legend>
            <button type="button" class="search-button" data-dismiss="modal">Close</button>
          </div>
  

    
    <form id="search-form"  method="POST">
      <br>
    <input type="text" placeholder="Enter product name" name="products" id="search"/></br><br>
    </form><br>
    <div id="show_up">

    </div>

    <form>  
    <div class="modal-footer">
    </div>
    </form>
  </div>
  </div>
 

<html>
<body>

</div>
</div>
</div>
</body>
</html>

<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script>    

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
<script>
$(document).ready(function(e){
    $("#search").keyup(function(){
        $("#show_up").show();
        var text = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'search.php',
            data: 'txt=' + text,
            success: function(data){
                $("#show_up").html(data);
            }
        });
    })
});

</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


