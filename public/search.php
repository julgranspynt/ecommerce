<?php
require('../src/config.php');
require('../src/dbconnect.php');


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$products="";

if(isset($_POST['matchProduct'])) {
    $search = $_POST['product'];
    $param = "%$search%";
    $sql = "
        SELECT * 
        FROM products 
        WHERE title LIKE :title
        ORDER BY id DESC
    ";
    $state = $pdo->prepare($sql);
    $state->bindParam(":title", $param);
    $state->execute();
    $products = $state->fetchAll();

    $data = [
        'products' => $products
    ];
}

?>

<!-- <link rel="stylesheet" href="css/style.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div>
<div>
                 <button type="button" class="button botton-width" data-toggle="modal" 
                 data-target="#updateModal"data-id="<?=htmlentities($product['id'])?>"  data-title="<?=htmlentities($key['title'])?>"  
                 data-description="<?=htmlentities($product['description'])?>" 
                 data-stock="<?=htmlentities($product['stock'])?>" 
                 data-price="<?=htmlentities($product['price'])?>"><ion-icon  name="search-outline" class="icon"></ion-icon></button>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Search for a product </h2>
          </div>
    <table>
    
    <form id="search-form" method="POST">
        <input type="text"  placeholder="Enter product name" name="product" /></br>
        <button type="submit" id="submitSearch" name="matchProduct">Submit</button>
    </form><br>

    <form>  
    <div class="modal-footer">
        <button type="button" class="button botton-width" data-dismiss="modal">Close</button>
    </div>
    </form>
  </div>
  </div>
 

<html>
<body>
</table>

</div>
</div>
</div>


<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script>    


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="jssearch.js"></script>
</body>
</html>

