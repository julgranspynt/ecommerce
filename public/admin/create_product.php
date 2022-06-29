<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    
   <div class="blog-container">
   
   <h1>Create new Product</h1>
        </div>
    
        <div id="container-form">

        <form id="create-blog-form" method="POST" action="create.php" enctype="multipart/form-data">
    
            <label for="input1">Title:</label>
            <input type="text" name="title" id="title-textarea" placeholder="Enter title" maxlength="50">
            <div id="form-messages-title">
            
            </div>
            
            

            <label for="input2">Description:</label>
            <textarea name="description" id="content-textarea" placeholder="Enter a description"></textarea>
            <div id="form-messages-description">
            
            </div>
           
            <label for="input3">Price:</label>
            <input name="price" id="price-textarea" placeholder="Enter a price">
            <div id="form-messages-price">
            
            </div>
            

            <label for="input4">Stock:</label>
            <input type="text" name="stock" id="author-textarea" placeholder= "Enter stock"maxlength="50">
            <div id="form-messages-stock">
            
            </div>

            <label>Image:</label> 
		    <input type="file" name="uploadedFile">
            <br><br>
            <div id="form-messages-image">
            
            </div>
            <div id="form-messages-success">
            
            </div>


            <input class= "button" name= "createBtn" type="submit" value="Create">

            <a href="admin_page.php">&#x2190; Go back</a>
        </form>


    </div>
    
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>

