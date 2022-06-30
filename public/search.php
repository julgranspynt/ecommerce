<?php
require('../src/config.php');

/* print_r($_POST); */
$search = $_POST('search');
$sql="
SELECT id, title, description, price FROM products 
";
if($search!='') {
  $sql.="WHERE id LIKE '%search%' OR title LIKE '%search%' OR description LIKE '%search%' OR price LIKE '%search%'
  ";
}
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();

if (isset($products['0'])) {
  $html='
    <ul class="product-row">';
      foreach($products as $product) {
        $html.='
          <li class="row cart-detail">
            <div class="cart-detail-img">
                <img src="./admin/<?=$product['img_url']?>" width=100px>
            </div>
            <div class="cart-detail-product">
                <p><strong><?=$product['title']?></strong></p>
                <span><?=$product['price']?> kr</span><br> <span class="count">Stock: <?=$product['stock']?></span>
            </div>
          </li>';
      }
    $html.='</ul>';
    echo $html;
  
} else {
  echo "product not found";
}

?>


