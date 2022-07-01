<?php
require('../src/config.php');
// create a new function
function search($text){
    global $pdo;
    // filter the data that comes in
    $text = htmlspecialchars($text);
    // prepare the query to select the products
    $state = $pdo->prepare("SELECT * FROM products WHERE title LIKE '%{$text}%' OR id LIKE '%{$text}%' OR price LIKE '%{$text}%'");
    // execute the query
    $state -> execute();
    // show the products on the page
    while($product = $state->fetch(PDO::FETCH_ASSOC)){
        // show each product as a link
        
        echo '<div class="search-div">';
        echo '<b>id:</b> <p>'.$product['id'].'</p>';
        echo '<b>Title:</b> <p>'.$product['title'].'</p>';
        echo '<b>Price:</b> <p>'.$product['price'].' kr</p>';
        echo '<b>Stock:</b> <p>'.$product['stock'].'</p>';
        echo '<img src="./admin/'.$product['img_url'].'" width="150">';
        echo '<div width="100px"><a class="button" href="product.php?id='.$product['id'].'" >Go to product</a></div>';
        echo '</div>';
    }
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>


