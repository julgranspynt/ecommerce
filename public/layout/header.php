<?
$products="";

if(isset($_POST['matchProduct'])) {

    $search = $_POST['product'];
    $param = "%$search%";
   
   
    $sql = "SELECT * FROM products WHERE title LIKE :title ORDER BY id ";


    $state = $pdo->prepare($sql);
    $state->bindParam(":title", $param);
    $state->execute();
    $products = $state->fetchAll();

        $data = [
            'products' => $products
        ];
}

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
          <a href="./logout.php"><ion-icon  name="log-in-outline" class="icon"></ion-icon></a>
          <div class="cart-dropdown">
            <button><ion-icon  name="cart-outline" class="icon dropbtn" onclick="myFunction()"></ion-icon></i><span class="cart-counter"><?=$cartItemCount ?></span></button>
    
            <div class="dropdown-content" id="myDropdown">
        
                <div>
                  <h5>Cart items: </h5>
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
                    data-target="#updateModal"data-id="<?=htmlentities($product['id'])?>"  data-title="<?=htmlentities($key['title'])?>"  
                    data-description="<?=htmlentities($product['description'])?>" 
                    data-stock="<?=htmlentities($product['stock'])?>" 
                    data-price="<?=htmlentities($product['price'])?>"><ion-icon  name="search-outline" class="icon"></ion-icon></a>
        </div>

        <div class="logo-img">
        <a href="./index.php"><img src="./img/LOGOwithoutcircle.png" alt="" width ="350px" height="200px"></a>
        </div>

      </div>
    </div>
</nav>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Search for a product </h2>
          </div>
    <table>

    
    <form id="search-form" method="POST">
        <input type="text"  placeholder="Enter product name" name="product" /></br>
        <button type="submit" id="submitSearch" name="matchProduct">Submit</button>
    </form><br>

    <form>  
    <div class="modal-footer">
        <button type="button" class="button botton-width" data-dismiss="modal">Close</button>
    </div>
    </form>
  </div>
  </div>
 

<html>
<body>
</table>

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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="./jssearch.js"></script>
