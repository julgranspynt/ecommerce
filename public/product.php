<?php
require('../src/dbconnect.php');

// READ
$sql = "
  SELECT * FROM products
  WHERE id = :id
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$product = $stmt->fetch();
  //echo 'Product';
  //echo "<pre>";
  //print_r($product);
  //echo "</pre>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Shop</title>
</head>
<body>

    <?php include('./layout/header.php'); ?>

    <fieldset id="container">

        <div id="backBtn">
            <a href="products.php" class="backButton">Back</a>
        </div>
            
        <div class="content-left">

            <img src="img/product_images/<?=htmlentities($product['img_url']) ?>" class="product-image">
        
        </div>
        
        <div class="content-right">

            <h2><?=htmlentities($product['title']) ?></h2>
            <h3><?=htmlentities($product['price']) ?> kr</h3>
            <p><span><?=htmlentities($product['description']) ?></span></p>
            <p>Stock: <?=htmlentities($product['stock']) ?></p>
            
            <form action="#" method="GET">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($product['stock']) ?>" value="1">
            </form>

            <p>Total price: <?php ?> kr</p>

            <form action="#" method="GET">
                <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                <input type="submit" value="Add to Cart">
            </form>

        </div>


    </fieldset>

    <?php include('./layout/footer.php'); ?>

</body>
</html>