<?php 
require('../src/config.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$products = $productDbHandler->FetchProductAPI();

$data = [
     'products' => $products
];

echo json_encode($data);
?>