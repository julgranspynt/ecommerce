<?
 require('../../src/config.php');

 $message = "";

 if (isset($_POST['deleteOrderBtn'])) {
    $orderDbHandler->deleteOrder();
    
 }

 $orders = $orderDbHandler->fetchAllOrders();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage orders</title>
    <link rel="stylesheet" href="css/style.css">
</head>

 <div>
 <div id="container">
         <h1>Manage orders</h1>

         <?=$message ?>

         <nav id="main-nav">
            <form action="../products.php" method="POST">
            	<input type="submit" value="Create new order">
            </form>
         </nav>

         <nav id="main-nav2">
            <a href="index.php">Admin home</a>
         </nav>


            <br>
         
         <table class="content-table">
             <thead>
                 <tr>
                     <th>Order id</th>
                     <th>Total price</th>
                     <th>Customer id</th>
                     <th>Customer name</th>
                     <th>Billing address</th>
                     <th>Create date</th>
                     <th>Manage</th>
                 </tr>
             </thead>
             <tbody  id="data" >
                <?php foreach($orders as $order) : ?>
                    <tr>
                        <td><?=htmlentities($order['id']) ?></td>
                        <td><?=htmlentities($order['total_price']) ?> kr</td>
                        <td><?=htmlentities($order['user_id']) ?></td>
                        <td><?=htmlentities($order['billing_full_name']) ?></td>
                        <td><?=htmlentities($order['billing_street']) ?><br>
                            <?=htmlentities($order['billing_postal_code']) ?> 
                            <?=htmlentities($order['billing_city']) ?><br>
                            <?=htmlentities($order['billing_country']) ?></td>
                        <td><?=htmlentities($order['create_date']) ?></td>
                        <td>
                            <form action="#" method="GET">
                                <input type="hidden" name="orderId" value="<?=htmlentities($order['id']) ?>">
                                <input type="submit" value="Update">
                            </form>

                            <form action="#" method="POST">
                                <input type="hidden" name="orderId" value="<?=htmlentities($order['id']) ?>">
                                <input type="submit" name="deleteOrderBtn" value="Delete">
                            </form>
                        </td>
                     
                    </tr>
                <?php endforeach; ?>
             </tbody>
         </table>
            
                </div>
 </div>
