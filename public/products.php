<?php
require('../src/config.php');

	$pageTitle = "All products";
    $pageId    = "products";

//READ
$stmt =$pdo->query("SELECT * FROM products;");
$products = $stmt->fetchAll();

//echo "<pre>";
//print_r($_GET);
//echo "</pre>";  

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

	<?php include('./layout/header.php'); ?>

	<main>
		<ul id="list-group">
			<?php foreach($products as $product) { ?>
				<li id="list-group-item">

					<div id="img-container">
						<a href="product.php?id=<?=htmlentities($product['id']) ?>">
							<img class="prods "src="./admin/<?=htmlentities($product['img_url']) ?>" width=200">
						</a>
					</div>
					<p>
						<h5><?=htmlentities($product['title']) ?></h5>
						<i>Stock: <?=htmlentities($product['stock']) ?></i><br>
						<?=htmlentities($product['price']) ?> kr<br>
						
					</p>
		
					<br>

					<form action="add-cart-item.php" method="POST">
						<input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
						<input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($product['stock']) ?>" value="1">
						<input type="submit" name="addToCart" value="Add to Cart">
					</form>
				
				</li>
			<?php } ?>
		</ul>
	</main>

	<?php include('./layout/footer.php'); ?>
	
	<?php
	echo "<pre>";
	print_r($_SESSION['cartItems']);
	echo "</pre>"; 
	?>

</body>
</html>


