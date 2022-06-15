<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../../src/config.php');


    $title  = "";
    $description = "";
    $price    = "";
    $stock    = "";
    $imgUrl   = "";
    $error    = "";
    $messages = "";

    
    if (isset($_POST['createBtn'])) {
        $title          = trim($_POST['title']);
        $description    = trim($_POST['description']);
        $price          = trim($_POST['price']);
        $stock          = trim($_POST['stock']);

// Ladda upp bild + validering 

    if (is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {
            
        $fileName 	    = $_FILES['uploadedFile']['name'];
        $fileType 	    = $_FILES['uploadedFile']['type'];
        $fileTempPath   = $_FILES['uploadedFile']['tmp_name'];
        $path 		    = "uploads/";
        $newFilePath = $path . $fileName; 

            $allowedFileTypes = [
                'image/png',
                'image/jpeg',
                'image/gif',
                'image/jpg',
            ];
            
            $isFileTypeAllowed = array_search($fileType, $allowedFileTypes, true);
            if ($isFileTypeAllowed === false) {
               echo $error = "The file type is invalid. Allowed types are jpeg, png, gif. <br>";
            }    
            

        }
        
        // Validering om formulär fylls i
    
    if(empty($_POST['title'])){
        echo "<p>Du måste fylla i en titel!</p>";
    }
    
    if(empty($_POST['description'])){
        echo "<p>Du måste fylla i en produktbeskrivning!</p>";
    }

    if(empty($_POST['price'])){
        echo "<p>Du måste fylla i ett pris!</p>";
    }

    if(empty($_POST['stock'])){
        echo "<p>Du måste fylla i lagersaldo!</p>";
    }

    else if(empty($error)){
        $isTheFileUploaded = move_uploaded_file($fileTempPath, $newFilePath);

        global $pdo;
        
        $sql = "
                INSERT INTO products (title, description, price, stock,img_url)
                VALUES (:title, :description, :price, :stock,:uploadedFile);
            ";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':uploadedFile', $newFilePath);
            $stmt->execute();

            echo "<p>Sucsess!</p>";

    }
    
}

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
   
   <h1>New Product</h1>
        </div>
    
        <div id="container-form">

        <form id="create-blog-form" method="POST" action="" enctype="multipart/form-data">
            
       <fieldset>
            
            <label for="input1">Title:</label>
            <input type="text" name="title" id="title-textarea" placeholder="Enter a title" maxlength="50">

            <label for="input2">Description:</label>
            <textarea name="description" id="content-textarea" placeholder="Enter product description"></textarea>
           
            <label for="input3">Price:</label>
            <input name="price" id="price-textarea" placeholder="Enter price">
            

            <label for="input4">Stock:</label>
            <input type="text" name="stock" id="author-textarea" placeholder= "Enter stock"maxlength="50">

            <label>Photo:</label> 
		    <input type="file" name="uploadedFile">


            <input class= "button" name= "createBtn" type="submit" value="Create">

            <a href="admin-products.php">&#x2190; back</a>

        </fieldset>
        </form>
    </div>
</body>
</html>

