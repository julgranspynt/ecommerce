<?php
require('../src/config.php');
include('./layout/header.php'); 

    $pageTitle = "Product";
    $pageId    = "products";

$product = $productDbHandler->FetchProductProductPage();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <fieldset id="container">

        <div id="backBtn">
            <a href="products.php" class="backButton">Back</a>
        </div>
            
        <div class="content-left">

            <img src="./admin/<?=htmlentities($product['img_url']) ?>" class="product-image">
        
        </div>
        
        <div class="content-right">

            <h2><?=htmlentities($product['title']) ?></h2>
            <h3><?=htmlentities($product['price']) ?> kr</h3><br>
            <p><span><?=htmlentities($product['description']) ?></span></p>
            <p>Stock: <?=htmlentities($product['stock']) ?></p>

            <form action="add-cart-item.php" method="POST">
                <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                <input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($product['stock']) ?>" value="1">
                <input type="submit" name="addToCart" value="Add to Cart">
            </form>

        </div>

    </fieldset>

    <?php include('./layout/footer.php'); ?>

</body>
</html>