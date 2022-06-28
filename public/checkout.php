<?php
require('../src/config.php');
include('layout/header.php');

$message   ="";

/* Om GET parametern "missingRequiredFields" existerar if (isset($_GET["missingRequiredFields"])) {}, visa felmeddelandet "Alla fält behöver fyllas i för att genomföra orderköpet"
 */
/* if (isset($_GET['missingRequiredFields'])) {
        $message = '
            <div>
                All fields need to be filled 
            </div>
        ';
} */

/* echo "<pre>";
print_r($_SESSION);
echo "</pre>"; */

$message = "";
if (isset($_GET['missingFields'])) {
    $message = '
        <div>
            You need to fill in all fields. 
        </div>
    ';
}

if (!empty($_SESSION['id'])) {
    $sql = "
        SELECT * FROM users
        WHERE id = :id
    ";
    $state = $pdo->prepare($sql);
    $state->bindParam(':id', $_SESSION['id']);
    $state->execute();
    $user = $state->fetch();

    /* echo "<pre>";
    print_r($user);
    echo "</pre>"; */
}

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

        <br>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th style="width:15%">Image</th>
                    <th style="width:50%">Item</th>
                    <th style="width:15%">Price per product</th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:10%"></th>
                    
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem): ?>
                    <tr>
                        <td><img src="./admin/<?=$cartItem['img_url']?>" width="100"></td>
                        <td><?=$cartItem['title']?></td>
                        <td><?=$cartItem['price']?> kr</td>
                        <td>
                            <form class="update-cart-item" action="update-cart-item.php" method="POST">
                                <input type="hidden" name="cartId" value="<?=$cartId?>">
                                <input type="number" name="quantity" value="<?=$cartItem['quantity']?>" min="0" style="padding: 5px">
                            </form>
                        </td>
                        <td>
                            <form action="delete-cart-item.php" method="POST">
                                <input type="hidden" name="cartId" value="<?=$cartId?>">
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </td>
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

        <h3>Billing Address</h3>

        <?=$message ?>

        <form action="create-order.php" method="POST">
            <input type="hidden" name="cartTotalSum" value="<?=$cartTotalSum?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first-name">First name</label>
                    <input type="text" class="form-control" name="firstName" id="first-name" placeholder="First name">
                </div>
                <div class="form-group col-md-6">
                    <label for="last-name">Last name</label>
                    <input type="text" class="form-control" name="lastName" id="last-name" placeholder="Last name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">E-mail address</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="E-mail address">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="street" id="inputAddress" placeholder="Street">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Postal Code</label>
                    <input type="text" class="form-control" name="postalCode" id="inputZip">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Telephone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city" id="inputCity">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Country</label>
                    <select name="country" class="form-control" id="inputState">
                        <option value="se">Sweden</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        I have read and agreed to the terms and conditions.
                    </label>
                </div>
            </div>
            <div>
                <input type="submit" name="createOrderBtn">
            </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            
    
    <script type="text/javascript">
        $('.update-cart-form input[name="quantity"]').on('change', function() {
            $(this).parent().submit();
        });
    </script>
</body>
</html>

<?php include('layout/footer.php') ?>