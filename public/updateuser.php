<?php
        require('../src/config.php');
        $pageTitle = "Update User";

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        echo "<pre>";
        print_r($_GET);
        echo "</pre>";


    $message = "";
    $error     ="";
    if (isset($_POST['updateUserBtn'])) {
        $firstname          = trim($_POST['first_name']);
        $lastname           = trim($_POST['last_name']);
        $street             = trim($_POST['street']);
        $postalcode         = trim($_POST['postal_code']);
        $city               = trim($_POST['city']);
        $country            = trim($_POST['country']);
        $email              = trim($_POST['email']);
        $phone              = trim($_POST['phone']);
        $password           = trim($_POST['password']);
        $confirmPassword    = trim($_POST['confirmPassword']);

        $sql = " 
        UPDATE users
        SET  
        first_name = :first_name, 
        last_name = :last_name, 
        street = :street, 
        postal_code = :postal_code, 
        city = :city, 
        country = :country, 
        email = :email, 
        phone = :phone, password = :password
        WHERE id = :id ";

        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_GET["userId"]);
        $state->bindParam(':first_name', $firstname);
        $state->bindParam(':last_name', $lastname);
        $state->bindParam(':street', $street);
        $state->bindParam(':postal_code', $postalcode);
        $state->bindParam(':city', $city);
        $state->bindParam(':country', $country);
        $state->bindParam(':email', $email);
        $state->bindParam(':phone', $phone);
        $state->bindParam(':password', $encryptedPassword);
        $state->execute();
    }

    $sql = "
    SELECT * FROM users
    WHERE id = :id
    ";
    $state = $pdo->prepare($sql);
    $state->bindParam(':id', $_GET ["userId"]);
    $state->execute();
    $user = $state->fetch();
    


?>
<?php include('./layout/header.php'); ?>
<?php ?>
        <article class="border">
            <form method="POST" action="#">

                <fieldset>
                    <legend>Update User </legend>

                    <?=$message ?>
                    
                    <p>
                        <label for="input1">First Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=htmlentities($user['first_name']) ?>">
                    </p>

                    <p>
                        <label for="input1">Last Name:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=htmlentities($user['last_name']) ?>">
                    </p>

                    <p>
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($user['street'])?>">
                    </p>

                    <p>
                        <label for="input1">Postal Code:</label> <br>
                        <input type="text" class="text" name="postal_code" value="<?=htmlentities($user['postal_code']) ?>">
                    </p>

                    <p>
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($user['city']) ?>">
                    </p>

                    <p>
                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($user['country']) ?>">
                    </p>

                    <p>
                        <label for="input1">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value="<?=htmlentities($user['phone']) ?>">
                    </p>

                    <p>
                        <label for="input1">Email:</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($user['email']) ?>">
                    </p>

                    <p>
                        <label for="input2">New password:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

                    <p>
                        <label for="input2">Confirm new password:</label> <br>
                        <input type="password" class="text" name="confirmPassword">
                    </p>
                    <p>
                        <input type="submit" name="updateUserBtn" value="Update"> | 
                        
                    </p>
                </fieldset>
            </form>
        
            <hr>
        </article>

<?php ?>
        
<?php include('./layout/footer.php'); ?>