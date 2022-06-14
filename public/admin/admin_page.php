<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('../../src/dbconnect.php');


// Ta bort Data

if (isset($_POST['deleteBtn'])) {
    $sql = "
        DELETE FROM products 
        WHERE id = :id;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['productId']);
    $stmt->execute();
}

// Hämta Data
$sql = "SELECT * FROM products;";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <h1>Admin</h1>

        <nav id="main-nav">
            <a href="create_product.php">Create new product</a>
        </nav>

        <nav id="main-nav2">
            <a href="#">Main page</a>
        </nav>

        <table class="content-table">
    
    <thead>
         
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Id</th>
            <th>Actions</th>
          <tr>

    
    </thead>

          <tbody id="data">
          
          <?php foreach($products as $product) : ?>
                        <tr>
                            <td><img src="<?=$product['img_url']?>"height="100" width="100"></td>
                            <td><?=htmlentities($product['title']) ?></td>
                            <td><?=htmlentities($product['description']) ?></td>
                            <td><?=htmlentities($product['price']) ?></td>
                            <td><?=htmlentities($product['stock']) ?></td>
                            <td><?=htmlentities($product['id']) ?></td>
                            <td>
                                <form action="update_product.php" method="GET">
                                    <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                                    <input type="submit" value="Updatera">
                                </form>

                                <form action="" method="POST">
                                    <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                                    <input type="submit" name="deleteBtn" value="Radera">
                                </form>
                            </td>
                        
                        </tr>
                    <?php endforeach; ?>

          </tbody>
        </table>
        
    </div>
</body>
</html>
</body>
</html>
