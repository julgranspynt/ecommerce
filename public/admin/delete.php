<?php

require('../../src/config.php');

if($_GET['id'])
{
    $id=$_GET['id'];
    $sql = "delete from products where id='$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
?>

