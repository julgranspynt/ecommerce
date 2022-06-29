<?php
require('../src/config.php');
include('./layout/header.php'); 

    $pageTitle = "Product";
    $pageId    = "products";

$product = FetchProductProductPage();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css?v=<?php echo time();?>">
</head>
<body>

    <fieldset id="container" class="main-box-product">


        <div class="center">  
        <div class="content-left">

            <img src="./admin/<?=htmlentities($product['img_url']) ?>" class="product-image">
        
        
        
        <div class="content-right">

            <b><legend><?=htmlentities($product['title']) ?></legend></b>
            <b><h5><?=htmlentities($product['price']) ?> kr</h5></b><br>
            <p><span><?=htmlentities($product['description']) ?></span></p>
            <p>Stock: <?=htmlentities($product['stock']) ?></p>

            <form action="add-cart-item.php" method="POST">
                <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                <input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($product['stock']) ?>" value="1">
                <input type="submit" name="addToCart" class="button" value="Add to Cart">
            </form>

        </div>
        </div>
</div>

    </fieldset>
    <div id="backBtn">
            <a href="products.php" class="button">Back to Products</a>
        </div>

    <?php include('./layout/footer.php'); ?>
	<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 
</body>
</html>