<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('C:\MAMP\htdocs\ecommerce\src\dbconnect.php');

// Uppdatera produkt

if (isset($_POST['updateBtn'])) {
    $title          = trim($_POST['title']);
    $description    = trim($_POST['description']);
    $price          = trim($_POST['price']);
    $stock          = trim($_POST['stock']);
    
    
    // Validering om formulär fylls i

if(empty($_POST['title'])){
    echo "<p>Du måste fylla i en titel!</p>";
}

if(empty($_POST['description'])){
    echo "<p>Du måste fylla i en description!</p>";
}

if(empty($_POST['price'])){
    echo "<p>Du måste fylla i price!</p>";
}

if(empty($_POST['stock'])){
    echo "<p>Du måste fylla i stock!</p>";
}

else{
    $sql = "
            UPDATE products
            SET title = :title, description = :description, price = :price, stock =:stock
            WHERE id = :id
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['productId']);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();

        echo "<p>Sucsess!</p>";

}}


/**
 * Hämta  Produkt */

 $sql = "
    SELECT * FROM products
    WHERE id = :id
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['productId']);
$stmt->execute();
$product = $stmt->fetch();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="blog-container">
    <h1>Update Product</h1>
        </div>
    
        <div id="container-form">

        <form id="create-blog-form" method="POST" action="#">
            
        <fieldset>
            <label for="">Title:</label>
            <input type="text" name="title" id="title-textarea" value= "<?=htmlentities($product['title']) ?>" maxlength="50">

            <label for="">Description:</label>
            <textarea name="description" id="content-textarea" ><?=htmlentities($product['description']) ?></textarea>
            
            <label for="">Price:</label>
            <input type="text" name="price" id="title-textarea" value= "<?=htmlentities($product['price']) ?>" maxlength="50">
            
            <label for="">Stock:</label>
            <input type="text" name="stock" id="author-textarea" value= "<?=htmlentities($product['stock']) ?>" maxlength="50">

            <input class= "button" name= "updateBtn" type="submit" value="Update">
            <a href="admin_page.php">&#x2190; back</a>
        </fieldset>
        
        </form>
    </div>
</body>
</html>