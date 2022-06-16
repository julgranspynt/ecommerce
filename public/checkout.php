<?php
require('../src/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <title>Checkout</title>
</head>
<body>
    <div class="container">
        <?php include('cart.php') ?>

        <br>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th style="width:15%">Product</th>
                    <th style="width:50%">Info</th>
                    <th style="width:10%"></th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:15%">Price per product</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                <tr>
                    <td><img src="./admin/<?=$cartItem['img_url']?>" width="100"></td>
                    <td><?=$cartItem['description']?></td>
                    <td>
                        <form action="delete-cart-item.php" method="POST">
                            <input type="hidden" name="cartId" value="<?=$cartId?>">
                            <button type="submit" class="btn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form class="update-cart-item" action="update-cart-item.php" method="POST">
                            <input type="hidden" name="cartId" value="<?=$cartId?>">
                            <input type="number" name="quantity" value="<?=$cartItem['quantity']?>" min="0" style="padding: 5px">
                        </form>
                    </td>
                    <td><?=$cartItem['price']?> kr</td>
                </tr>
                <?php endforeach; ?>    

                <tr class="border-top">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total: <?=$cartTotalSum?> kr</b></td>
                </tr>
            </tbody>
        </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $('.update-cart-form input[name="quantity"]').on('change', function() {
            $(this).parent().submit();
        });
    </script>
</body>
</html>

<?php include('layout/footer.php') ?>