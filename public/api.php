<?php 
require('../src/dbconnect.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "SELECT * FROM products";
$state = $pdo->query($sql);
$products = $state->fetchALL();


$data = [
     'products' => $products
];

echo json_encode($data);
?>