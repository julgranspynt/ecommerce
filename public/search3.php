<?php
require('../src/config.php');

// create a new function
function search($text){
    global $pdo;

	// filter the data that comes in
	$text = htmlspecialchars($text);
	// prepare the query to select the products
	$stmt = $pdo->prepare("SELECT * FROM products WHERE title LIKE '%{$text}%' OR id LIKE '%{$text}%' OR price LIKE '%{$text}%'");
	// execute the query
	$stmt -> execute();
	// show the products on the page
	while($product = $stmt->fetch(PDO::FETCH_ASSOC)){
		// show each product as a link
		echo 'id: <p>'.$product['id'].'</p>';
		echo 'Title: <p>'.$product['title'].'</p>';
		echo 'Price: <p>'.$product['price'].' kr</p>';
		echo 'Stock: <p>'.$product['stock'].'</p>';
		echo 'Stock: <a href="product.php?id='.$product['id'].'"><img src="./admin/'.$product['img_url'].'" width="200"></a>';
	}
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>

