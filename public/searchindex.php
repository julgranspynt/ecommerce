<?php
require('../src/config.php');

$products = $productDbHandler->FetchAllProducts();

echo "<pre>";
print_r($products);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>

    <style>
        #search{
            width: 15%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px; 
            background-repet: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width: 0.4s ease-in-out;
        }

        #search:focus {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-grp">
            <input type="text" name="search" id="search" placeholder="Search.." onkeyup="search_data()">
        </div>    
        <div id="search-list">
            
            <ul class="product-row">
                <?php foreach($products as $product): ?>
                    <li class="row cart-detail">
                
                        <div class="cart-detail-img">
                            <img src="./admin/<?=$product['img_url']?>" width=100px>
                        </div>

                        <div class="cart-detail-product">
                            <p><strong><?=$product['title']?></strong></p>
                            <span><?=$product['price']?> kr</span><br> <span class="count">Stock: <?=$product['stock']?></span>
                        </div>

                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- <div class="checkout">
            <h5>Total sum: <span><?=$cartTotalSum ?> kr</span></h5><br>
            <a href="checkout.php" class="checkoutBtn">Checkout</a>
            </div> -->
        </div>
    </div>

    <script>
        function search_data() {
            var search=jQuery('#search').val();
            /* alert(search); */
            jQuery.ajax({
                type: 'post',
                url: 'search.php',
                data: 'search='+search,
                success: function(data) {
                    /* alert(); */
                    jQuery('#search-list').html(data);
                }
            })   
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>