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
    $error1 = "";
    $error2 = "";
    $error3 = "";
    $error4 = "";
    $error    = "";
    $success="";
    

    
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

        CreateProduct($title,$description,$price,$stock,$newFilePath);

            $success = '<div class="alert alert-success" role="alert">
                        Produkten har lagts till (:
                        </div>';

    }
    
}

$products = FetchAllProducts();

$data = [
    'error1'       => $error1,
    'error2'      => $error2,
    'error3'      => $error3,
    'error4'      => $error4,
    'error'       => $error,
    'success'     => $success,
    'products'    => $products
];

echo json_encode($data);