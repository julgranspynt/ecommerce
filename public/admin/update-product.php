<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../../src/config.php');

// Uppdatera produkt

$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
$error    = "";
$success="";

if (isset($_POST['updateBtn'])) {
    $title          = trim($_POST['title']);
    $description    = trim($_POST['description']);
    $price          = trim($_POST['price']);
    $stock          = trim($_POST['stock']);


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
                $error =  '<div class="alert alert-danger" role="alert">
                             The file type is invalid. Allowed types are jpeg, png, gif.
                            </div>';
            }    
            

        }
        
        // Validering om formulär fylls i
    
    if(empty($_POST['title'])){
        $error1 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i en titel!
                    </div>';
    }
    
    if(empty($_POST['description'])){
        $error2 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i en produktbeskrivning!
                    </div>';
    }

    if(empty($_POST['price'])){
        $error3 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i ett pris!
                    </div>';
    }

    if(empty($_POST['stock'])){
        $error4 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i lagersaldo!
                    </div>';
    }

    else if(empty($error)){
    
    $isTheFileUploaded = move_uploaded_file($fileTempPath, $newFilePath);
   
    UpdateProduct($title,$description,$price,$stock,$newFilePath);

        $success = '<div class="alert alert-success" role="alert">
                        Produkten har Uppdaterats till (:
                        </div>';

}}

    $product = FetchProduct();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
   <div class="blog-container">
    <h1>Update Product</h1>
        </div>
    
        <div id="container-form">

        <form id="create-blog-form" method="POST" action="#" enctype="multipart/form-data">

        <div>
            <img src="<?=$product['img_url']?>"height="200" width="350">
        </div>
            
            <br>
            
            <label for="">Title:</label>
            <input type="text" name="title" id="title-textarea" value= "<?=htmlentities($product['title']) ?>" maxlength="50">
            <div id="form-messages-title">
            <?php echo $error1?>
            </div>

            <label for="">Description:</label>
            <textarea name="description" id="content-textarea" ><?=htmlentities($product['description']) ?></textarea>
            <div id="form-messages-description">
            <?php echo $error2?>
            </div>
           
            <label for="">Price:</label>
            <input type="text" name="price" id="title-textarea" value= "<?=htmlentities($product['price']) ?>" maxlength="50">
            <div id="form-messages-price">
            <?php echo $error3?>
            </div>
            
            <label for="">Stock:</label>
            <input type="text" name="stock" id="author-textarea" value= "<?=htmlentities($product['stock']) ?>" maxlength="50">
            <div id="form-messages-stock">
            <?php echo $error4?>
            </div>
            
            <label>Photo:</label> 
		    <input type="file" name="uploadedFile" value= "<?$product['img_url']?>">
            <div id="form-messages-image">
          
            </div>

            <br>

            <div id="form-messages-success">
            <?php echo $success?>
            </div>
          

            <input class= "button" name= "updateBtn" type="submit" value="Update">
            <a href="admin-products.php">&#x2190; back</a>
        </fieldset>
        
        </form>
    </div>
     <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <!-- Custom JS -->
    <!-- <script src="js/update.js"></script> -->
</body>
</html>