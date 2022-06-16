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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>


